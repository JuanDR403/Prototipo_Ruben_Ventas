<?php 
$usuario="root";
$clave="";
$nombrebd="coffe";
try{
    $bd = new PDO('mysql:host=localhost;dbname='.$nombrebd,$usuario,$clave);

} catch(Exception $e){
    echo"<script> alert('todos los campos son obligatorios');</script>".$e->getMessage();

}

?>