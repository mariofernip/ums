<?php
require "php/config.php";
require_once "php/functions.php";
$user = new login_registration_class();

		require('plugins/fpdf/fpdf.php');
		require('plugins/fpdf/rotation.php');


class PDF extends PDF_Rotate
{
	function Header()
	{
		//Put the watermark
		//$this->SetFont('Arial','B',50);
		//$this->SetTextColor(255,192,203);
		//$this->RotatedText(65,190,'A p p r o v e d',45);
	}
	function RotatedText($x, $y, $txt, $angle)
	{
		//Text rotated around its origin
		$this->Rotate($angle,$x,$y);
		$this->Text($x,$y,$txt);
		$this->Rotate(0);
	}
}

//$pdf = new FPDF();
$pdf=new PDF();
$pdf->AddPage();



$iubat=utf8_decode('Sistema de Evaluación' );					

		
		
		$pdf->Image('img/logo.png',10,9,17);
		$pdf->Ln();
		$pdf-> Cell(20);
		$pdf->SetFont('Times','',14);
		$pdf->Write(5, $iubat);
		$pdf->Ln();
		$pdf-> Cell(22);
        $pdf->SetFont('Times','',10);
        $pdf->Write(4,'Developed by Talento Humano');
		$pdf-> Cell(20);
		$pdf->SetFont('Times','',8);
		$pdf->Write(5, '__________________________________________________________________________________________________________________________________');
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf-> Cell(85);
		$pdf->SetFont('Times','U',10);
		$pdf->Write(5, 'Aplicante Lista');
		$pdf->Ln();

		$pdf->Ln(2);			


$pdf-> Cell(5);
		$pdf->SetFont('Times','B',8);
		$pdf->Cell(8,6,'SL',1);
		$pdf->Cell(20,6,'Aplicante ID',1);
		$pdf->Cell(40,6,'Aplicante Nombre',1);
		$pdf->Cell(40,6,'Contacto',1);
		$pdf->Cell(40,6,'Email',1);
		$pdf->Cell(22,6,'Foto',1);
		$pdf->Ln();

					$qry = $user->get_all_student();
					
 
					$sl=1;
					while($rec = $qry->fetch_assoc())
                     {
						$pdf-> Cell(5);
						$pdf->SetFont('Times','',8);
						$pdf->Cell(8,20,$sl,1);
						$pdf->Cell(20,20,$rec['st_id'],1);
						$pdf->Cell(40,20,utf8_decode($rec['name']),1);
						$pdf->Cell(40,20,$rec['contact'],1);
						$pdf->Cell(40,20,$rec['email'],1);	
							if($rec['img']==null){
										
							}else{					
								$image1='img/student/'.$rec['img'];
								$pdf->Cell( 22, 20, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(),22, 20), 1, 0, 'L', false);
							}
						$sl++;
						$pdf->Ln();
						}      
                

		
		$pdf->Ln();
		$pdf->Ln();	
		
		$pdf->Output();



?>
