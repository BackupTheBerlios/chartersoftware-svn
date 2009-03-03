<?php

class IndexComponent extends Component { 
    var $controller; 
    //var $components = array('RequestHandler'); 
    
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
