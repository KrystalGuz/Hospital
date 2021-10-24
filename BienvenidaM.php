<?php 
$db = "hospital";
		$link = mysqli_connect("localhost", "Krystal", "1234", $db) or die ("<h2>No hay conexion</h2>");
		session_start();
		if(!isset($_SESSION['User'])){
				header("Location: index.html");
		}
	$id_user = $_SESSION['User'];
	$consulta = "SELECT Nombre FROM medicos WHERE Curp = '$id_user'";
	$result = $link->query($consulta);?>
<script src="anijs-min.js"></script>
<html lang="es">
<head>
    <!-- AniCollection.css library -->
    <link rel="stylesheet" href="http://anijs.github.io/lib/anicollection/anicollection.css">
</head>
<head data-anijs="if: click, do: flipInY animated">
	<meta charset="utf-8">
	<title>Bienvenida</title>
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script|Great+Vibes" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Fahkwang" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<link  rel="shortcurt icon" href="favicon.ico">
	<link rel="stylesheet" type="text/css" href="css.css">
	<link rel="stylesheet" type="text/css" media="screen" href="css1.css" />
	<link rel="icon" type="image/jpeg" href="Logo.jpeg">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8" />

</head>
<body id="login2"> 

	<nav id="loginB"><h1>Hospital HisE<br><img width="60%" height="60%" src="Logo.jpeg"></h1>
		<h1 style="color:lightpink;">Medico</h1>
	</nav>
<a href="logout.php"><img width="3%" height="5%" id="usu" src="usua.png"></a>
	<br>
	<br>
	<br>
	<form>
	    <div class="container">
          <div class="box">
                <div class="content">
                	<h2>Historial</h2>
                	<h3>Expedientes</h3>
                	<p>En este apartado puedes buscar los expedientes.</p>
                	<a href="ExpedienteR.php">Crear Expediente</a><a href="ConsultaR.php">Expedientes</a>
                </div>
           </div>
           <br>
          <div class="box">
                <div class="content">
                     <h2>Agenda</h2>
                     <h3>Citas</h3>
                     <p>En este apartado puedes ver las citas</p>
                     <a href="CitasM.php">Citas</a>
                    </div>
          </div>
    </div>
	</form>

</body>
</html>