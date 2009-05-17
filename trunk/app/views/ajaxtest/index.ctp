<div id="txtcontent">

<h2>Ajaxtest</h2>


<!--hier kommt der Content hin-->
<div id="divTest">
</div>

<?php
    echo "Hallo";
    echo $ajax->link('Löschen',"/ajaxtests/delete/1",array( 'update' => 'divTest' ));
?>

</div>
