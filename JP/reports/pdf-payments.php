

<?php
include_once '../classes/class.payments.php';
include '../config/config.php';
require('../fpdf185/fpdf.php');

$payment = new Payments();
class PDF extends FPDF
{
//Page header
function Header(){
	 
	//Arial 12
	$this->SetFont('Arial','',12);
	//Background color
	$this->SetFillColor(200,220,255);
	//Title
	$this->Cell(0,6,"Receive Report",0,1,'L',1);
	$this->SetFont('Arial','BIU',10);
	$this->Cell(0,6,"Date Generated ".date("Y-m-d h:i:s A")." ",0,1,'L',1);
	$this->SetFont('Arial','',12);
    
   
    //Line break
    $this->Ln(4);
}
function BasicTable($header){
    //Header
    foreach($header as $col)
        $this->Cell(47,7,$col,0,0,'C');
	$this->Ln();
}
//Page footer
function Footer(){
    //Position at 1.5 cm from bottom
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

//Instanciation of inherited class
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
// Default Header
//$header=array('Nbr','Name','Access Level','E-Mail');
//$pdf->BasicTable($header);
// Custom Header
$pdf->Cell(10,12,"#",1,0,'C');
$pdf->Cell(45,12,"Receive Date",1,0,'C');
$pdf->Cell(58,12,"Supplier/Product",1,0,'C');
$pdf->Cell(40,12,"Product Status",1,0,'C');
$pdf->Cell(35,12,"Receive Status",1,0,'C');
$pdf->Ln(10);
$pdf->SetFont('Arial','',12);
$count = 1;
if($payment->list_payments() != false){
    foreach($payment->list_payments() as $value){
        extract($value);
        {
                $pdf->Cell(10,12,"  ".$count,0,0,'L');
                $pdf->Cell(45,12,$FName,0,0,'L');
                $pdf->Cell(58,12,$LName,0,0,'L');
                $pdf->Cell(40,12,$AmountDue,0,0,'L');
                $pdf->Cell(35,12,$payment_status,0,0,'L');
                $pdf->Ln(6);
                $count++;
        }
    }
}	

$pdf->SetFont('Arial','I',12);
$pdf->Cell(176,12,"--That's All!--",0,0,'C');
$pdf->Output();
?>