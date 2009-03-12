<?php

class DifferenzHelper extends Helper {
    public $helpers = array('Html');


    function link($image, $url) {
        return $this->Html->link($this->Html->image($image), $url, null, false, false);
    }


}
?>