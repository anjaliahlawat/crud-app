<?php
include_once "dbh2.inc.php";
include_once "dbh.inc.php";
session_start();
 
if(isset($_POST['generate_invoice']))
{
    if($_POST['invoice_type'] == 'performa')
    {
    	$type="PERFOMA INVOICE";
    }
    elseif($_POST['invoice_type'] == 'invoice')
    {
    	$type="INVOICE";
    }
    $gstin_p = $_POST['gstin_p'];
    $name_p = $_POST['name_p'];
    $addrs_p = $_POST['addrs_p'];
    $state_p = $_POST['state_p'];
    $invoice_p = $_POST['invoice_p'];
    $doi_p = $_POST['doi_p'];
    $code_p = $_POST['code_p'];
    $gstin_r = $_POST['gstin_r'];
    $name_r = $_POST['name_r'];
    $addrs_r = $_POST['addrs_r'];
    $state_r = $_POST['state_r'];
    $code_r = $_POST['code_r'];
    require ('fpdf181/fpdf.php');
     $pdf = new FPDF('p','mm','A4');
     $pdf->AddPage();
     $pdf->SetFont('Arial','B',12);
     $pdf->Cell(0,20,$type,1,1,'C');
     $pdf->SetFont('Arial','',10);
     $pdf->Cell(200,7,Service Provider,1,0);
     $pdf->Cell(200,7,Service Receiver,1,1);
     $pdf->Cell(100,7,"GSTIN:",0,0);
     $pdf->Cell(100,7,$gstin_p,0,0);
     $pdf->Cell(100,7,"GSTIN:",0,0);
     $pdf->Cell(100,7,$gstin_r,0,1);
     $pdf->Cell(100,7,"Name:",0,0);
     $pdf->Cell(100,7,$name_p,0,0);
     $pdf->Cell(100,7,"Name:",0,0);
     $pdf->Cell(100,7,$name_r,0,1);
     $pdf->Cell(100,7,"Address:",0,0);
     $pdf->Cell(100,7,$addrs_p,0,0);
     $pdf->Cell(100,7,"Address:",0,0);
     $pdf->Cell(100,7,$addrs_r,0,1);
     $pdf->Cell(70,7,"State:",0,0);
     $pdf->Cell(70,7,$state_p,0,0);
     $pdf->Cell(30,7,"Code:",0,0);
     $pdf->Cell(30,7,$code_r,0,0);
     $pdf->Cell(70,7,"State:",0,0);
     $pdf->Cell(70,7,$state_r,0,0);
     $pdf->Cell(30,7,"Code:",0,0);
     $pdf->Cell(30,7,$code_r,0,1);
     $pdf->Cell(100,7,"Invoice No.:",0,0);
     $pdf->Cell(100,7,$invoice_p,0,1);
     $pdf->Cell(100,7,"Date of Invoice:",0,0);
     $pdf->Cell(100,7,$doi_p,0,1);
}

?>