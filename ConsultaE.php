<?php
 $db = "hospital";
        $link = mysqli_connect("localhost", "Krystal", "1234", $db) or die ("<h2>No hay conexion</h2>");
        session_start();
        if(!isset($_SESSION['User'])){
                header("Location: index.html");
        }
        $id_user = $_SESSION['User'];
        $Curp_Paciente = $_POST['Curp_Paciente'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Consulta de Expedientes</title>
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
<body>
<h1 align="center" ><font color="#A0522D">Expedientes</font></h1><a href="logout.php"><img width="3%" height="5%" id="usu" src="usua.png"></a><br><br>
<br>
<center><table width="1200" border="3" style="background-color: #F4A460;">
<tr align="center">
<td><font color="black">Numero de Cita</font></td>
<td><font color="black">Medico</font></td>
<td><font color="black">Paciente</font></td>
<td><font color="black">Peso</font></td>
<td><font color="black">Talla</font></td>
<td><font color="black">Fecha</font></td>
<td><font color="black">Observaciones</font></td>
<td><font color="black">Fecha de la Cita</font></td>
<td><font color="black">Hora de la Cita</font></td>
<td><font color="black">Receta</font></td>
<td><font color="black">Imprimir</font></td>

<!-- <td><font color="black">Modificar</font></td> -->
</center></tr>
<?php
$sql="SELECT DISTINCT * FROM expediente LEFT JOIN cita ON cita.Curp_Paciente = expediente.Curp_P WHERE cita.Curp_Paciente = '$Curp_Paciente'";
$resultado=mysqli_query($link,$sql);
while($mostrar=mysqli_fetch_array($resultado)){
?>

<tr align="center">
<td><?php echo $mostrar['Id_cita']?></td>
<td><?php echo $mostrar['Curp_M']?></td>
<td><?php echo $mostrar['Curp_P']?></td>
<td><?php echo $mostrar['Peso']?></td>
<td><?php echo $mostrar['Talla']?></td>
<td><?php echo $mostrar['FechaH']?></td>
<td><?php echo $mostrar['Observaciones']?></td>
<td><?php echo $mostrar['Fecha']?></td>
<td><?php echo $mostrar['Hora']?></td>
<td><?php echo $mostrar['Receta']?></td>
<td><a href="Recetas/Receta.php?id=<?php echo $mostrar['Id_cita']?>">Imprimir</a></form></td>

<!-- <td><a href="ModificarC.php?id=<?php echo $mostrar['id_cita']?>">Editar</a></form></td> -->
</tr>
<?php

}
?>
</table>
<br><input style="height:50px;width:100px" type="button" onclick="location.href='ConsultaR.php'" value="Regresar" name="boton" />
</body>
</html>