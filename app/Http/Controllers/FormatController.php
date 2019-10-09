<?php

namespace App\Http\Controllers;

use App\Livre;
use App\Auteur;
use App\LivreAuteur;
use Illuminate\Http\Request;
use App\Genre;
use App\Photo;
use App\Format;


class FormatController extends Controller
{
    public function searchF(){
            $genres= Genre::all()->toArray();
    	    $results = Livre::select('*')
                ->leftJoin('t_r_format_for','t_r_format_for.for_id','=','t_e_livre_liv.for_id')
                ->leftJoin('t_e_photo_pho','t_e_photo_pho.liv_id','=','t_e_livre_liv.liv_id')
                ->where("t_r_format_for.for_libelle",'=', $_POST["searchF"])
                ->get();

                
                
          $results = [];
                    $livres = livre::all()->toArray();
                    $formats = Format::all()->toArray();
                    $photos = Photo::all()->toArray();
                    foreach($livres as $livre) {
                            foreach($formats as $format) {
                                    foreach ($photos as $photo) {
                                        if ($format["for_id"] == $livre["for_id"]  &&
                                                levenshtein($format["for_libelle"], $_POST["searchF"])<4 && $photo["liv_id"] == $livre["liv_id"]){// levenshtein(str1,str2) renvoie le nombre de caractères d'écart entre les paramtres
                                                $results[] = $photo;
                                                $results[] = $livre;
                                                $results[] = $format;
                                                                                               
                                            }
                                       }

                            }
                    }
                    
                $results = collect($results);
                //var_dump($results);

           return view ("livre-format-search", ['results'=>$results,'genres'=>$genres,'formats'=>$formats]); 

    }
}