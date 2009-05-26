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

	/**Anzeigen einer Liste*/
    public function index()
	{
		$this->data=$this->Report->find('all');
	}

    public function dump($report_id)
	{
		$this->Report->id = $report_id;
		$rep = $this->Report->read();
		$command = $rep[Report][befehl];
		$resultSet = $this->Report->query($command);
		echo $command + count($resultSet); 
	}


	/**Anzeigen einer Liste*/
    public function select($report_id)
	{
		$this->Report->order = 'Report.name ASC';
		$this->set('Reportliste',$this->Report->find('list'));
		if ($this->data[Report][report_id]!= null) $report_id = $this->data[Report][report_id];
		if ($report_id!=null)
		{
			//nächste Zeile löschen und durch echte Ausgabe ersetzen.
            $this->flash('dump ...','/reports/select');
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
        		$this->flash('gespeichert', '/reports');
        	}
        }
        
	}


	/**löschen */
	function delete($id)
	{
		if (!empty($id))
		{
            $this->Report->del($id);
            $this->flash('gespeichert', '/reports');
            
		}
	}


	/**Editieren*/
	function edit($id = null)
	{
		if (!empty($this->data))
		{
        	if (!$this->Report->save($this->data))
            {
                $this->Session->setFlash('Fehler beim Speichern');
            }
            else
            {
            	$this->flash('gespeichert', '/reports');
            }
		}
      	else
      	{
        	$this->Report->id = $id;
        	$this->data = $this->Report->read();
      	}
      	
      	
	}
}
?>