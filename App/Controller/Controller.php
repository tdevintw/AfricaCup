<?php

namespace App\Controller;

class Controller
{
    public function render($nameFolder, $nameFile, $title, $result)
    {
        
        include "../app/View/{$nameFolder}/{$nameFile}.php";

        include '../app/View/include/layout.php';
    }
}
