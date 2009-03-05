<?php

class DifferenzHelper extends Helper { 
    var $helpers = array('Html');
    
     
    function link($image, $url) { 
        return $this->Html->link($this->Html->image($image), $url, null, false, false); 
    }
    
        
}
?>