<?php
 $conexion=mysqli_connect('localhost','Krystal','1234','hospital');
?>
<!DOCTYPE html>
<html>
<head>
<title>Consulta de Pacientes</title>
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
<br>
<h1 align="center" ><font color="#A0522D">Pacientes registrados</font></h1><a href="logout.php"><img width="3%" height="5%" id="usu" src="usua.png"></a><br><br>
<center>
</center>
<br>
<center><table width="900" border="3" style="background-color: #F4A460;">
<tr align="center">
<td><font color="black">Nombre</font></td>
<td><font color="black">Apellido Paterno</font></td>
<td><font color="black">Apellido Materno</font></td>
<td><font color="black">Curp</font></td>
<td><font color="black">NSS</font></td>
<td><font color="black">Telefono</font></td>
<td><font color="black">Domicilio</font></td>
<td><font color="black">Modificar</font></td>
</center></tr>
<?php
$sql="SELECT * FROM paciente";
$resultado=mysqli_query($conexion,$sql);
while($mostrar=mysqli_fetch_array($resultado)){
?>

<tr align="center">
<td><?php echo $mostrar['Nombre_P']?></td>
<td><?php echo $mostrar['ApellidoP_P']?></td>
<td><?php echo $mostrar['ApellidoM_P']?></td>
<td><?php echo $mostrar['Curp_P']?></td>
<td><?php echo $mostrar['NSS_P']?></td>
<td><?php echo $mostrar['Telefono']?></td>
<td><?php echo $mostrar['Domicilio_P']?></td>
<td><a href="ModificarP.php?id=<?php echo $mostrar['Nombre_P']?>">Editar</a></form></td>
</tr>
<?php

}
?>
</table>

<br><input style="height:50px;width:100px" type="button" onclick="location.href='Bienvenida.html'" value="Regresar" name="boton" />
</body>
</html>