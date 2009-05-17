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
class AjaxtestsController extends AppController
{
    public $uses = array();
    public $name = 'Ajaxtest';
    public $helpers = array('Html','Ajax','Javascript','Form');
    public $components = array( 'RequestHandler' );

    /**Anzeigen einer Liste*/
    public function screen($id = null)
    {
        $this->render('index');
        exit;
    }

    /**Anzeigen einer Liste*/
    public function index($id = null)
    {
        //$this->render('screen');
        //$this->render('index','div);
        //exit;
    }


    /**Anzeigen einer Liste*/
    public function delete($id = null)
    {
        echo "delete erfolgreich";
        $this->render('index');
        exit;
    }

    /**Anzeigen einer Liste*/
    public function add($id = null)
    {
        //echo "delete erfolgreich";
        //$this->render('index');
        //exit;
    }

}
?>
