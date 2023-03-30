<?php
include_once '../modelo/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();


$consulta = "SELECT * FROM user";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../styles/login.css">
  <link rel="shortcut icon" href="img/logo.png">

  <title>COFEE-COFFE</title>
</head>
<body>
<section class="vh-90">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-black">
        <div class="px-5 ms-xl-4">
          <a href="../Index.php" class="logo">
            <img src="../img/logo.png" alt="Logo de la compañia">
            <h2 class="nombreE">COFEE-COFFE</h2>
        </a>
        </div>

        <div class="d-flex align-items-start h-custom px-2 ms-xl-4 mt-2 pt-5 pt-xl-0 mt-xl-n5">

          <form style="width: 23rem;" action="" method="post">

            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Registro</h3>
            
            <div class="form-outline mb-4">
              <input type="text" id="form2Example18" class="form-control form-control-lg" name="username">
              <label class="form-label" for="form2Example18">name</label>
            </div>

            <div class="form-outline mb-4">
              <input type="email" id="form2Example18" class="form-control form-control-lg" name="correo">
              <label class="form-label" for="form2Example18">Email address</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="form2Example28" class="form-control form-control-lg" name="password">
              <label class="form-label" for="form2Example28">Password</label>
            </div>

            <div class="pt-1 mb-4">
              <input class="btn btn-info btn-lg btn-block" name="btn_guardar" type="submit" value="Registrar">
            </div>

            <p class="small mb-2 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p>
            <p>Don't have an account? <a href="../vista/login.php" class="link-info">Login here</a></p>

            <?php
			include("../modelo/conexioncrud.php");
			$conexion = $objeto->Conectar();
			if(isset($_POST['btn_guardar']))
			{
			$name = $_POST['username'];
			$email = $_POST['correo'];
            $contraseña = $_POST['password'];
				
			if($name=="" || $email==""|| $contraseña=="")
				
			{			
			echo "<script> alert('Todos los campos son obligatorios')
			location.href = '../vista/register.php';</script>";
			}
				
			else{
		
			$query = mysqli_query($conectar, "INSERT INTO user (nombre,correo,contraseña) values ('$name', '$email','$contraseña')");	
			
				if($query){
					echo "<script> alert('Registro Exitoso')
			location.href = '../vista/login.php';</script>";
				}
			}
			
			}	
			?>

          </form>

        </div>

      </div>
      <div class="col-sm-6 px-0 d-none d-sm-block" id="imagen">
        <img src="../img/login.jpg"
          alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
      </div>
    </div>
  </div>
</section>
</body>

</html>
