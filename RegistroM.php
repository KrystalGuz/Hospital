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
	$Nombre=$_POST['Nombre'];
	$ApellidoP=$_POST['ApellidoP'];
	$ApellidoM =$_POST['ApellidoM'];
	$Curp=$_POST['Curp'];
	$NSS=$_POST['NSS'];
	$Sexo=$_POST['Sexo'];
	$FechaNac=$_POST['FechaNac'];
	$FechaIngr=$_POST['FechaIngr'];
	$Especialidad=$_POST['Especialidad'];
	$Domicilio=$_POST['Domicilio'];

	$verificar_curp = mysqli_query($conn, "SELECT * FROM medicos WHERE Curp = '$Curp'");
      if(mysqli_num_rows($verificar_curp) > 0){
            echo  '<script> 
                        alert("Ya hay un medico registrado con esta Curp");
                        window.history.go(-1);</script>';
            exit;
      }
      $verificar_nss = mysqli_query($conn, "SELECT * FROM medicos WHERE NSS = '$NSS'");
      if(mysqli_num_rows($verificar_nss) > 0){
            echo  '<script> 
                        alert("Ya hay un medico registrado con este Numero de Segura Social");
                        window.history.go(-1);</script>';
            exit;
      }


	//consulta para insertar
	$sql = "INSERT INTO medicos (Nombre, ApellidoP, ApellidoM, Curp, NSS,Sexo, FechaNac,FechaIngr,Especialidad,Domicilio) VALUES ('$Nombre', '$ApellidoP', '$ApellidoM', '$Curp', '$NSS', '$Sexo', '$FechaNac','$FechaIngr','$Especialidad','$Domicilio')";

	if (mysqli_query($conn, $sql)) {
      echo '<script> 
                        alert("!El medico se ha registrado exitosamente!");
                        window.history.go(-1);</script>';

} else {
      echo  '<script> 
                        alert("Error al registrarse");
                        window.history.go(-1);</script>';
      //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

	mysqli_close($conn);

?>