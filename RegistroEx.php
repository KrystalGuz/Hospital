<?php
$servername = "";
$database = "hospital";
$username = "Krystal";
$password = "1234";
// Create connection
$conn = mysqli_connect($servername,$username, $password, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected successfully";
	$Id_cita=$_POST['Id_cita'];
	$Curp_M=$_POST['Curp_M'];
	$Curp_P =$_POST['Curp_P'];
	$Peso=$_POST['Peso'];
	$Talla=$_POST['Talla'];
	$FechaH=$_POST['FechaH'];
	$Observaciones=$_POST['Observaciones'];
	$Receta=$_POST['Receta'];


	//consulta para insertar
	$sql = "INSERT INTO expediente (Id_cita, Curp_M, Curp_P, Peso, Talla, FechaH, Observaciones, Receta) VALUES ('$Id_cita', '$Curp_M', '$Curp_P', '$Peso', '$Talla', '$FechaH', '$Observaciones', '$Receta')";

	if (mysqli_query($conn, $sql)) {
      echo '<script> 
                        alert("!El expediente se ha registrado exitosamente!");
                        window.history.go(-1);</script>';

} else {
      echo  '<script> 
                        alert("Error al registrarse");
                        window.history.go(-1);</script>';
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

	mysqli_close($conn);

?>