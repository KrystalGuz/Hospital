
<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    $this->Cell(75);
    // Título
    $this->Cell(40,10,'Receta',1,0,'C');
    // Salto de línea
    $this->Ln(20);
    $this->SetFont('Arial','B',5);
    $this->Cell(10, 5, 'Num', 1, 0, 'C', 0);
	$this->Cell(23, 5, 'Curp Medico', 1, 0, 'C', 0);
	$this->Cell(23, 5, 'Curp Paciente', 1, 0, 'C', 0);
	$this->Cell(10, 5, 'Peso', 1, 0, 'C', 0);
	$this->Cell(10, 5, 'Talla', 1, 0, 'C', 0);
	$this->Cell(15, 5, 'Fecha', 1, 0, 'C', 0);
	$this->Cell(50, 5, 'Observaciones', 1, 0, 'C', 0);
	$this->Cell(50, 5, 'Receta', 1, 1, 'C', 0);
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
$consulta = "SELECT * FROM expediente";
$resultado = $mysqli->query($consulta);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',5);
//$pdf->Cell(40,10,utf8_decode('¡Hola, Mundo!'));

while($row = $resultado->fetch_assoc()){
	$pdf->Cell(10, 5, $row['Id_cita'], 1, 0, 'C', 0);
	$pdf->Cell(23, 5, $row['Curp_M'], 1, 0, 'C', 0);
	$pdf->Cell(23, 5, $row['Curp_P'], 1, 0, 'C', 0);
	$pdf->Cell(10, 5, $row['Peso'], 1, 0, 'C', 0);
	$pdf->Cell(10, 5, $row['Talla'], 1, 0, 'C', 0);
	$pdf->Cell(15, 5, $row['FechaH'], 1, 0, 'C', 0);
	$pdf->Cell(50, 5, $row['Observaciones'], 1, 0, 'C', 0);
	$pdf->Cell(50, 5, $row['Receta'], 1, 1, 'C', 0);
}

$pdf->Output();
?>