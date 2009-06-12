<?php
function print_pre( $array )
{
if ( @is_array ( $array ) )
{
print "

\n";
      print_r ( $array );
      print "

\n";
}
}
//print_pre ( $this->data ) ;
//exit;

App::import('Vendor','tcpdf/config/lang/eng');
App::import('Vendor','tcpdf/tcpdf');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT);  

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Rentajet');
$pdf->SetTitle('Angebot');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); 

//set some language-dependent strings
$pdf->setLanguageArray($l); 

// ---------------------------------------------------------

// Font Typ setzten
$pdf->SetFont('helvetica', '', 12); 

// Seite hinzuf�gen
$pdf->AddPage(); 

// Inhalt PDF

$htmlcontent = "
<table><tr><td align=\"right\"><img src=\"vendors/tcpdf/images/logo_rentajet.gif\" border=\"0\" height=\"41\" align=\"top\" /></td></tr></table>
<br><br>
<table>
<tr>
<td>".$this->data['Adresse']['firma']."</td>
</tr>
<tr>
<td>".$this->data['Adresse']['ansprechpartner']."</td>
</tr>
<tr>
<td>".$this->data['Adresse']['strasse']."</td>
</tr>
<tr>
<td>".$this->data['Adresse']['plz']." ".$this->data['Adresse']['ort']."</td>
</tr>
</table>
<br>
<table>
<tr>
<td align=\"right\">
Wismar, ".date('d.m.Y')."
</td>
</tr>
<tr>
<td align=\"right\">
Rechnungsnr. RE-".$this->data['Vorgang']['id']."
</td>
</tr>
</table>
<h1>Rechnung für Charterflug</h1>
<br>
<table border=\"1\" cellpadding=\"5\">
<tr>
<td align=\"left\" width=\"180\">Chartertyp: </td>";

if ($this->data['Vorgang']['zeitcharter'] == 1) 
{$htmlcontent .= "<td width=\"310\"><b>Zeitcharter</b></td>";} 
else 
{$htmlcontent .= "<td width=\"310\"><b>Routenflug</b></td>";}

$htmlcontent .= "</tr>
<tr>
<td align=\"left\" width=\"180\">Charterdauer: </td>
<td width=\"310\"><b>".$this->data['Vorgang']['vonDatum']." - ".$this->data['Vorgang']['bisDatum']."</b></td>
</tr>";

if ($this->data['Vorgang']['zeitcharter'] == 1) {
$htmlcontent .= "
<tr>
<td align=\"left\" width=\"180\">Startflughafen: </td>
<td width=\"310\"><b>".$this->data['Vorgang']['Flugstrecke']['startflugplatz']['Flugplatz']['name']."</b></td>
</tr>
<tr>
<td align=\"left\" width=\"180\">Zielflughafen: </td>
<td width=\"310\"><b>".$this->data['Vorgang']['Flugstrecke']['zielflugplatz']['Flugplatz']['name']."</b></td>
</tr>";
}

