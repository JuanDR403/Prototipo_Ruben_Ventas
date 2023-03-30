<?php
include('../modelo/conexioncrud.php');
$usuario=$_POST['correo'];
$contraseña=$_POST['password'];
session_start();


$consulta="SELECT*FROM user where correo='$usuario' and contraseña='$contraseña'";
$resultado=mysqli_query($conectar,$consulta);
$_SESSION['correo']=$resultado;
$filas=mysqli_num_rows($resultado);


if($filas){
    
    header("location:../index.php");

}else{
    ?>
    <?php
    include("../vista/login.php");

  ?>
  <h1 class="bad">ERROR DE AUTENTIFICACION</h1>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conectar);

?>