<?php
 $db = "hospital";
        $link = mysqli_connect("localhost", "Krystal", "1234", $db) or die ("<h2>No hay conexion</h2>");
        session_start();
        if(!isset($_SESSION['User'])){
                header("Location: index.html");
        }
        $id_user = $_SESSION['User'];
?>
<!DOCTYPE html>
<html>
<head>
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
<form action="ConsultaE.php" method="POST">
                     <label>¿Cual expediente quieres ver?<br>Paciente:</label>
                     <div class="select">
                            <select name="Curp_Paciente">
                                   <?php 
                                          $sql = "SELECT * FROM paciente";
                                          $resultado = mysqli_query($link, $sql);
                                          while ($mostrar = mysqli_fetch_array($resultado)) {?>
                                                 <option value="<?php echo $mostrar['Curp_P']?>"><?php echo $mostrar['Curp_P']?> <?php echo $mostrar['Nombre_P']?> <?php echo $mostrar['ApellidoP_P']?> <?php echo $mostrar['ApellidoM_P']?></option>
                                                 
                                   <?php  } ?>
                            </select></div><br><br>
                     <input type="submit" value="Buscar" name="" id="boton"></form>


<br><center><input style="height:50px;width:100px" type="button" onclick="location.href='BienvenidaM.php'" value="Regresar" name="boton" /></center>
</body>
</html>