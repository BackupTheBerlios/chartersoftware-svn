<h2>Ajaxtest</h2>

<?php
    echo "Hallo. <br> Aktuelle mirotime(): ". microtime() . "<br>";
    echo $ajax->link('Löschen eines Wertes',"/ajaxtests/delete/1",array( 'update' => 'divTest' )). "<br>";;
    echo $ajax->link('Neuaufbau Bildschirm',"/ajaxtests/index",array( 'update' => 'divTest' )). "<br>";;
    echo $ajax->link('Zufügen eines Wertes',"/ajaxtests/index",array( 'update' => 'divTest' )). "<br>";;
?>

