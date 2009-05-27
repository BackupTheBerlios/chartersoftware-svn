<?php

class ExcelHelper extends Helper {
    function link($image, $url) {
        return $this->Html->link($this->Html->image($image), $url, null, false, false);
    }
}
?>