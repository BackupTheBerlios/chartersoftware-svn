<?php

/**
 * Controller
 *
 * @author A. Behrens
 *
 *
 * Grundprinzip: Jede Methode ist eine Action und kann von au�en aufgerufen
 * werden. Etwa "/cake/index.php/flugzeugtyps/edit".
 *
 * Dabei kann es sein, dass ein Parameter �bergeben wird oder auch nicht.
 *
 */
class FlugzeugeController extends AppController
{
    public $uses = array('Flugzeug', 'Flugzeugtyp','Flugzeughersteller');


	/**Anzeigen einer
     *
     * @param id ist optional, wenn gesetzt, wird eine einzelne Typ mit eben
     * der id angezeigt
     * */
	public function view($id = null)
	{
        if ($id != null)
        {
		  $this->Flugzeug->id = $id;

          $flugzeug = $this->Flugzeug->read();
          $typ = $this->Flugzeugtyp->findById($flugzeug['Flugzeug']['flugzeugtyp_id']);
          $hersteller = $this->Flugzeughersteller->findById($typ['Flugzeugtyp']['flugzeughersteller_id']);

          $this->set('flugzeug', $flugzeug);
          $this->set('flugzeugtyp', $typ);//auswahlbox anzeigen
          $this->set('flugzeughersteller', $hersteller);
        }
	}

	/**Aufruf der Zuf�genseite*/
	public function add()
	{
		AppController::add();
        $this->set('typenliste', $this->Flugzeugtyp->find('list'));
	}

	/**Editieren*/
	function edit($id = null)
	{
        $this->set('typenliste', $this->Flugzeugtyp->find('list'));
		AppController::edit($id);
	}
}
?>