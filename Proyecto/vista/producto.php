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
    <link rel="shortcut icon" href="../img/logo.png">
    <link rel="stylesheet" href="../styles/StyleProducto.css">
</head>
<body>
    <header>
        <a href="Index.php" class="logo">
            <img src="../img/logo.png" alt="Logo de la compañia">
            <h1 class="nombreE">Coffe-Coffe</h1>
        </a>
        <nav class="navar_a">
            <h5>
            <a href="../Index.php">Inicio</a>
            <a href="../vista/producto.php">Productos</a>
            <a href="../vista/registroventas.php">Registro Ventas</a>
            <a href="../controlador/logaut.php">Cerrar Sesion</a>
            </h5>
        </nav> 
       
  </header>
  <body>
  <center>
    <br>

    <form action="" method="POST" enctype="multipart/form-data">
    <div class="card border-dark mb-3" style="max-width: 1140px;">
         <div class="row g-0">
            <div class="col-md-4">
                <div class="content_uploader">
                    <div class="box">
                        <input class="filefield" type="file" name="archivo">
                        <p class="select_bottom">Seleccionar un archivo</p>
                    <div class="spinner"></div>
                <div class="overlay_uploader"></div>
            </div>
  
                <script>$(document).ready(function(){
                $('.select_bottom').click(function(){
                        $('.filefield').trigger('click');
                    })
                $('.filefield').change(function(){
                    if($(this).val()!=''){
                    $('.overlay_uploader').show();  
                    $('.spinner').show();  
                    readURL2(this);
                    }
                })
                })
                function readURL2(input) {
                    if(input.files[0].type=='image/jpeg' || input.files[0].type=='image/png') {
                        $.each(jQuery(input)[0].files, function (i, file) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                            $('.overlay_uploader').hide();  
                            $('.spinner').hide();  
                            $('.box').css('background-image','url('+ e.target.result+')');
                            }
                            reader.readAsDataURL(input.files[0]);
                        });
                    }else{
                        $('.overlay_uploader').hide();  
                        $('.spinner').hide();
                        alert("Solo se permiten archivos .jpg y .png");
                    }
                }</script>
        </div>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Ingrese los datos</h5><br>
        <div class="contenedor"> 
            <center>
            
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" style="width: 65%" placeholder="Nombre" ><br>
                <label>Precio</label>
                <input type="number" name="precio" class="form-control" style="width: 65%" placeholder="Ejemplo:  25000" ><br>
                <label>Peso</label>
                <input type="number" name="peso" class="form-control" placeholder="Kg" style="width: 65%" ><br>
                <input type="submit" name="btn_guardar" class="btn btn-success" value="Guardar" >
                    
                    <?php
                include("../modelo/conexioncrud.php");
                $conexion = $objeto->Conectar();
                if(isset($_POST['btn_guardar']))
                {
                $archivo = $_FILES['archivo']['name'];
                $nombre = $_POST['nombre'];
                $precio = $_POST['precio'];
                $peso = $_POST['peso'];
                    
                if($archivo=="" || $nombre=="" || $precio=="" || $peso=="")
                    
                {			
                echo "<script> alert('Todos los campos son obligatorios')
                location.href = '../vista/producto.php';</script>";
                }
                    
                else{
                   
                        $carpeta_destino = "uploads/"; // Indica la carpeta de destino
                        $archivo = $_FILES['archivo']['name']; // Nombre del archivo
                        $ruta_archivo = $carpeta_destino . $archivo; // Ruta completa del archivo

                        // Si la carpeta no existe, la crea
                        if (!file_exists($carpeta_destino)) {
                            mkdir($carpeta_destino);
                        }

                        // Mueve el archivo a la carpeta de destino
                        if (move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta_archivo)) {
                            // Si el archivo se ha movido correctamente, guarda el registro en la base de datos
                            $query = mysqli_query($conectar, "INSERT INTO cafe (foto, nombre, precio, peso) values ('$ruta_archivo', '$nombre', '$precio','$peso kg')"); 
}                   if ($query){
                        echo "<script> alert('Registro Exitoso')
                            location.href = '../index.php';</script>";
                    } else {
                        echo "<script> alert('Hubo un problema al registrar el producto. Intenta de nuevo.')
                            location.href = '../vista/producto.php';</script>";
                    }

                
                }
                
                }	
                ?>
                 </div>            
                
                </div>
            </div>
        </div>
    </form>
       
               
  </center>

  <h1 class="text-center">Productos a Vender</h1><br>
	
	<div class="container">
	<div class="row">
		<div class="col-lg-12">
		<table id="tablaUsuarios" class="table table-white table-borderless table-striped table-bordered border-black" style="width: 100%">
			<thead class="text-center">
			<th>id</th>
			<th>Foto</th>
			<th>Nombre</th>
			<th>Precio</th>
			<th>Peso</th>
			<th>Acciones</th>
			</thead>
			<tbody>
			<?php
			foreach($usuarios as $filtro){
			?>
			<tr>
				<td><?php echo $filtro['Id']?></td>
				<td><?php echo "<img src='../vista/uploads/" . $filtro['foto'] . "' width='200'>";?></td>
				<td><?php echo $filtro['nombre']?></td>
				<td><?php echo $filtro['precio']?></td>
				<td><?php echo $filtro['peso']?></td>
				

				<td><button type="button" class="btn btn-success editbtn" data-bs-toggle="modal" data-bs-target="#editar">Editar</button>
					<button type="button" class="btn btn-danger deletebtn" data-bs-toggle="modal" data-bs-target="#eliminar">Eliminar</button></td>
				</tr>
				<?php
			}
			
				?>
			</tbody>
			</table>
		   </div>
      
  </body>

  </html>