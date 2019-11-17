<?php

function displayCategory($nom) {
    echo "
    <div class=\"custom-control custom-checkbox\">
        <input type=\"checkbox\" class=\"custom-control-input\" id=\"CP1\" name='check". $nom ."'>
        <label class=\"custom-control-label\" for=\"CP1\">". $nom ."</label>
    </div>
    ";
}