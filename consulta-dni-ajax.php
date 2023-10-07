<?php


$dni=$_POST["dni"];

if(strlen($dni)<8 || strlen($dni)>8)
{
    $prueba=1;
}
else{
    
        $prueba=file_get_contents('https://dniruc.apisperu.com/api/v1/dni/'.$dni.'?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImFsbGFuaGFyb2xkMTIzNDVAZ21haWwuY29tIn0.6xxLds4nmqLhGPfQQRhcYgG9Yxk2kIaXpIfj8njTPc8');
  
}

echo $prueba;


/*



$dni=$_POST["dni"];


if(strlen($dni)<8 || strlen($dni)>8)
{
    $prueba=1;
}
else{
    
    

   
        $prueba=file_get_contents('https://api.apis.net.pe/v1/dni?numero='.$dni.'');
   
  
}








echo $prueba;





*/