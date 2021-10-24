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

$Nombre_P=$_POST['Nombre_P'];
$ApellidoP_P=$_POST['ApellidoP_P'];
$ApellidoM_P =$_POST['ApellidoM_P'];
$Curp_P=$_POST['Curp_P'];
$NSS_P=$_POST['NSS_P'];
$Telefono=$_POST['Telefono'];
$Domicilio_P=$_POST['Domicilio_P'];


$verificar_curp = mysqli_query($conn, "SELECT * FROM paciente WHERE Curp_P = '$Curp_P'");
      if(mysqli_num_rows($verificar_curp) > 0){
            echo  '<script> 
                        alert("Ya hay un paciente registrado con esta Curp");
                        window.history.go(-1);</script>';
            exit;
      }
      $verificar_nss = mysqli_query($conn, "SELECT * FROM paciente WHERE NSS_P = '$NSS_P'");
      if(mysqli_num_rows($verificar_nss) > 0){
            echo  '<script> 
                        alert("Ya hay un paciente registrado con este Numero de Segura Social");
                        window.history.go(-1);</script>';
            exit;
      }
 
$sql = "INSERT INTO paciente (Nombre_P, ApellidoP_P, ApellidoM_P, Curp_P, NSS_P,Telefono, Domicilio_P) VALUES ('$Nombre_P', '$ApellidoP_P', '$ApellidoM_P', '$Curp_P', '$NSS_P', '$Telefono', '$Domicilio_P')";
if (mysqli_query($conn, $sql)) {
      echo '<script> 
                        alert("!El paciente se ha registrado exitosamente!");
                        window.history.go(-1);</script>';
} else {
      echo  '<script> 
                        alert("Error al registrarse");
                        window.history.go(-1);</script>';
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>