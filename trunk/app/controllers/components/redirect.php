<?php

class IndexComponent extends Object {
    public $controller;
    public $components = array('RequestHandler');

    function startup(&$controller)
    {
        $this->controller =& $controller;
    }

    function goto($url)
    {
        if ($this->RequestHandler->isAjax())
        {
            $this->controller->set('url', $url);
        }
        else
        {
            $this->controller->redirect($url);
        }
     }
}
?>
