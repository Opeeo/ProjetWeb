<?php

function displayCategory($nom) {
    echo "
    <div class=\"custom-control custom-checkbox\">
        <input type=\"checkbox\" class=\"custom-control-input\" id=\"". $nom ."\" name='check". $nom ."'>
        <label class=\"custom-control-label\" for=\"". $nom ."\">". $nom ."</label>
    </div>
    ";
}