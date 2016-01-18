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
		//$this->Image('http://www.webox.org.mx/Proyectos/endoperio/images/logo-endoperio-dental-center.jpg',20,10,60,0,'jpg');
		//$this->Image('http://127.0.0.1/ejemplos/crearPDF/clinica/2.JPEG',20,10,60,0,'JPEG');
		$this->SetFont('Arial','',10);
	    $this->Ln(25);
	}
	function Footer(){
		$this->SetY(-45	);
	    $this->SetTextColor(120,150,150);
		$this->SetFont('Arial','B',8);
		//$this->Cell(220,0,'Planta infiernillo No 101 Col Electrisistas Citas (443) 324 8008 Urgencias 044 443 114 4047',0,0,'L');
		$this->Ln(5);
		$this->Cell(220,12,'www.endoperio.com.mx',0,10,'L');
	}
}
	$id= $_GET['id'];
	$p= $_GET['p'];
	$f= $_GET['f'];
	$m= $_GET['m'];
	$o= $_GET['o'];
	//$con = new DB;
	//$pacientes = $con->conectar();	
	//$strConsulta = "SELECT * from paciente where id_paciente =  '$paciente'";
	//$pacientes = $conn->query($strConsulta);
	
	//$f1 = mysql_fetch_array($pacientes);
	$pdf=new PDF('L','mm','Letter');
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetMargins(20,20,20);
	
	//$historial = $con->conectar();	
	//strConsulta = "SELECT * FROM recetas WHERE id_paciente = '$paciente'";
	//$historial = $conn->query($strConsulta);
	//$numfilas = mysql_num_rows($historial);
	//$fila = mysql_fetch_array($historial);
	$pdf->SetFont('Arial','',8);
	$pdf->SetTextColor(220,50,50);
	$pdf->cell(222,-10,'Recibo No ['.$id.' ]',0,0, 'C');
	$pdf->Ln(1);	
	
	$pdf->SetFont('Arial','',10);
	//$pdf->SetWidths(array(150, 90));
	//$pdf->SetFillColor(255,255,255);
   	$pdf->SetTextColor(2);
	
			//$pdf->Row(array('Comprador:'.$p , 'Fecha: '.$f), 0);
				
				$pdf->Cell(0,6, 'Atendio: ',0,1); 
				$pdf->Cell(0,6, 'Fecha: ',0,1); 
				$pdf->Cell(0,6, 'Comprador: ',0,1); 
				$pdf->Ln(2); 
	
				$pdf->SetFont('Arial','',10);
				$pdf->SetWidths(array(100, 20, 30, 30));
				$pdf->SetFillColor(255,255,255);
			   	$pdf->SetTextColor(2);
				$pdf->Row(array('Descripcion' , ' Cantidad', 'Precio Unit', 'Precio'), 0);
				$pdf->Row(array('' , ' ', ' ', ''), 0);
				$pdf->Row(array('' , ' ', ' Total_', ''), 0);
    			
				//$miarreglo = $m;
				//error con los 
				//$miarreglo = explode (' ',$miarreglo);
				//$pdf->Cell(0,50, $m,1,1); 
				//$pdf->Ln(5); 
				//$pdf->Cell(0,6, 'Observaciones: ',0,1); 
				//$pdf->Cell(0,50, $o,1,1); 
				//$pdf->Cell(0,6, $miarreglo[1],0,1); 
				//$pdf->Cell(0,6, $miarreglo[2],0,1); 
	
		
$pdf->Output();
	//mysql_close($strConsulta);
?>