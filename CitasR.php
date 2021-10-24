<?php
$conn = new mysqli("localhost","Krystal","1234","hospital");?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Citas</title>
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script|Great+Vibes" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Fahkwang" rel="stylesheet">
	<link  rel="shortcurt icon" href="favicon.ico">
	<link rel="stylesheet" type="text/css" href="css.css">
	<link rel="icon" type="image/png" href="logo.jpeg">

</head>
<body id="login3"> 


	<br>
	<br>
<a href="logout.php"><img width="3%" height="5%" id="usua" src="usua.png"></a>
	<form action="RegistroC.php" method="POST">
				
			<h1>Agendar Citas<br><br><img class="imagen" width="40%" height="40%" src="logo.jpeg"></h1>
			<label>Medico:</label>
			<div class="select">
				<select name="Curp_Medico">
					<?php 
						$sql = "SELECT * FROM medicos";
						$resultado = mysqli_query($conn, $sql);
						while ($mostrar = mysqli_fetch_array($resultado)) {?>
				  			<option value="<?php echo $mostrar['Curp']?>"><?php echo $mostrar['Curp']?> <?php echo $mostrar['Nombre']?> <?php echo $mostrar['ApellidoP']?> <?php echo $mostrar['Especialidad']?></option>
							
					<?php	} ?>
				</select></div><br><br>
			<label>Paciente:</label>
			<div class="select">
				<select name="Curp_Paciente">
					<?php 
						$sql = "SELECT * FROM paciente";
						$resultado = mysqli_query($conn, $sql);
						while ($mostrar = mysqli_fetch_array($resultado)) {?>
				  			<option value="<?php echo $mostrar['Curp_P']?>"><?php echo $mostrar['Curp_P']?> <?php echo $mostrar['Nombre_P']?> <?php echo $mostrar['ApellidoP_P']?> <?php echo $mostrar['ApellidoM_P']?></option>
							
					<?php	} ?>
				</select></div><br><br>
			<label>Fecha de la Cita:</label>
			<input min="<?php echo date('Y-m-d');?>" type="date" placeholder="Fecha de la Cita" name="Fecha" required="required">
			<label>Hora de la Cita:</label>
			<input type="time" min="09:00" max="20:30" step="1800" placeholder="Hora de la Cita" name="Hora" required="required">
			<input type="submit" value="Agendar Cita" name="" id="boton">

	</form>
	
</body>
</html>