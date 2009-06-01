<?php

/**
 * Controller für Zeitzonen
 *
 * @author A. Behrens
 *
 *
 * Grundprinzip: Jede Methode ist eine Action und kann von au�en aufgerufen
 * werden. Etwa "/cake/index.php/flugzeugherstellers/edit".
 *
 * Dabei kann es sein, dass ein Parameter �bergeben wird oder auch nicht.
 *
 */
class PreistestsController extends AppController
{
    public $uses = array('Flugplatz', 'Flugzeug');
	

	
}
?>