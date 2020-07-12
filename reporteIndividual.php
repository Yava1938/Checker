<?php
require('fpdf182/fpdf.php');

session_start();
if (isset($_SESSION['alumno'])) {
    



class PDF extends FPDF
{
// Cabecera de página



function Header()
{
   //$this->Image('imges/uv.png','0','80','210','100','png');
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,utf8_decode('Reporte General'),0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->SetFont('Arial','',15);

    $this->cell(10, 10, 'Id', 1, 0, 'C', 0);
    $this->cell(35, 10, 'Alumno', 1, 0, 'C', 0);
    $this->cell(35, 10, utf8_decode('Descripción '), 1, 0, 'C', 0);
    $this->cell(40, 10, 'Fecha', 1, 0, 'C', 0);
    $this->cell(35, 10, utf8_decode('Ubicación '), 1, 0, 'C', 0);
    $this->cell(25, 10, 'Estado', 1, 1, 'C', 0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}
require 'conexion.php';
/*$sql = "SELECT a.id_actividad, a.id_alumno, e.nombre_estudiante, a.descripcion_actividad, a.fecha_actividad, a.prioridad, u.nombre_ubicacion
FROM actividades a INNER JOIN ubicaciones u 
    ON a.id_ubicacion = u.id_ubicacion
        INNER JOIN estudiante e
            ON a.id_alumno = e.id_alumno";*/

$alumno = $_SESSION['alumno']['Id_Alumno'];
$sql ="SELECT ac.Id_Actividad, al.Nombre_Alumno, ac.Descripcion_Actividad, ac.Fecha_Actividad, u.Nombre_Ubicacion, ac.Estado_Actividad FROM Actividad ac, Alumno al, Ubicacion u WHERE ac.Id_Alumno = al.Id_Alumno AND ac.Id_Ubicacion = u.Id_Ubicacion  AND ac.Id_Alumno = '$alumno'";            

/*$sql ="Select Id_Pedido, I.Descripcion_Producto,Cantidad_Producto, Precio_Pedido, Cliente_Pedido, Estado_Pedido, Token_Pedido, Fecha_Pedido
From Inventario I, Pedido c 
WHERE (I.Id_Producto = c.Id_Producto) AND c.Estado_Pedido = 'Cancelada'"; */
$res = $conexion_BD->query($sql);



$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);


while ($row =  mysqli_fetch_array($res))
{
    $pdf->cell(10, 10, $row['Id_Actividad'], 1, 0, 'C', 0);
    $pdf->cell(35, 10, $row['Nombre_Alumno'], 1, 0, 'C', 0);
    $pdf->cell(35, 10, $row['Descripcion_Actividad'], 1, 0, 'C', 0);
    $pdf->cell(40, 10, $row['Fecha_Actividad'], 1, 0, 'C', 0);
    $pdf->cell(35, 10, $row['Nombre_Ubicacion'], 1, 0, 'C', 0);
    $pdf->cell(25, 10, $row['Estado_Actividad'], 1, 1, 'C', 0);
    


}

$pdf->Output();

}else{
    header("location: index.php");
}

