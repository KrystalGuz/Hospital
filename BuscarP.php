<?php
	$mysqli = new mysqli("localhost","Krystal","1234","hospital");

	$salida = "";
	$query = "SELECT * FROM paciente ORDER BY Nombre_P";

	if(isset($_POST['consulta'])){
		$q = $mysqli->real_escape_string($_POST['consulta']);
		$query = "SELECT Nombre_P, ApellidoP_P, ApellidoM_P, Curp_P, NSS_P, Telefono, Domicilio_P FROM paciente WHERE Nombre_P LIKE '%".$q."%' OR ApellidoP_P LIKE '%".$q."%' OR ApellidoM_P LIKE '%".$q."%' OR Curp_P LIKE '%".$q."%' OR NSS_P LIKE '%".$q."%' OR Telefono LIKE '%".$q."%' OR Domicilio_P LIKE '%".$q."%'";
	}

	$resultado = $mysqli->query($query);
	if(!$resultado){
		die("Connection failed: " . mysqli_connect_error());
	}
	if($resultado->num_rows > 0){
		$salida.="<table border='2' cellpadding='0' cellspacing='0' width='100%' class='tabla_datos'>
					<thead>
						<tr style='height:40px'>
							<td style='text-align:center' bgcolor= '#FFA07A'>Nombre</td>
							<td style='text-align:center' bgcolor= '#FFA07A'>Apellido Paterno</td>
							<td style='text-align:center' bgcolor= '#FFA07A'>Apellido Materno</td>
							<td style='text-align:center' bgcolor= '#FFA07A'>Curp</td>
							<td style='text-align:center' bgcolor= '#FFA07A'>NSS</td>
							<td style='text-align:center' bgcolor= '#FFA07A'>Telefono</td>
							<td style='text-align:center' bgcolor= '#FFA07A'>Domicilio</td>
							<td style='text-align:center' bgcolor= '#B22222'>Modificar</td>
						</tr>
						</thead>
						<tbody>";

		while($fila = $resultado->fetch_assoc()){
			$salida.="<form class='bo' action='Bienvenida.html' method='POST'>
						<tr style='height:30px'>
						<td>".$fila['Nombre_P']."</td>
						<td>".$fila['ApellidoP_P']."</td>
						<td>".$fila['ApellidoM_P']."</td>
						<td>".$fila['Curp_P']."</td>
						<td>".$fila['NSS_P']."</td>
						<td>".$fila['Telefono']."</td>
						<td>".$fila['Domicilio_P']."</td>
						<td><input type='submit' value='$fila[Nombre_P]'></input></td>
					</tr>
					</form>";
		}
		$salida.="</tbody></table>";
	}else{
		$salida.="No hay datos";
	}

	echo $salida;

	$mysqli->close();

?>