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