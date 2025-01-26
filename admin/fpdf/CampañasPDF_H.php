<?php

require('./fpdf.php');

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
     //include '../../recursos/Recurso_conexion_bd.php';//llamamos a la conexion BD
 
        $servidor = "localhost";
        $usuario = "root"; // Usuario por defecto de XAMPP
        $contrasena = ""; // Contraseña por defecto de XAMPP (vacía)
        $base_datos = "castiel_bd";

        // Crear la conexión
        $conn = new mysqli($servidor, $usuario, $contrasena, $base_datos);
      //$consulta_info = $conexion->query(" select *from hotel ");//traemos datos de la empresa desde BD
      $consulta_info = $conn->query(
        "SELECT *
         FROM proyecto");
      //$dato_info = $consulta_info->fetch_object();
      $this->Image('logo.png', 245, 5, 50); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(95); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(110, 15, utf8_decode('FUNDACION CASTIEL'), 0, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

      /* UBICACION */
      $this->Cell(180);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("Ubicación : Zona Rio Seco"), 0, 0, '', 0);
      $this->Ln(5);

      /* TELEFONO */
      $this->Cell(180);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("Teléfono : 66650569"), 0, 0, '', 0);
      $this->Ln(5);

      /* COREEO */
      $this->Cell(180);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Correo : fundacion@castiel.com"), 0, 0, '', 0);
      $this->Ln(5);

      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(228, 100, 0);
      $this->Cell(100); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("REPORTE DE CAMPAÑAS "), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(228, 100, 0); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 9);
      $this->Cell(10, 10, utf8_decode('N°'), 1, 0, 'C', 1);
      $this->Cell(55, 10, utf8_decode('NOMBRE'), 1, 0, 'C', 1);
    //   $this->Cell(30, 10, utf8_decode('CALLE'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('PRESUPUESTO'), 1, 0, 'C', 1);
    //   $this->Cell(30, 10, utf8_decode('ZONA'), 1, 0, 'C', 1);
      $this->Cell(100, 10, utf8_decode('DESCRIPCION'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('INICIO'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('FINAL'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('MAX. PART'), 1, 1, 'C', 1);
      
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(540, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

//include '../../recursos/Recurso_conexion_bd.php';
//require '../../funciones/CortarCadena.php';
/* CONSULTA INFORMACION DEL HOSPEDAJE */
//$consulta_info = $conexion->query(" select *from hotel ");
//$dato_info = $consulta_info->fetch_object();

$pdf = new PDF();
$pdf->AddPage("landscape"); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 8);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

/*$consulta_reporte_alquiler = $conexion->query("  ");*/

/*while ($datos_reporte = $consulta_reporte_alquiler->fetch_object()) {      
   }*/
$i = $i + 1;
/* TABLA */
$servidor = "localhost";
$usuario = "root"; // Usuario por defecto de XAMPP
$contrasena = ""; // Contraseña por defecto de XAMPP (vacía)
$base_datos = "castiel_bd";

// Crear la conexión
$conn = new mysqli($servidor, $usuario, $contrasena, $base_datos);
//$consulta_info = $conexion->query(" select *from hotel ");//traemos datos de la empresa desde BD
$consulta = $conn->query(
"SELECT *
 FROM proyecto");
while ($fila = $consulta->fetch_assoc()) {
    $pdf->Cell(10, 10, utf8_decode($fila['id_proyecto']), 1, 0, 'C', 0);
    $pdf->Cell(55, 10, utf8_decode($fila["nombre_proyecto"]), 1, 0, 'C', 0);
    $pdf->Cell(30, 10, utf8_decode($fila["presupuesto"]), 1, 0, 'C', 0);
    $pdf->Cell(100, 10, utf8_decode($fila["descripcion"]), 1, 0, 'C', 0);
    $pdf->Cell(30, 10, utf8_decode($fila["fecha_inicio"]), 1, 0, 'C', 0);
    $pdf->Cell(30, 10, utf8_decode($fila["fecha_fin"]), 1, 0, 'C', 0);
    $pdf->Cell(20, 10, utf8_decode($fila["nro_participantes"]), 1, 1, 'C', 0);    
}
$pdf->Output('Campañas.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
