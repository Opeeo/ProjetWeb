<?php

include "eventVerif.php";

$file = "../file/photosEvents.csv";

$handle = fopen($file, "w");

ftruncate($handle,0);

if(isset($eventP)) {

    for ($i = 0; $i < count($eventP); $i++) {

        $field = str_replace("*", "/", [$eventP[$i]->image]);

        fputcsv($handle, $field);

        if(isset($eventP[$i]->photo)) {

            for ($j = 0; $j < count($eventP[$i]->photo); $j++) {

                $field = str_replace("*", "/", [$eventP[$i]->photo[$j]->lien]);

                fputcsv($handle, $field);

            }

        }

    }

}

header("Location: ../file/photosEvents.csv");