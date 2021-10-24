<!DOCTYPE html>
<html>
<head>
<title>Modificar Citas</title>
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
$sql="SELECT * FROM cita WHERE id_cita='".$id."'";
$resultado=mysqli_query($conn, $sql);
while ($fila=mysqli_fetch_assoc($resultado)) { ?>
<body id="login4">
<h1 align="center" ><font color="#A0522D">Modificar Cita</font></h1>
<div>
	<form>
			<label>Medico:</label>
			<div class="select">
				<select name="Curp_Medico">
					<option value="<?php echo $fila['Curp_Medico'] ?>"><?php echo $fila['Curp_Medico'] ?></option>
					<?php 
						$sql3 = "SELECT * FROM medicos";
						$resultado1 = mysqli_query($conn, $sql3);
						while ($mostrar = mysqli_fetch_array($resultado1)) {?>
				  			<option value="<?php echo $mostrar['Curp']?> <?php echo $mostrar['Nombre']?> <?php echo $mostrar['ApellidoP']?> <?php echo $mostrar['Especialidad']?>"><?php echo $mostrar['Curp']?> <?php echo $mostrar['Nombre']?> <?php echo $mostrar['ApellidoP']?> <?php echo $mostrar['Especialidad']?></option>
					<?php	} ?>
				</select></div><br><br>
			<label>Paciente:</label>
			<div class="select">
				<select name="Curp_Paciente">
					<option value="<?php echo $fila['Curp_Paciente'] ?>"><?php echo $fila['Curp_Paciente'] ?></option>
					<?php 
						$sql4 = "SELECT * FROM paciente";
						$resultado2 = mysqli_query($conn, $sql4);
						while ($mostrar = mysqli_fetch_array($resultado2)) {?>
				  			<option value="<?php echo $mostrar['Curp_P']?> <?php echo $mostrar['Nombre_P']?> <?php echo $mostrar['ApellidoP_P']?> <?php echo $mostrar['ApellidoM_P']?>"><?php echo $mostrar['Curp_P']?> <?php echo $mostrar['Nombre_P']?> <?php echo $mostrar['ApellidoP_P']?> <?php echo $mostrar['ApellidoM_P']?></option>
							
					<?php	} ?>
				</select></div><br><br>
			<label>Fecha de la Cita:</label>
			<input type="date" min="<?php echo date('Y-m-d');?>" placeholder="Fecha de la Cita" name="Fecha" value="<?php echo $fila['Fecha'] ?>">
			<label>Hora de la Cita:</label>
			<input type="time" min="09:00" max="20:30" step="1800" placeholder="Hora de la Cita" name="Hora" value="<?php echo $fila['Hora'] ?>">
			<input type="submit" value="Agendar Cita" name="" id="boton">

	</form>
	<?php } ?>
</div>
</body>
<?php 
	$Curp_Medico=$_GET['Curp_Medico'];
	$Curp_Paciente =$_GET['Curp_Paciente'];
	$Fecha=$_GET['Fecha'];
	$Hora=$_GET['Hora'];
	if ($Curp_Medico!=null||$Curp_Paciente!=null||$Fecha!=null||$Hora!=null) {
		$sql2="UPDATE cita SET Curp_Medico='".$Curp_Medico."', Curp_Paciente='".$Curp_Paciente."', Fecha='".$Fecha."', Hora='".$Hora."' WHERE Curp_Medico='".$Curp_Medico."'";
		mysqli_query($conn, $sql2);
		if ($Nombre=1) {
			header("location:ConsultaC.php");
		}
	}
	// No mostrar los errores de PHP
	error_reporting(0);
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
