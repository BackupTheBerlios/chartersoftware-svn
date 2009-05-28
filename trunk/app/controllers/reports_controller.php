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

	/**Anzeigen einer Liste*/
    public function index()
	{
		$this->data=$this->Report->find('all');
	}

    public function dump($report_id =null)
	{
		if ($report_id != null){
			
			//execute the report
			$this->Report->id = $report_id;
			$rep = $this->Report->read();
			$command = $rep['Report']['befehl'];
			$this->data->ReportSet = $this->Report->query($command);
			
			
			//hand over for specific handle
			if ($this->RequestHandler->prefers('xml')) {
				header('content-type: text/xml');
				//header('Content-Disposition: attachment; filename="' . $rep['Report']['name'] .'.xml"');
			} else if ($this->RequestHandler->prefers('xls')) {
				//header('content-type: text/plain');
				//header('content-type: text/xml');
				$this->autoRender=false;
				$this->render('dump','xls/default','xls/dump');
				header('content-type: application/msexcel');
				header('Content-Disposition: attachment; filename="' . $rep['Report']['name'] .'.xml"');
			} else if ($this->RequestHandler->prefers('csv')) {
				header('content-type: text/csv');
				//header('Content-Disposition: attachment; filename="' . $rep['Report']['name'] .'.csv"');
			} else {
				$this->flash('Fehler bei Abarbeitung von Requesttypen',null);
			}
			
		} else {
			//or deal with errors
       		$this->redirect(array('action' => 'index'));
		}
	}


	/**Anzeigen einer Liste*/
    public function select($report_id=null)
	{
		$this->Report->order = 'Report.name ASC';
		$this->set('Reportliste',$this->Report->find('list'));
		$this->set('Reporttyp', array('Webseite','XML','CSV','Excel'));
		if ($this->data['Report']['report_id']!= null) $report_id = $this->data['Report']['report_id'];
		if ($report_id!=null)
		{
			//nächste Zeile löschen und durch echte Ausgabe ersetzen.
			switch($this->data['Report']['report_typ']){
				case 0: //Webseite
						$this->redirect('/reports/dump/'.$report_id);
						break;
				case 1: //XML
						$this->redirect('/reports/dump/'.$report_id.'.xml');
						break;
				case 2: //csv
						$this->redirect('/reports/dump/'.$report_id.'.csv');
						break;
				case 3: //excel
						$this->redirect('/reports/dump/'.$report_id.'.els');
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