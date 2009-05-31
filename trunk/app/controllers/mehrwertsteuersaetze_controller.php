<?php

/**
 * Controller für
 *
 * @author A. Behrens
 *
 *
 *
 */
class MehrwertsteuersaetzeController extends AppController
{
	public $name = 'Mehrwertsteuersatz';


	/**Anzeigen einer
     *
     * @param id ist optional, wenn gesetzt, wird eine einzelne Typ mit eben
     * der id angezeigt
     * */
	public function view($id = null)
	{
        if ($id != null)
        {
		  $this->Mehrwertsteuersatz->id = $id;
		  $this->set('mehrwertsteuersatz', $this->Mehrwertsteuersatz->read());
        }
	}
}
?>