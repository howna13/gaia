<?php
// Array with names
$a[] = "Canigó";
$a[] = "Pedraforca";
$a[] = "Peguera";


// get the q parameter from URL
$habitacio = $_REQUEST["habitacio"];

$hint = "";

// lookup all hints from array if $q is different from "" 
if ($habitacio !== "") {
    $q = strtolower($habitacio);
    $len=strlen($habitacio);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "no suggestion" : $hint;
?>