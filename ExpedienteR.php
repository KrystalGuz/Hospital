<?php 
$db = "hospital";
		$link = mysqli_connect("localhost", "Krystal", "1234", $db) or die ("<h2>No hay conexion</h2>");
		session_start();
		if(!isset($_SESSION['User'])){
				header("Location: index.html");
		}
	$id_user = $_SESSION['User'];
	$consulta = "SELECT Nombre FROM medicos WHERE Curp = '$id_user'";
	$result = $link->query($consulta);?>
<?php
$conn = new mysqli("localhost","Krystal","1234","hospital");?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Expediente</title>
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script|Great+Vibes" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Fahkwang" rel="stylesheet">
	<link  rel="shortcurt icon" href="favicon.ico">
	<link rel="stylesheet" type="text/css" href="css.css">
	<link rel="icon" type="image/png" href="logo.jpeg">

</head>
<body id="login5"> 


	<br>
	<br>
<a href="logout.php"><img width="3%" height="5%" id="usua" src="usua.png"></a>
	<form action="RegistroR.php" method="POST">
				
			<h1>Crear Expediente<br><br><img class="imagen" width="40%" height="40%" src="logo.jpeg"></h1>
			<label>Numero de Cita:</label>
			<input type="text" name="Id_cita" placeholder="Numero de Cita" required="required">
			<label>Medico:</label><br>
			<input type="text" name="Curp_M" value="<?php echo $_SESSION['User']; ?>">
<!-- 		 <div class="select">
				<select name="Curp_Medico">
					 <?php 
						$sql = "SELECT * FROM medicos";
						$resultado = mysqli_query($conn, $sql);
						while ($mostrar = mysqli_fetch_array($resultado)) {?>
				  			<option value="<?php echo $mostrar['Curp']?> <?php echo $mostrar['Nombre']?> <?php echo $mostrar['ApellidoP']?> <?php echo $mostrar['Especialidad']?>"><?php echo $mostrar['Curp']?> <?php echo $mostrar['Nombre']?> <?php echo $mostrar['ApellidoP']?> <?php echo $mostrar['Especialidad']?></option>
							
					<?php	} ?>
 				</select></div><br><br> -->
			<br><label>Paciente:</label>
			<div class="select">
				<select name="Curp_P">
					<?php 
						$sql = "SELECT * FROM paciente";
						$resultado = mysqli_query($conn, $sql);
						while ($mostrar = mysqli_fetch_array($resultado)) {?>
				  			<option value="<?php echo $mostrar['Curp_P']?>"><?php echo $mostrar['Curp_P']?> <?php echo $mostrar['Nombre_P']?> <?php echo $mostrar['ApellidoP_P']?> <?php echo $mostrar['ApellidoM_P']?></option>
							
					<?php	} ?>
				</select></div><br><br>
			<label>Peso:</label>
			<input type="Num" placeholder="Peso" name="Peso" required="required">
			<label>Talla:</label>
			<input type="Num" placeholder="Talla" name="Talla" required="required">
			<label>Fecha de Hoy:</label>
			<input type="date" value="<?php echo date('Y-m-d');?>"placeholder="Fecha de la Cita" name="FechaH" required="required">
			<label>Observaciones:</label>
			<input type="text" name="Observaciones" placeholder="Observaciones" required="required">
			<label>Receta:</label>
			<input type="text" name="Receta" placeholder="Observaciones" required="required">
			<input type="submit" value="Crear Expediente" name="" id="boton">

	</form>
	
</body>
</html>