$htmlcontent .= "<tr>
<td align=\"left\" width=\"180\">Flugzeugtyp: </td>
<td width=\"310\"><b>".$this->data['Vorgang']['Flugzeug']['Flugzeughersteller']['name']." - ".$this->data['Vorgang']['Flugzeug']['Flugzeugtyp']['name']."</b></td>
</tr>
</table>";
if ($this->data['Vorgang']['zeitcharter'] == 0) 
{
	$htmlcontent .= "
	<br>
	<h1>Flugroute</h1>
	<table border=\"1\" cellpadding=\"5\">
	<tr>
	<td width=\"30\">ID</td>
	<td width=\"150\">Von</td>
	<td width=\"150\">Nach</td>
	<td width=\"80\">Entfernung</td>
	<td width=\"80\">Flugzeit</td>
	</tr>";

	for($i = 0; $i < count($this->data['Vorgang']['Flugstrecke']['flugstrecke']); $i++) {
		$k = $i+1;
		$htmlcontent .= "
		<tr>
		<td width=\"30\">".$k."</td>
		<td width=\"150\">".$this->data['Vorgang']['Flugstrecke']['flugstrecke'][$i]['von']['Flugplatz']['name']."</td>
		<td width=\"150\">".$this->data['Vorgang']['Flugstrecke']['flugstrecke'][$i]['nach']['Flugplatz']['name']."</td>
		<td width=\"80\">".$this->data['Vorgang']['Flugstrecke']['flugstrecke'][$i]['entfernung']."</td>
		<td width=\"80\">".$this->data['Vorgang']['Flugstrecke']['flugstrecke'][$i]['flugzeitStr']."</td>
		</tr>";
	}
	
	$htmlcontent .= "
	<tr>
	<td colspan=\"3\" width=\"330\">Gesamt</td>
	<td width=\"80\">".$this->data['Vorgang']['Flugstrecke']['gesamtstrecke']. "</td>
	<td width=\"80\">".$this->data['Vorgang']['Flugstrecke']['gesamtflugzeitStr']."</td>
	</tr>
	</table>";
	
	if ($this->data['Vorgang']['sonderwunsch_netto'] != 0) {
	
	$htmlcontent .= "
	<br>
	<h1>Sonderwunsch (Netto)</h1>
	<table border=\"1\" cellpadding=\"5\">
	<tr>
	<td width=\"310\">".$this->data['Vorgang']['sonderwunsch']."</td>
	<td align=\"right\" width=\"180\">EUR ".number_format($this->data['Vorgang']['sonderwunsch_netto'], 2, ',', '.')."</td>
	</tr>
	</table>";
	}
	
	$htmlcontent .= "
	<br>
	<h1>Gesamt</h1>
	<table border=\"1\" cellpadding=\"5\">
	<tr>
	<td width=\"310\">Netto</td>
	<td align=\"right\" width=\"180\">EUR ".number_format($this->data['Vorgang']['netto'], 2, ',', '.')."</td>
	</tr>
	<tr>
	<td width=\"310\">Mwst. (19%)</td>
	<td align=\"right\" width=\"180\">EUR ".number_format($this->data['Vorgang']['mwst'], 2, ',', '.')."</td>
	</tr>
	<tr>
	<td width=\"310\">Brutto</td>
	<td align=\"right\" width=\"180\">EUR ".number_format($this->data['Vorgang']['brutto_soll'], 2, ',', '.')."</td>
	</tr>
	</table>";
	
} else {
	$htmlcontent .= "
	<br><br>
	Der Charterpreis setzt sich aus einem Fixpreisanteil und einem Flugpreisanteil
	zusammen. Der Flugpreisanteil basiert auf den verflogenen Flugstunden und
	entspricht der Triebwerkslaufzeit. Sie ist aus der Anzeige der Triebwerkslaufzeit im
	Cockpit ersichtlich.
	<br>
	<h1>Gesamt</h1>
	<table border=\"1\" cellpadding=\"5\">
	<tr>
	<td width=\"310\">Triebwerkslaufzeit</td>
	<td align=\"right\" width=\"180\">".$this->data['Vorgang']['reisezeit']."</td>
	</tr>
	<tr>
	<td width=\"310\">Netto</td>
	<td align=\"right\" width=\"180\">EUR ".number_format($this->data['Vorgang']['netto'], 2, ',', '.')."</td>
	</tr>
	<tr>
	<td width=\"310\">Mwst. (19%)</td>
	<td align=\"right\" width=\"180\">EUR ".number_format($this->data['Vorgang']['mwst'], 2, ',', '.')."</td>
	</tr>
	<tr>
	<td width=\"310\">Brutto</td>
	<td align=\"right\" width=\"180\">EUR ".number_format($this->data['Vorgang']['brutto_soll'], 2, ',', '.')."</td>
	</tr>
	</table>";
} 

// HTML in PDF Format wandeln
$pdf->writeHTML($htmlcontent, true, 0, true, 0);

//Close and output PDF document
echo $pdf->Output(null, 'S');

//============================================================+
// END OF FILE                                                 
//============================================================+ 
?>