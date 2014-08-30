<?php 
require('fpdf.php');
class PDF extends FPDF
{
//Cabecera de página
   function Header()
   {
    //Arial bold 15
    $this->SetFont('Arial','B',10);
    //Movernos a la derecha
    $this->Cell(80);
    //Título
    $this->Cell(80,10,'Logs Camnet',1,0,'C');
    //Salto de línea
    $this->Ln(5);
   }
   
   //Pie de página
   function Footer()
   {
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
   }
   //Tabla simple
   function TablaSimple($header)
   {
    require('config.php');
	$conn=@mysql_connect(SQL_HOST,SQL_USER,SQL_PASSWORD) or die ('Could not connect to MySql Database. '. mysql_error());
	if($conn)
	{         
	  mysql_select_db(SQL_DATABASE,$conn) or die ('Could not select MySql Database. '. mysql_error()) ;
	  $query=" select * from logs;";
	  $resultado=mysql_query($query);
	  foreach($header as $col)
		$this->Cell(40,7,$col,1);
		$this->Ln();
	  while($rows=mysql_fetch_array($resultado))
		{
			extract($rows);
			//Cabecera
			$this->Cell(40,5,$idlog,1);
			$this->Cell(40,5,$idusuario,1);
			$this->Cell(40,5,$email,1);
			$this->Cell(40,5,$fecha,1);
			$this->Cell(40,5,$ip,1);
			$this->Cell(40,5,$estado,1);
			$this->Ln();
		}
    	
	}//if
	
	mysql_free_result($resultado);
	mysql_close($conn);
   }//funcion
}
$pdf=new PDF('L');
//Títulos de las columnas
$header=array('IDLOGS','IDUSUARIO','EMAIL','FECHA','IP','ESTADO');
$pdf->AliasNbPages();
//Primera página
$pdf->AddPage();
$pdf->SetY(40);
//$pdf->AddPage();
$pdf->TablaSimple($header);
//Segunda página
//$pdf->AddPage();
//$pdf->SetY(40);
$pdf->Output('./logs.pdf');
header("Location: administrador.php",true);
?>