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
	public $name = 'Report';
    public $uses = array('Report');
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
		$command = $Report['Report']['befehl'];
		$name    = $Report['Report']['name'];

		//Und ausführen
		$this->data->ReportSet = $this->Report->query($command);
			
		//Und ausgeben
		if ($this->RequestHandler->prefers('xml')) {
				header('content-type: text/xml');
				header('Content-Disposition: attachment; filename="' . $name .'.xml"');
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

	/**Anzeigen einer
     *
     * @param id ist optional, wenn gesetzt, wird eine einzelne Typ mit eben
     * der id angezeigt
     * */
	public function view($id = null)
	{
        if ($id != null)
        {
        	$this->Report->id = $id;
        	$this->data=$this->Report->read();
        }
	}

	/**Aufruf der Zuf�genseite*/
	public function add()
	{
		if (!empty($this->data))
		{
        	if (!$this->Report->save($this->data))
        	{
                $this->Session->setFlash('Fehler beim Speichern');
        	}else{
        		$this->redirect(array('action' => 'index'));
        	}
        }
	}


	/**löschen */
	function delete($id)
	{
		if (!empty($id))
		{
            $this->Report->del($id);
       		$this->redirect(array('action' => 'index'));
		}
	}


	/**Editieren*/
	function edit($id = null)
	{
		if (!empty($this->data))
		{
        	if (!$this->Report->save($this->data))
                $this->Session->setFlash('Fehler beim Speichern');
            else
	       		$this->redirect(array('action' => 'index'));
		}
      	else
      	{
        	$this->Report->id = $id;
        	$this->data = $this->Report->read();
      	}
	}
}
?>