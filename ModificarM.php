<!DOCTYPE html>
<html>
<head>
<title>Modificar Medico</title>
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
$sql="SELECT * FROM medicos WHERE Nombre='".$id."'";
$resultado=mysqli_query($conn, $sql);
while ($fila=mysqli_fetch_assoc($resultado)) { ?>
<body id="login4">
<h1 align="center" ><font color="#A0522D">Modificar Medico</font></h1>
<div>
	<form>
			<label>Nombre:</label>
			<input type="text" name="Nombre" placeholder="Nombre" value="<?php echo $fila['Nombre'] ?>">
			<label>Apellido Paterno:</label>
			<input type="text" placeholder="Apellido" name="ApellidoP" value="<?php echo $fila['ApellidoP'] ?>">
			<label>Apellido Materno:</label>
			<input type="text" placeholder="Apellido" name="ApellidoM" value="<?php echo $fila['ApellidoM'] ?>">
			<label>CURP:</label>
			<input type="text" placeholder="CURP" name="Curp" value="<?php echo $fila['Curp'] ?>">
			<label>NSS:</label>
			<input type="text" placeholder="NSS" name="NSS" value="<?php echo $fila['NSS'] ?>">
			<label>Sexo:</label>
			<div class="select"><select name="Sexo">
			  <option value="<?php echo $fila['Sexo'] ?>"><?php echo $fila['Sexo'] ?></option>
			  <option value="Mujer">Mujer</option>
			  <option value="Hombre">Hombre</option>
			</select></div><br><br>
			<label>Fecha de nacimiento:</label>
			<input type="date" placeholder="Fecha de Nacimiento" name="FechaNac" value="<?php echo $fila['FechaNac'] ?>">
			<label>Fecha de Ingreso:</label>
			<input type="date" placeholder="Fecha de Ingreso" name="FechaIngr" value="<?php echo $fila['FechaIngr'] ?>">
			<label>Especialidad:</label>
			<div class="select"><select name="Especialidad">
				  <option value="<?php echo $fila['Especialidad'] ?>"><?php echo $fila['Especialidad'] ?></option>
				  <option value="Anestesiología">Anestesiología</option>
				  <option value="Anatomía Patológica">Anatomía Patológica</option>
				  <option value="Angiología y Cirugía Vascular">Angiología y Cirugía Vascular</option>
				  <option value="Cardiología">Cardiología</option>
				  <option value="Cardiología Intervencionista">Cardiología Intervencionista</option>
				  <option value="Cirugía Pediátrica">Cirugía Pediátrica</option>
				  <option value="Cirugía General">Cirugía General</option>
				  <option value="Cardiología Intervencionista">Cardiología Intervencionista</option>
				  <option value="Cirugía Oncológica">Cirugía Oncológica</option>
				  <option value="Cirugía Plástica y Reconstructiva">Cirugía Plástica y Reconstructiva</option>
				  <option value="Dentista">Dentista</option>
				  <option value="Dermatología">Dermatología</option>
				  <option value="Endoscopia">Endoscopia</option>
				  <option value="Gastroenterología">Gastroenterología</option>
				  <option value="Ginegología y Obstetricia">Ginegología y Obstetricia</option>
				  <option value="Hematología">Hematología</option>
				  <option value="Infectología">Infectología</option>
				  <option value="Medicina Aeroespacial">Medicina Aeroespacial</option>
				  <option value="Medicina de Rehabilitación">Medicina de Rehabilitación</option>
				  <option value="Medicina Interna">Medicina Interna</option>
				  <option value="Medicina del Enfermo en Estado Crítico">Medicina del Enfermo en Estado Crítico</option>
				  <option value="Nefrología">Nefrología</option>
				  <option value="Neurología">Neurología</option>
				  <option value="Neumología">Neumología</option>
				  <option value="Oftalmología">Oftalmología</option>
				  <option value="Oncología Médica">Oncología Médica</option>
				  <option value="Oncología Pediátrica">Oncología Pediátrica</option>
				  <option value="Ortopedia">Ortopedia</option>
				  <option value="Otorrinolaringología">Otorrinolaringología</option>
				  <option value="Patología Clínica">Patología Clínica</option>
				  <option value="Pediatría">Pediatría</option>
				  <option value="Psiquiatría General">Psiquiatría General</option>
				  <option value="Radiología e Imagen">Radiología e Imagen</option>
				  <option value="Radio-Oncología">Radio-Oncología</option>
				  <option value="Urología">Urología</option>
			</select></div><br><br>
			<label>Domicilio:</label>
			<input type="text" placeholder="Domicilio" name="Domicilio" value="<?php echo $fila['Domicilio'] ?>"> 
			<input type="submit" name="" value="Actualizar">
	</form>
	<?php } ?>
</div>
</body>
<?php 
	$Nombre=$_GET['Nombre'];
	$ApellidoP=$_GET['ApellidoP'];
	$ApellidoM =$_GET['ApellidoM'];
	$Curp=$_GET['Curp'];
	$NSS=$_GET['NSS'];
	$Sexo=$_GET['Sexo'];
	$FechaNac=$_GET['FechaNac'];
	$FechaIngr=$_GET['FechaIngr'];
	$Especialidad=$_GET['Especialidad'];
	$Domicilio=$_GET['Domicilio'];
	if ($Nombre!=null||$ApellidoP!=null||$ApellidoM!=null||$Curp!=null||$NSS!=null||$Sexo!=null||$FechaNac!=null||$FechaIngr!=null||$Especialidad!=null||$Domicilio!=null) {
		$sql2="UPDATE medicos SET Nombre='".$Nombre."', ApellidoP='".$ApellidoP."', ApellidoM='".$ApellidoM."', Curp='".$Curp."', NSS='".$NSS."', Sexo='".$Sexo."', FechaNac='".$FechaNac."', FechaIngr='".$FechaIngr."', Especialidad='".$Especialidad."', Domicilio='".$Domicilio."' WHERE Nombre='".$Nombre."'";
		mysqli_query($conn, $sql2);
		if ($Nombre=1) {
			header("location:ConsultaM.php");
		}
	}
	// No mostrar los errores de PHP
	error_reporting(0);
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
