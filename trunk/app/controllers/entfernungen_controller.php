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
    var $uses = array('Flugplatz');
    var $name = 'Entfernung';
    
    /**Anzeigen einer Liste*/
    public function index($id = null) 
    {   
    }
}
?>
