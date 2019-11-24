<?php

$inscrit = file_get_contents("http://localhost:3003/recupParticipation/". $_GET['idEvent']);

$jsonInscrit = json_decode($inscrit);

var_dump(json_decode($inscrit));

$file = "../file/inscritList.csv";

$handle = fopen($file, "w");

ftruncate($handle,0);

foreach ($jsonInscrit as $rows) {
    $name = file_get_contents("http://localhost:3003/recupUsers/". $rows->id_utilisateur);

    $name = json_decode($name);
    echo var_dump($name);

    $fields = [$name[0]->prenom, $name[0]->nom];

    fputcsv($handle, $fields);

}

header("Location: ../file/inscritList.csv");