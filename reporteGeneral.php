<?php
//include pdf_mc_table.php, not fpdf17/fpdf.php
include('pdf_mc_table.php');
include('conexion.php');
session_start();

//make new object
$pdf = new PDF_MC_Table();

//add page, set font
$pdf->AddPage();

$pdf->SetFont('Arial','B',12);
    // Movernos a la derecha
    $pdf->Cell(80);
    // Título
    $pdf->Cell(30,10,utf8_decode('Reporte de Actividades Realizadas'),0,0,'C');
    //Dibujo de la línea
    $pdf->Line(30,20,175,20);

    // Salto de línea
    $pdf->Ln(20);

//set width for each column (6 columns)
$pdf->SetWidths(Array(10,40,40,30,25,30));

//set alignment
$pdf->SetAligns(Array('C','','','C','C','C'));

//set line height. This is the height of each lines, not rows.
$pdf->SetLineHeight(10);

//add table heading using standard cells
//set font to bold
$pdf->SetFont('Arial','B',14);
$pdf->Cell(10,8,"#",1,0);
$pdf->Cell(40,8,"Responsable",1,0);
$pdf->Cell(40,8,utf8_decode('Descripción'),1,0);
$pdf->Cell(30,8,"Fecha",1,0);
$pdf->Cell(25,8,"Prioridad",1,0);
$pdf->Cell(30,8,utf8_decode('Ubicación'),1,0);


$pdf->Ln();

//reset font
$pdf->SetFont('Arial','',10);

//Obtiene los valores de la BD.
$docente = $_SESSION['docente']['Id_Docente'];
$sql ="SELECT ac.Id_Actividad, al.Nombre_Alumno, ac.Descripcion_Actividad, ac.Fecha_Actividad, u.Nombre_Ubicacion, ac.Estado_Actividad FROM Actividad ac, Alumno al, Ubicacion u WHERE ac.Id_Alumno = al.Id_Alumno AND ac.Id_Ubicacion = u.Id_Ubicacion  AND ac.Id_Docente = '$docente'";            
$res = mysqli_query($conexion_BD, $sql);

while ($arrayActividad = mysqli_fetch_array($res))
{
  if ($arrayActividad['Estado_Actividad'] == 0) {
    $estado = "Pendiente";
  }elseif ($arrayActividad['Estado_Actividad'] == 1) {
    $estado = "En curso";
  }elseif ($arrayActividad['Estado_Actividad'] == 2) {
    $estado = "Pausa";
  }else{
    $estado = utf8_decode("Revisión");
  }

  $descripcion = $arrayActividad['Descripcion_Actividad'];
  $tamañoDescripcion = strlen($descripcion);
  $pdf->Row(Array(
    $arrayActividad['Id_Actividad'],
    utf8_decode($arrayActividad['Nombre_Alumno']),
    utf8_decode($arrayActividad['Descripcion_Actividad']),
    $arrayActividad['Fecha_Actividad'],
    $estado,
    utf8_decode($arrayActividad['Nombre_Ubicacion']),
));

}


//output the pdf
$pdf->Output();






