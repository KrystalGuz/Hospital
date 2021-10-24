<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('Logo.jpeg',85,10,40);
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    $this->Cell(75);
    // Título
    //$this->Cell(40,10,'Receta',1,0,'C');
    // Salto de línea
    $this->Ln(20);
    $this->Ln(20);

}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Pagína ').$this->PageNo().'/{nb}',0,0,'C');
}
}
require 'conexion.php';
$id=$_GET['id'];
$consulta = "SELECT * FROM expediente LEFT JOIN medicos ON medicos.Curp = expediente.Curp_M  LEFT JOIN paciente ON paciente.Curp_P = expediente.Curp_P WHERE Id_cita ='".$id."'";
$resultado = $mysqli->query($consulta);



$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
//$pdf->Cell(40,10,utf8_decode('¡Hola, Mundo


while($row = $resultado->fetch_assoc()){
	$pdf->Cell(40,10,utf8_decode('Numero de cita: '));
	$pdf->Cell(10, 5, ' ', 0, 1, 'L', 0);
	$pdf->Cell(10, 5, ' ', 0, 1, 'L', 0);
	$pdf->Cell(10, 5, utf8_decode($row['Id_cita']), 0, 1, '', 0);
	$pdf->Cell(40,10,utf8_decode('Datos del Medico: '));
	$pdf->Cell(10, 5, ' ', 0, 1, 'L', 0);
	$pdf->Cell(10, 5, ' ', 0, 1, 'L', 0);
	$pdf->Cell(23, 5, utf8_decode($row['Nombre']));$pdf->Cell(23, 5, '	');$pdf->Cell(23, 5, utf8_decode($row['ApellidoP']));$pdf->Cell(23, 5, utf8_decode($row['ApellidoM']));$pdf->Cell(23, 5, '	');$pdf->Cell(23, 5, utf8_decode($row['Curp_M']), 0, 1, 'L', 0);
	$pdf->Cell(40,10,utf8_decode('Datos del Paciente: '));
	$pdf->Cell(10, 5, ' ', 0, 1, 'L', 0);
	$pdf->Cell(10, 5, ' ', 0, 1, 'L', 0);
	$pdf->Cell(23, 5, utf8_decode($row['Nombre_P']));$pdf->Cell(23, 5, '	');$pdf->Cell(23, 5, utf8_decode($row['ApellidoP_P']));$pdf->Cell(23, 5, utf8_decode($row['ApellidoM_P']));$pdf->Cell(23, 5, '	');$pdf->Cell(23, 5, utf8_decode($row['Curp_P']), 0, 1, 'L', 0);
	$pdf->Cell(40,10,utf8_decode('Peso: '));
	$pdf->Cell(10, 5, ' ', 0, 1, 'L', 0);
	$pdf->Cell(10, 5, ' ', 0, 1, 'L', 0);
	$pdf->Cell(10, 5, utf8_decode($row['Peso']), 0, 1, 'L', 0);
	$pdf->Cell(40,10,utf8_decode('Talla: '));
	$pdf->Cell(10, 5, ' ', 0, 1, 'L', 0);
	$pdf->Cell(10, 5, ' ', 0, 1, 'L', 0);
	$pdf->Cell(10, 5, utf8_decode($row['Talla']), 0, 1, 'L', 0);
	$pdf->Cell(40,10,utf8_decode('Fecha del expediente: '));
	$pdf->Cell(10, 5, ' ', 0, 1, 'L', 0);
	$pdf->Cell(10, 5, ' ', 0, 1, 'L', 0);
	$pdf->Cell(15, 5, utf8_decode($row['FechaH']), 0, 1, 'L', 0);
	$pdf->Cell(40,10,utf8_decode('Observaciones: '));
	$pdf->Cell(10, 5, ' ', 0, 1, 'L', 0);
	$pdf->Cell(10, 5, ' ', 0, 1, 'L', 0);
	$pdf->MultiCell(190, 5, utf8_decode($row['Observaciones']), 2);
	$pdf->Cell(40,10,utf8_decode('Receta: '));
	$pdf->Cell(10, 5, ' ', 0, 1, 'L', 0);
	$pdf->Cell(10, 5, ' ', 0, 1, 'L', 0);
	$pdf->MultiCell(190, 5, utf8_decode($row['Receta']), 2);
}

$pdf->Output();
?>