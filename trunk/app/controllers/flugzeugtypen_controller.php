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
class FlugzeugtypenController extends AppController
{
    public $uses = array('Flugzeugtyp','Flugzeug','Flugzeughersteller');

	/**Aufruf der Zuf�genseite*/
	public function add()
	{
		AppController::add();
        $this->set('herstellerliste', $this->Flugzeughersteller->find('list'));
	}


	/**Editieren*/
	function edit($id = null)
	{
		AppController::add($id);
        $this->set('herstellerliste', $this->Flugzeughersteller->find('list'));
	}
}
?>