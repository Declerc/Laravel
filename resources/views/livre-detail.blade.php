@extends('layouts.app') @section('title', 'Livre') @section('sidebar') @parent @endsection @section('content')

    @if ($livre === null)
        <h2>Livre inexistant</h2>
    @else
        <h2><?=$livre["liv_titre"]?></h2>
        <ul>
            <?php
            $cols = [
                "aut_nom" => "Auteur",
                "gen_libelle" => "Genre",
                "liv_histoire" => "Histoire",
                "edi_nom" => "Éditeur",
                "liv_dateparution" => "Parution",
                "liv_prixttc" => "Prix",
                "liv_stock" => "Stock"

            ];
            //echo @"<img src="asset("resources/assets/Photos/".$livre["pho_url"].".jpg")\" style="width:90px;height:90px;">";
            
            $value=$livre["pho_url"];
            ?>
            <img src="{{asset("resources/assets/Photos/$value.jpg")}}" style="width:90px;height:90px;">
            <?php  
            echo "<br/>";
            foreach ($cols as $n => $titre)
            {
                
                echo $titre . " : " . $livre[$n];
                if ($n == "liv_prixttc")
                {
                    echo " €";
                }
                echo "<br/>";
            }
            echo "<br/>";
            echo "<h4>Section commentaires</h4>";
            foreach($comms as $comm){
                echo $comm["adh_pseudo"]." a écrit le ".$comm["avi_date"]." :";
                echo "<br/>";
                echo $comm["avi_titre"]." - note : ".$comm["avi_note"]."/5";
                echo "<br/>";
                echo nl2br($comm["avi_detail"]); //permet de conserver le saut de ligne
                echo "<br/>";
                echo "avis utile : ".$comm["avi_nbutileoui"]."/".($comm["avi_nbutileoui"]+$comm["avi_nbutilenon"]);
                echo "<br/><br/>";
            }

            ?>
    @endif
    </ul> @endsection
