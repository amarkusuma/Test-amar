<?php

$kalimat = "Jakarta adalah ibukota negara Republik Indonesia";

function separate_words($x)
{
   $data = explode(' ', $x);
   

   foreach ($data as $value) {
       
        echo "$value".',';
   }
   
   echo "<br>";

   $bigram = array_chunk($data,2);

   foreach ($bigram as $key => $value) {
        
    echo implode(" " , $value).",";

   }
   
   echo "<br>";
   
   $trigram = array_chunk($data,3);

   foreach ($trigram as $key => $value) {
        
    echo implode(" " , $value).",";

   }

}

separate_words($kalimat);