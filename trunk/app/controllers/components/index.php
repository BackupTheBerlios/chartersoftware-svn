<?php

class IndexComponent extends Component {
    public $controller;

    function startup(&$controller)
    {
        $this->controller =& $controller;
    }

    function index($name)
    {
        $model =$this->controller->getModel();
        $alle = $model->findAll();
        $this->controller->set(name,$alle);
    }
}
?>
