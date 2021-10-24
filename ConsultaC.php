<?php
 $conexion=mysqli_connect('localhost','Krystal','1234','hospital');
?>
<!DOCTYPE html>
<html>
<head>
<title>Consulta de Citas</title>
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
<h1 align="center" ><font color="#A0522D">Citas Agendadas</font></h1><a href="logout.php"><img width="3%" height="5%" id="usu" src="usua.png"></a><br><br>
<br>
<center><table width="900" border="3" style="background-color: #F4A460;">
<tr align="center">
<td><font color="black">Numero de Cita</font></td>
<td><font color="black">Medico Asignado</font></td>
<td><font color="black">Paciente</font></td>
<td><font color="black">Fecha</font></td>
<td><font color="black">Hora</font></td>
<!-- <td><font color="black">Modificar</font></td> -->
</center></tr>
<?php
$sql="SELECT * FROM cita";
$resultado=mysqli_query($conexion,$sql);
while($mostrar=mysqli_fetch_array($resultado)){
?>

<tr align="center">
<td><?php echo $mostrar['id_cita']?></td>
<td><?php echo $mostrar['Curp_Medico']?></td>
<td><?php echo $mostrar['Curp_Paciente']?></td>
<td><?php echo $mostrar['Fecha']?></td>
<td><?php echo $mostrar['Hora']?></td>
<!-- <td><a href="ModificarC.php?id=<?php echo $mostrar['id_cita']?>">Editar</a></form></td> -->
</tr>
<?php

}
?>
</table>
<br><input style="height:50px;width:100px" type="button" onclick="location.href='Bienvenida.html'" value="Regresar" name="boton" />
</body>
</html>