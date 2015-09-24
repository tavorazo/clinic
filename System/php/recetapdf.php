	<?php
	require('fpdf/fpdf.php');
	class PDF extends FPDF{
		var $widths;
		var $aligns;
		function SetWidths($w){
			//Set the array of column widths
			$this->widths=$w;
		}
		function SetAligns($a){
			//Set the array of column alignments
			$this->aligns=$a;
		}
		function Row($data){
			//Calculate the height of the row
			$nb=0;
			for($i=0;$i<count($data);$i++)
				$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
			$h=5*$nb;
			//Issue a page break first if needed
			$this->CheckPageBreak($h);
			//Draw the cells of the row
			for($i=0;$i<count($data);$i++)
			{
				$w=$this->widths[$i];
				$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
				//Save the current position
				$x=$this->GetX();
				$y=$this->GetY();
				//Draw the border
				
				$this->Rect($x,$y,$w,$h);
				$this->MultiCell($w,5,$data[$i],0,$a,'true');
				//Put the position to the right of the cell
				$this->SetXY($x+$w,$y);
			}
			//Go to the next line
			$this->Ln($h);
		}
		function CheckPageBreak($h){
			//If the height h would cause an overflow, add a new page immediately
			if($this->GetY()+$h>$this->PageBreakTrigger)
				$this->AddPage($this->CurOrientation);
		}
		function NbLines($w,$txt){
			//Computes the number of lines a MultiCell of width w will take
			$cw=&$this->CurrentFont['cw'];
			if($w==0)
				$w=$this->w-$this->rMargin-$this->x;
			$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
			$s=str_replace("\r",'',$txt);
			$nb=strlen($s);
			if($nb>0 and $s[$nb-1]=="\n")
				$nb--;
			$sep=-1;
			$i=0;
			$j=0;
			$l=0;
			$nl=1;
			while($i<$nb)
			{
				$c=$s[$i];
				if($c=="\n")
				{
					$i++;
					$sep=-1;
					$j=$i;
					$l=0;
					$nl++;
					continue;
				}
				if($c==' ')
					$sep=$i;
				$l+=$cw[$c];
				if($l>$wmax)
				{
					if($sep==-1)
					{
						if($i==$j)
							$i++;
					}
					else
						$i=$sep+1;
					$sep=-1;
					$j=$i;
					$l=0;
					$nl++;
				}
				else
					$i++;
			}
			return $nl;
		}
		function Header(){
			// Logo
			$this->Image('../images/logo-endoperio-dental-center.jpg',20,10,60,0,'jpg');
			$this->SetFont('Arial','',10);
			$this->Ln(25);
		}
		function Footer(){
			$this->SetY(-45	);
			$this->SetTextColor(120,150,150);
			$this->SetFont('Arial','B',8);
			$this->Cell(220,0,'Planta infiernillo No 101 Col Electrisistas Citas (443) 324 8008 Urgencias 044 443 114 4047',0,0,'C');
			$this->Ln(5);
			$this->Cell(220,12,'www.endoperio.com.mx',0,10,'C');
		}
	}
	$id= $_GET['id'];
	$p= $_GET['p'];
	$f= $_GET['f'];
	$m= $_GET['m'];
	$o= $_GET['o'];
	$pdf=new PDF('L','mm','Letter');
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetMargins(20,20,20);
	$pdf->SetFont('Arial','',8);
	$pdf->SetTextColor(220,50,50);
	$pdf->cell(222,-10,'Receta No ['.$id.' ]',0,0, 'C');
	$pdf->Ln(1);	
	$pdf->SetWidths(array(150, 90));
	$pdf->SetFont('Arial','',10);
	$pdf->SetFillColor(255,255,255);
	$pdf->SetTextColor(2);
	$pdf->Row(array('Paciente : _'.$p , 'Fecha : _'.$f), 0);
	$pdf->Ln(5); 
	$pdf->SetTextColor(0);
	$pdf->Cell(0,3, 'Medicamento: ',0,1); 
	$pdf->Write(6, "____________________________________________________________________________________________________________________");
	$pdf->Ln(8); 
	$miarreglo = $m;
	$renglon = explode('<br />', $miarreglo);
	$i=0;
	while ( $i <= 10) {
						$pdf->Write(7, $renglon[$i]); // porción1
						$pdf->Ln(); 
						$i++;
					}
					$pdf->Cell(0,6, 'Observaciones: ',0,1); 
					$pdf->Write(6, "____________________________________________________________________________________________________________________");
					$pdf->Ln(8); 
					$pdf->Write(6, $o); 
					
					$pdf->Output();
		//mysql_close($strConsulta);
					?>