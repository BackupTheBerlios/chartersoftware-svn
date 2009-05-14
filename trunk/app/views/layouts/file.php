<?php
/*
 * Created on 14.05.2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
    <div id="container">
        <div id="header">
            <h1><?php echo $html->link('Rent-A-Jet','/')?></h1>
        </div>


        <div id="content">
            <?php $session->flash(); ?>
            <?php echo $content_for_layout; ?>
        </div>
    </div>
