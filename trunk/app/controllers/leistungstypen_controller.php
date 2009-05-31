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
class LeistungstypenController extends AppController
{
	public $name = 'Leistungstyp';
    public $uses = array('Leistungstyp');


	/**Anzeigen einer
     *
     * @param id ist optional, wenn gesetzt, wird eine einzelne Typ mit eben
     * der id angezeigt
     * */
	public function view($id = null)
	{
        if ($id != null)
        {
        	$this->Leistungstyp->id = $id;
        	$this->set('id',$id);
        	$this->data=$this->Leistungstyp->read();
        }
	}
}
?>