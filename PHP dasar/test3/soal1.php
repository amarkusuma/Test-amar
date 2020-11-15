<?php

$arr = [
        ['f', 'g', 'h', 'i'],
        ['j', 'k', 'p', 'q'],
        ['r', 's', 't', 'u']
    ];

function cari($array, $x)
{
    $data = array();

    foreach ($array as  $value) {

      $data = array_merge($data,$value);

    }

    $words = str_split($x);

    $message = null;
    
    for ($i=0; $i < count($words) ; $i++) { 
        
        if (in_array( $words[$i], array_merge($data,$value)) == true) {
            $message = "true";
        }
        else{
            $message = "false";
        }
    }

    echo $message;

}

cari($arr, 'fghi'); // true
cari($arr, 'fghp'); // true
cari($arr, 'fjrstp'); // true