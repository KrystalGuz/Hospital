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
	$Curp_Medico=$_POST['Curp_Medico'];
	$Curp_Paciente=$_POST['Curp_Paciente'];
	$Fecha =$_POST['Fecha'];
      $Hora =$_POST['Hora'];


      $verificar = mysqli_query($conn, "SELECT * FROM cita WHERE Curp_Medico = '$Curp_Medico' AND Fecha = '$Fecha' AND Hora = '$Hora'");
      if(mysqli_num_rows($verificar) > 0){
            echo  '<script> 
                        alert("Este Medico ya tiene una cita en esa fecha");
                        window.history.go(-1);</script>';
            exit;
      }
	//consulta para insertar
	$sql = "INSERT INTO cita (Curp_Medico, Curp_Paciente, Fecha, Hora) VALUES ('$Curp_Medico', '$Curp_Paciente', '$Fecha', '$Hora')";

	if (mysqli_query($conn, $sql)) {
      echo '<script> 
                        alert("!La cita se ha registrado exitosamente!");
                        window.history.go(-1);</script>';

      } else {
      echo  '<script> 
                        alert("Error al registrarse");
                        window.history.go(-1);</script>';
      //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

	mysqli_close($conn);

?>