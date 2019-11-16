<?php

$url = "http://localhost:3003";

$jsonEvent = file_get_contents($url . "/recupEvent");
$resultEvent = json_decode($jsonEvent);
$jsonPhoto = file_get_contents($url . "/recupPhoto");
$resultPhoto = json_decode($jsonPhoto);
$jsonComs = file_get_contents($url . "/recupComs");
$resultComs = json_decode($jsonComs);
$p = 0;
$f = 0;
for ( $i = 0 ; $i < count($resultEvent); $i++) {

    if($resultEvent[$i]->date < date("Y-m-d")){

        $eventP[$p]['nom'] = $resultEvent[$i]->nom;
        $eventP[$p]['date'] = $resultEvent[$i]->date;
        $eventP[$p]['prix'] = $resultEvent[$i]->prix;
        $eventP[$p]['description'] = $resultEvent[$i]->description;
        $eventP[$p]['illust'] = $resultEvent[$i]->image;
        $eventP[$p]['id'] = $resultEvent[$i]->id;
        $p++;

    } else {

        $eventF[$f]['nom'] = $resultEvent[$i]->nom;
        $eventF[$f]['date'] = $resultEvent[$i]->date;
        $eventF[$f]['prix'] = $resultEvent[$i]->prix;
        $eventF[$f]['description'] = $resultEvent[$i]->description;
        $eventF[$f]['illust'] = $resultEvent[$i]->image;
        $eventF[$f]['id'] = $resultEvent[$i]->id;
        $f++;
  
    }

  
}

 
for ($i = 0 ; $i < count($eventP) ; $i++) {

    for( $j = 0 ; $j < count($resultPhoto); $j++){

        if($eventP[$i]['id'] == $resultPhoto[$j]->id_evenement){

            $eventP[$i]['photo'][$j]['id'] = $resultPhoto[$j]->id;
            $eventP[$i]['photo'][$j]['id_utilisateur'] = $resultPhoto[$j]->id_utilisateur;
            $eventP[$i]['photo'][$j]['lien'] = $resultPhoto[$j]->lien;
            $eventP[$i]['photo'][$j]['cache'] = $resultPhoto[$j]->cache;

        }

        for($k = 0 ; $k < count($resultComs) ; $k++){

            if($eventP[$i]['photo'][$j]['id'] == $resultComs[$k]->id_photo){
        
                $eventP[$i]['photo'][$j]['commentaire'][$k]['id'] = $resultComs[$k]->id;
                $eventP[$i]['photo'][$j]['commentaire'][$k]['id_utilisateur'] = $resultComs[$k]->id_utilisateur;
                $eventP[$i]['photo'][$j]['commentaire'][$k]['contenu'] = $resultComs[$k]->contenu;
                $eventP[$i]['photo'][$j]['commentaire'][$k]['date'] = $resultComs[$k]->date;
                $eventP[$i]['photo'][$j]['commentaire'][$k]['cache'] = $resultComs[$k]->cache;
            }
        
        }

    }
    
}

for ($i = 0 ; $i < count($eventF) ; $i++) {
    $parse1 = explode("T", $eventF[$i]['date']);
    $parse2 = explode("-", $parse1[0]);
    $parseDate = $parse2[2] . "/" . $parse2[1] . "/" . $parse2[0];

    $eventF[$i]['date'] = $parseDate;
}

for ($i = 0 ; $i < count($eventP) ; $i++) {
    $parse1 = explode("T", $eventP[$i]['date']);
    $parse2 = explode("-", $parse1[0]);
    $parseDate = $parse2[2] . "/" . $parse2[1] . "/" . $parse2[0];

    $eventP[$i]['date'] = $parseDate;
}

//var_dump($eventF);

?>
