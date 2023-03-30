<?php
include_once("../modelo/edit.php");
session_start();
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$cantidad = $_POST['cantidad'];
$total = $_POST['total'];


$sentencia = $bd->prepare("UPDATE ventas SET nombre= ?, cantidad= ?, total= ? WHERE id= ?;");
$resultado = $sentencia->execute([$nombre,$cantidad,$total,$id]);
if($resultado){
    echo "<script> alert('Cambio Exitoso')
    location.href = '../vista/registroventas.php';</script>";
}
else{
    return"Error";
}
?>