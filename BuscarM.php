<?php
	$mysqli = new mysqli("localhost","Krystal","1234","hospital");

	$salida = "";
	$query = "SELECT * FROM medicos ORDER BY Nombre";

	if(isset($_POST['consulta'])){
		$q = $mysqli->real_escape_string($_POST['consulta']);
		$query = "SELECT Nombre, ApellidoP, ApellidoM, Curp, NSS, Sexo, FechaNac, FechaIngr, Especialidad, Domicilio FROM medicos WHERE Nombre LIKE '%".$q."%' OR ApellidoP LIKE '%".$q."%' OR ApellidoM LIKE '%".$q."%' OR Curp LIKE '%".$q."%' OR NSS LIKE '%".$q."%' OR Sexo LIKE '%".$q."%' OR FechaNac LIKE '%".$q."%' OR FechaIngr LIKE '%".$q."%' OR Especialidad LIKE '%".$q."%' OR Domicilio LIKE '%".$q."%'";
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
							<td style='text-align:center'bgcolor= '#FFA07A'>Apellido Materno</td>
							<td style='text-align:center'bgcolor= '#FFA07A'>Curp</td>
							<td style='text-align:center'bgcolor= '#FFA07A'>NSS</td>
							<td style='text-align:center'bgcolor= '#FFA07A'>Sexo</td>
							<td style='text-align:center'bgcolor= '#FFA07A'>Fecha Nacimiento</td>
							<td style='text-align:center'bgcolor= '#FFA07A'>Fecha Ingreso</td>
							<td style='text-align:center'bgcolor= '#FFA07A'>Especialidad</td>
							<td style='text-align:center'bgcolor= '#FFA07A'>Domicilio</td>
						</tr>
						</thead>
						<tbody>";

		while($fila = $resultado->fetch_assoc()){
			$salida.="<tr style='height:30px'>
						<td>".$fila['Nombre']."</td>
						<td>".$fila['ApellidoP']."</td>
						<td>".$fila['ApellidoM']."</td>
						<td>".$fila['Curp']."</td>
						<td>".$fila['NSS']."</td>
						<td>".$fila['Sexo']."</td>
						<td>".$fila['FechaNac']."</td>
						<td>".$fila['FechaIngr']."</td>
						<td>".$fila['Especialidad']."</td>
						<td>".$fila['Domicilio']."</td>
					</tr>";
		}
		$salida.="</tbody></table>";
	}else{
		$salida.="No hay datos";
	}

	echo $salida;

	$mysqli->close();

?>