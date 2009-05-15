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
class EntfernungenController extends AppController
{
    public $uses = array('Flugplatz');
    public $name = 'Entfernung';
    public $helpers = array('Html','Ajax','Javascript','Form');
    public $components = array( 'RequestHandler' );

    /**Anzeigen einer Liste*/
    public function index($id = null)
    {
        //do nothing
    }
}
?>
