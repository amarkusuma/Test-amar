
<?php 

function getName($characters) { 
   
    $randomString = ''; 
  
    for ($i = 0; $i < count(str_split($characters)); $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
  
    return $randomString; 
} 
  
echo getName('DFHKNQ') ;