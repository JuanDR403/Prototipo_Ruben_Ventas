<?php
include_once 'modelo/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
session_start();

$consulta = "SELECT * FROM cafe";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);

$varsesion = $_SESSION['correo'];

if($varsesion == null || $varsesion=''){
    echo "<script> alert('Inicie Sesion')
    location.href = './vista/login.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COFFE-COFFE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3bebcf64c8.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="img/logo.png">
    <link rel="stylesheet" href="./styles/Style.css">
</head>
<body>
    <header>
        <a href="Index.php" class="logo">
            <img src="./img/logo.png" alt="Logo de la compañia">
            <h1 class="nombreE">Coffe-Coffe</h1>
        </a>
        <nav class="navar_a">
            <h5>
            <a href="Index.php">Inicio</a>
            <a href="./vista/producto.php">Productos</a>
            <a href="./vista/registroventas.php">Registro Ventas</a>
            <a href="./controlador/logaut.php">Cerrar Sesion</a>
            </h5>
        </nav> 
       
  </header>
  <section class="textosheader">
    <h1>El mejor cafe Colombianos</h1>
    <h1>lo encuentras con COFFE-COFFE</h1><br>
    <H3>"La vida es como una taza de cafe, todo esta en como la preparas, pero sobre todo en como te lo tomas."</H3>
</section>
<div class="conteiner-items">
    <div class="producto">
        <figure>
            <img src="./img/cafe1.png" alt="HOME - Café Mulato Orgánico">
        </figure>
        <div class="info-product">
            <h2>HOME-Cafe Mulato Organico</h2><br>
            <h5>$17.500.00</h5>
        </div>
        <center><button type="button" ><a href="./vista/comprar.php">Comprar</a></button></center>

    </div>

    <div class="producto">
        <figure>
            <img src="./img/cafe2.jpg" alt="Finca Loma - Café Green Hills">
        </figure>
        <div class="info-product">
            <h2>Finca Loma - Café Green Hills</h2><br>
            <h5>$15.500.00</h5>
        </div>
        <center><button type="button" ><a href="./vista/comprar2.php">Comprar</a></button></center>
    </div>
</div>

</body>
</html>