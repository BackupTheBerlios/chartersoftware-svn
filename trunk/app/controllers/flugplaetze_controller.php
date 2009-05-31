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
class FlugplaetzeController extends AppController
{

	/**Anzeigen einer Liste*/
    public function index()
	{
		AppController::index();
	    $this->set('zeitzonenliste', timezone_identifiers_list());
	}


	/**Anzeigen einer
     *
     * @param id ist optional, wenn gesetzt, wird eine einzelne Typ mit eben
     * der id angezeigt
     * */
	public function view($id = null)
	{
		AppController::view($id);
        $this->set('zeitzonenliste', timezone_identifiers_list());
	}

	/**Aufruf der Zuf�genseite*/
	public function add()
	{
		AppController::add();
        $this->set('zeitzonenliste', timezone_identifiers_list());
	}


	/**Editieren*/
	function edit($id = null)
	{
		AppController::edit($id);
        $this->set('zeitzonenliste', timezone_identifiers_list());
	}
}
?>