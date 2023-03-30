<?php
include_once '../modelo/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
session_start();

$consulta = "SELECT * FROM ventas";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);
$varsesion = $_SESSION['correo'];

if($varsesion == null || $varsesion=''){
    echo "<script> alert('Por favor, Inicie Sesion')
    location.href = '../vista/login.php';</script>";
} 
?>
<!Doctype html>
<html lang="es">
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
<style>
	table.dataTable thead{
		background: linear-gradient(to right, #0575E6, #00f260);
		color:white;
	}
	</style>
</head>
<body>
<header>
        <a href="../Index.php" class="logo">
            <img src="../img/logo.png" alt="Logo de la compañia">
            <h2 class="nombreE">COFEE-COFFE</h2>
        </a>
        <nav>
            <a href="../Index.php">Inicio</a>
            <a href="../vista/producto.php">Productos</a>
            <a href="registroventas.php">Registro Ventas</a>
			<a href="./controlador/logaut.php">Cerrar Sesion</a>
        </nav> 
  </header>
<br>
	<h1 class="text-center">Registro de Ventas</h1>
	<h3 class="text-center">COFFE-COFFE</h3><br>
	
	<div class="container">
	<div class="row">
		<div class="col-lg-12">
		<table id="tablaUsuarios" class="table table-white table-borderless table-striped table-bordered border-black" style="width: 100%">
			<thead class="text-center">
			<th>id</th>
			<th>Nombre</th>
			<th>Precio Unitario</th>
			<th>Cantidad</th>
			<th>Total</th>
			<th>Acciones</th>
			</thead>
			<tbody>
			<?php
			foreach($usuarios as $filtro){
			?>
			<tr>
				<td><?php echo $filtro['Id']?></td>
				<td><?php echo $filtro['nombre']?></td>
				<td><?php echo $filtro['precio_unit']?></td>
				<td><?php echo $filtro['cantidad']?></td>
				<td><?php echo $filtro['total']?></td>
				

				<td><button type="button" class="btn btn-success editbtn" data-bs-toggle="modal" data-bs-target="#editar">Editar</button>
					<button type="button" class="btn btn-danger deletebtn" data-bs-toggle="modal" data-bs-target="#eliminar">Eliminar</button></td>
				</tr>
				<?php
			}
			
				?>
			</tbody>
			</table>
		   </div>
		   <!-- Modal -->
		   <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title fs-5" id="editar">Editar Datos Seleccionados</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form action="../controlador/editar.php" method="post">
							<input type="hiden" name="id" id="update_id">

							<div class="form-group">
							<label for="">Nombre</label>
							<input type="text" name="nombre" id="nombre" class="form-control">
							</div>
							<div class="form-group">
							<label for="">Precio Unitario</label>
							<input type="number" name="precio" id="precio" class="form-control" readOnly>
							</div>
							<div class="form-group">
							<label for="">Cantidad</label>
							<input type="number" name="cantidad" oninput="calcular()" id="cantidad" class="form-control">
							</div>
							<div class="form-group">
							<label for="">Total</label>
							<input type="number" name="total" id="total" class="form-control" readOnly>
							</div>
							<script type="text/javascript">
							tol.readOnly = true;
								function calcular(){
									try {
										var a = parseFloat(document.getElementById("cantidad").value);
											b = parseFloat(document.getElementById("precio").value);

										document.getElementById("total").value = a * b;
									}catch (e) {}

								}
							</script>
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      	  			<button type="submit" class="btn btn-success">Actualizar</button>
					</div>
					</form>
					</div>
				</div>
				</div>
		</div>
		   <!--- Modal de eliminar --->
				<div class="modal fade" id="eliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title fs-5" id="eliminar">Eliminar Datos Seleccionados</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<h4>Quieres Eliminar Datos Seleccionados</h4>
						<form action="../controlador/eliminar.php" method="post">
							<input type="hidden" name="id" id="delete_id">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-dark" data-bs-dismiss="modal">No</button>
						<button type="submit" class="btn btn-danger">Eliminar</button>
					</div>
					</form>
					</div>
				</div>
				</div>
		</div>
	</div>

	<script>
$('.editbtn').on('click',function(){
	
	$tr=$(this).closest('tr');
	var datos=$tr.children("td").map(function(){
	 return $(this).text();
	});
	$('#update_id').val(datos[0])
	$('#nombre').val(datos[1])
	$('#precio').val(datos[2]);
	$('#cantidad').val(datos[3]);
	$('#total').val(datos[4]);
});

</script>
<script>
	$('.deletebtn').on('click',function(){

		$tr=$(this).closest('tr');
		var datos=$tr.children("td").map(function(){
			return $(this).text();
		});
		$('#delete_id').val(datos['0']);
	});
	</script>
		</body>
		</html>