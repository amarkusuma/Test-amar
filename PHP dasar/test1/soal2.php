<?php 

$kalimat = "TranSISI";

function count_lowercase($x) 
{
   $data = preg_match_all("/[a-z]/", $x) ;
   
   echo "$data";
  
}

count_lowercase($kalimat);
