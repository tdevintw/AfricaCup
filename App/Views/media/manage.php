<?php 

var_dump ($_SERVER['REQUEST_URI']);
$uri = $_SERVER['REQUEST_URI'];
$uri = explode('/', trim(strtolower($uri), '/'));
echo  "     next    ";
 var_dump($uri);
 echo "      next      ";
 $a = array_splice($uri, 0, 1);
 var_dump($a);
