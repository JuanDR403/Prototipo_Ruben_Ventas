<?php 
include_once("../modelo/edit.php");
$Id= $_POST['id'];

$sentencia = $bd->prepare("DELETE FROM ventas WHERE Id=:id");
$sentencia->bindParam(':id',$Id);

if($sentencia->execute()){
    echo "<script> alert('Edicion Exitoso')
    location.href = '../vista/registroventas.php';</script>";
}
else{
    return"Error";
}
?>