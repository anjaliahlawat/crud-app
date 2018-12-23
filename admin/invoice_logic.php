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
     $pdf->Cell(0,7,Service Provider,1,0);
}

?>