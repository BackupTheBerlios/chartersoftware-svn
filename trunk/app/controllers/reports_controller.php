<?php


/**
 * Controller für
 *
 * @author A. Behrens
 *
 *
 * Grundprinzip: Jede Methode ist eine Action und kann von au�en aufgerufen
 * werden. Etwa "/cake/index.php/flugplatzs/edit".
 *
 * Dabei kann es sein, dass ein Parameter �bergeben wird oder auch nicht.
 *
 */
class ReportsController extends AppController
{
    public $helpers = array('Excel','Html');


    public function dump($report_id =null)
	{
		if ($report_id == null){
			$this->flash('Fehler: Kein Ausgabeformat gewählt','select');
			return;
		}
			
		//SQL-Kommando aus DB auslesen
		$this->Report->id = $report_id;
		$Report = $this->Report->read();
		$name    = $Report['Report']['name'];

		//Und ausführen
		$this->data->ReportSet = $this->Report->doReport($report_id);
			
		//Und ausgeben
		if ($this->RequestHandler->prefers('xml')) {
				header('content-type: text/xml');
				//header('Content-Disposition: attachment; filename="' . $name .'.xml"');
		} else if ($this->RequestHandler->prefers('xls')) {
				//$this->autoRender=false;
				header('content-type: application/excel');
				header('Content-Disposition: attachment; filename="' . $name  .'.xml"');
				$this->render('dump','xls/default','xls/dump');
		} else if ($this->RequestHandler->prefers('csv')) {
				header('content-type: text/csv');
				header('Content-Disposition: attachment; filename="' . $name  .'.csv"');
		} else {
			//Default: Ausgabe als normaler Content
			//kein weiterer Code nötig
		}
	}


	/**Anzeigen einer Liste*/
    public function select($Ausgabeformat=null)
	{
		$this->Report->order = 'Report.name ASC';
		$this->set('Ausgabeformat',$this->Report->find('list'));
		$this->set('Ausgabezielliste', array('Webseite','Standard XML','CSV-Format','Excel (XML-Format)'));
		if ($this->data['Report']['Ausgabeformat']!= null) $Ausgabeformat = $this->data['Report']['Ausgabeformat'];
		
		if ($Ausgabeformat!=null && $this->data['Report']['Ausgabeziel'] != null)
		{
			switch($this->data['Report']['Ausgabeziel']){
				case 0: //Webseite
						$this->redirect('/reports/dump/'.$Ausgabeformat);
						break;
				case 1: //XML
						$this->redirect('/reports/dump/'.$Ausgabeformat.'.xml');
						break;
				case 2: //csv
						$this->redirect('/reports/dump/'.$Ausgabeformat.'.csv');
						break;
				case 3: //excel
						$this->redirect('/reports/dump/'.$Ausgabeformat.'.xls');
						break;
				default:
	            		$this->redirect('/reports/select/');
	            		break;
			}
		}
	}

}
?>