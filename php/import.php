<?php
    $dir = "img/";
    $files = scandir($dir);
    for($i = 0; $i < count($files); $i++){
        if($files[$i] == "." || $files[$i] == ".."){
            unset($files[$i]);
        }
    }
?>