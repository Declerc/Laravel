<?php

namespace App\Http\Controllers;

use App\Avis;
use App\Livre;
use App\Genre;
use App\Photo;
use App\Format;
use Illuminate\Http\Request;


class LivreController extends Controller
{
    public function index() { 
    	return view ("livre-list", ['livres'=>Livre::all(),'photos'=>Photo::all()->toArray(),'genres'=>Genre::all()->toArray(),'formats'=>Format::all()->toArray()]); 
    }
    public function search(){
    	if($_POST["request"]!=""){
    	   $results = Livre::select('*')
                ->leftJoin('t_r_genre_gen','t_r_genre_gen.gen_id','=','t_e_livre_liv.gen_id')
                ->leftJoin('t_e_photo_pho','t_e_photo_pho.liv_id','=','t_e_livre_liv.liv_id')
                ->where("t_r_genre_gen.gen_libelle",'=',$_POST["request"])
                ->get();
                
                
          $results = [];
                    $livres = Livre::all()->toArray();
                    $genres = Genre::all()->toArray();
                    $photos = Photo::all()->toArray();
                    foreach($livres as $livre) {
                            foreach($genres as $genre) {
                                foreach ($photos as $photo) {
                                    if ($livre["gen_id"] == $genre["gen_id"] &&
                                            levenshtein($genre["gen_libelle"],$_POST["request"])<4 && $photo["liv_id"] == $livre["liv_id"])
                                    {
                                        $results[] = $photo;
                                        $results[] = $livre;
                                        $results[] = $genre;
                                    

                                    }
                                }
                            }
                    }
                    
            $results = collect($results);
        }
        else
        	{$results =0;}
            //var_dump($genres[1]["gen_id"]);
            //var_dump($results);
            $formats=Format::all()->toArray();
            return view ("livre-search",['results'=> $results,'genres'=>$genres,'formats'=>$formats]);

           	

            
    }
    public function detail()
    {
        /*
        trouver les coordonnees du livre actuel
        */


//--------------------------------------------
        $results = Livre::select('*')
            ->leftJoin('t_j_auteurlivre_aul', 't_j_auteurlivre_aul.liv_id', '=', 't_e_livre_liv.liv_id')
            ->leftJoin('t_e_auteur_aut', 't_e_auteur_aut.aut_id', '=', 't_j_auteurlivre_aul.aut_id')
            ->leftJoin('t_e_editeur_edi', 't_e_editeur_edi.edi_id', '=', 't_e_livre_liv.edi_id')
            ->leftJoin('t_r_genre_gen', 't_r_genre_gen.gen_id', '=', 't_e_livre_liv.gen_id')
            ->leftJoin('t_e_photo_pho','t_e_photo_pho.liv_id','=','t_e_livre_liv.liv_id')
            ->where("t_e_livre_liv.liv_id", '=', $_GET["param"]) // TODO modifier l'id pour qu'il soit compatible
            //->where(["t_e_livre_liv.liv_id",'=', 4],["t_e_auteur_aut.aut_nom",'=', $_POST["the_search"]])
            ->get();


        $results = collect($results);

        $res = [];

        if ($results->isEmpty())
        {
            $res["livre"] = null;
        }
        else
        {
            $res["livre"] = $results[0];

            $results = Avis::select('*')
                ->leftJoin('t_e_adherent_adh', 't_e_adherent_adh.adh_id', '=', 't_e_avis_avi.adh_id')
                ->where("t_e_avis_avi.liv_id", '=', $res["livre"]["liv_id"])
                ->orderby("t_e_avis_avi.avi_date","desc")
                ->get();
            $res["comms"] = collect($results);
        }

        return view("livre-detail", $res);

    }
}
