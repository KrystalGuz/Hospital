<!DOCTYPE html>
<html>
<head>
<title>Modificar de Paciente</title>
<link rel="icon" type="image/png" href="Logo.jpeg">
<link rel="stylesheet" type="text/css" href="css.css">
<style type="text/css">
body{
background:fondo4.jpg;
background-repeat: no-repeat;
 background-size: 100% 450%;
}
</style>
</head>
<?php
$conn = new mysqli("localhost","Krystal","1234","hospital");
$id=$_GET['id'];
$sql="SELECT * FROM paciente WHERE Nombre_P='".$id."'";
$resultado=mysqli_query($conn, $sql);
while ($fila=mysqli_fetch_assoc($resultado)) { ?>
<body id="login4">
<h1 align="center" ><font color="#A0522D">Modificar Paciente</font></h1>
<div>
	<form>
			<label>Nombre:</label>
			<input type="text" name="Nombre_P" placeholder="Nombre" value="<?php echo $fila['Nombre_P'] ?>">
			<label>Apellido Paterno:</label>
			<input type="text" placeholder="Apellido" name="ApellidoP_P" value="<?php echo $fila['ApellidoP_P'] ?>">
			<label>Apellido Materno:</label>
			<input type="text" placeholder="Apellido" name="ApellidoM_P" value="<?php echo $fila['ApellidoM_P'] ?>">
			<label>CURP:</label>
			<input type="text" placeholder="CURP" name="Curp_P" value="<?php echo $fila['Curp_P'] ?>">
			<label>NSS:</label>
			<input type="text" placeholder="NSS" name="NSS_P" value="<?php echo $fila['NSS_P'] ?>">
			<label>Telefono:</label>
			<input type="tel" placeholder="Telefono" name="Telefono" value="<?php echo $fila['Telefono'] ?>">
			<label>Domicilio:</label>
			<input type="text" placeholder="Domicilio" name="Domicilio_P" value="<?php echo $fila['Domicilio_P'] ?>"> 
			<input type="submit" name="" value="Actualizar">
	</form>
	<?php } ?>
</div>
</body>
<?php 
	$Nombre_P=$_GET['Nombre_P'];
	$ApellidoP_P=$_GET['ApellidoP_P'];
	$ApellidoM_P =$_GET['ApellidoM_P'];
	$Curp_P=$_GET['Curp_P'];
	$NSS_P=$_GET['NSS_P'];
	$Telefono=$_GET['Telefono'];
	$Domicilio_P=$_GET['Domicilio_P'];
	if ($Nombre_P!=null||$ApellidoP_P!=null||$ApellidoM_P!=null||$Curp_P!=null||$NSS_P!=null||$Telefono_P!=null||$Domicilio_P!=null) {
		$sql2="UPDATE paciente SET Nombre_P='".$Nombre_P."', ApellidoP_P='".$ApellidoP_P."', ApellidoM_P='".$ApellidoM_P."', Curp_P='".$Curp_P."', NSS_P='".$NSS_P."', Telefono='".$Telefono."', Domicilio_P='".$Domicilio_P."' WHERE Nombre_P='".$Nombre_P."'";
		mysqli_query($conn, $sql2);
		if ($Nombre=1) {
			header("location:ConsultaP.php");
		}
	}
	// No mostrar los errores de PHP
	error_reporting(0);
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
