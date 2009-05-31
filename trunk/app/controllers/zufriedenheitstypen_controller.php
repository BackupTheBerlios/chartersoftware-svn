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
class ZufriedenheitstypenController extends AppController
{
	/**Aufruf der Zuf�genseite*/
	public function add()
	{
		AppController::add();
		$this->set('Auswahlliste',array("Nein, ist kein Ablehnungsgrund", "Ja, ist Ablehnungsgrund" ));
	}



	/**Editieren*/
	function edit($id = null)
	{
		AppController::edit($id);
		$this->set('Auswahlliste',array("Nein, ist kein Ablehnungsgrund", "Ja, ist Ablehnungsgrund" ));
	}
}
?>