<?php

namespace App\Http\Controllers;

use App\Livre;
use App\Auteur;
use App\LivreAuteur;
use Illuminate\Http\Request;
use App\Genre;
use App\Photo;
use App\Format;


class AuteurController extends Controller
{
    public function search_auteur(){
            $genres= Genre::all()->toArray();
            $formats=Format::all()->toArray();
    	    $results = Livre::select('*')
                ->leftJoin('t_j_auteurlivre_aul','t_j_auteurlivre_aul.liv_id','=','t_e_livre_liv.liv_id')
                ->leftJoin('t_e_auteur_aut','t_e_auteur_aut.aut_id','=','t_j_auteurlivre_aul.aut_id')
                ->leftJoin('t_e_photo_pho','t_e_photo_pho.liv_id','=','t_e_livre_liv.liv_id')
                ->where("t_e_auteur_aut.aut_nom",'=', $_POST["the_search"])
                ->get();

                
                
          $results = [];
                    $livres = livre::all()->toArray();
                    $auteurs = Auteur::all()->toArray();
                    $photos = Photo::all()->toArray();
                    $LivresAuteurs = LivreAuteur::all()->toArray();
                    foreach($livres as $livre) {
                            foreach($auteurs as $aut) {
                                foreach($LivresAuteurs as $livaut) {
                                    foreach ($photos as $photo) {
                                        if ( $aut["aut_id"] == $livaut["aut_id"] && $livre["liv_id"] == $livaut["liv_id"] &&
                                                levenshtein($aut["aut_nom"], $_POST["the_search"])<4 && $photo["liv_id"] == $livre["liv_id"]){// levenshtein(str1,str2) renvoie le nombre de caractères d'écart entre les paramtres
                                                $results[] = $photo;
                                                $results[] = $livre;
                                                $results[] = $aut;
                                                                                               } 
                                       }
                                    }

                            }
                    }
                    
                $results = collect($results);
                //var_dump($results);

           return view ("search", ['results'=>$results,'genres'=>$genres,'formats'=>$formats]); 

    }
}