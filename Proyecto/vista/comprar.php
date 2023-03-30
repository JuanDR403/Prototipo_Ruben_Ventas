<?php
include_once '../modelo/conexion.php';
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
    location.href = '../vista/login.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COFEE-COFFE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3bebcf64c8.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="img/logo.png">

    <link rel="stylesheet" href="../styles/Stylecomprar.css">
</head>
<body>
    <header>
        <a href="../Index.php" class="logo">
            <img src="../img/logo.png" alt="Logo de la compañia">
            <h2 class="nombreE">COFEE-COFFE</h2>
        </a>
        <nav>
            <a href="../Index.php">Inicio</a>
            <a href="./vista/producto.php">Productos</a>
            <a href="registroventas.php">Registro Ventas</a>
            <a href="./controlador/logaut.php">Cerrar Sesion</a>
        </nav> 
       
  </header>
  <center>
    <br>
  <div class="card border-dark mb-3" style="max-width: 1140px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="../img/cafe1.png" alt="HOME - Café Mulato Orgánico" id="cafe" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Comprar</h5><br>
        <div class="contenedor"> 
        <center>
            <form action="" method="POST">
            <h1> HOME-Cafe Mulato Organico</h1><br>
            <label>Cantidad</label>
            <input type="number" name="cantidad" id="valor1" oninput="calcular()" class="form-control" style="width: 65%" placeholder="Cantidad" ><br>
            <label>Total</label>
            <input type="number" name="total" id="tol" class="form-control" placeholder="Total" style="width: 65%" readOnly><br>
            <input type="submit" name="btn_guardar" class="btn btn-success" value="Guardar" >

            <script type="text/javascript">
                tol.readOnly = true;
                    function calcular(){
                        try {
                            var a = parseFloat(document.getElementById("valor1").value);

                            document.getElementById("tol").value = a * 17500;
                        }catch (e) {}

                    }
                </script>
                
                <?php
			include("../modelo/conexioncrud.php");
			$conexion = $objeto->Conectar();
			if(isset($_POST['btn_guardar']))
			{
			$cantidad = $_POST['cantidad'];
			$total = $_POST['total'];
				
			if($cantidad=="" || $total=="")
				
			{			
			echo "<script> alert('Todos los campos son obligatorios')
			location.href = '../vista/comprar.php';</script>";
			}
				
			else{
		
			$query = mysqli_query($conectar, "INSERT INTO ventas (nombre,cantidad,precio_unit,total) values ('HOME-Cafe Mulato Organico', '$cantidad','17500','$total')");	
			
				if($query){
					echo "<script> alert('Registro Exitoso')
			location.href = '../vista/comprar.php';</script>";
				}
			}
			
			}	
			?>
            </form>
        </div>            
                
    </div>
  </div>
</div>
               
  </center>
 
                </body>
                </html>