<h2>Flugzeugtyp</h2>

<h3>Informationen</h3>

<dl>
<dt>ID</dt>  <dd><?php echo $flugzeugtyp['Flugzeugtyp']['id']?></dd>
<dt>Name</dt><dd><?php echo $flugzeugtyp['Flugzeugtyp']['name']?></dd>
<dt>Hersteller</dt><dd><?php echo $flugzeugtyp['Flugzeughersteller']['name']?></dd>
<dt>Hersteller ID</dt><dd><?php echo $flugzeugtyp['Flugzeughersteller']['id']?></dd>
<dt>Reichweite</dt><dd><?php echo $flugzeugtyp['Flugzeugtyp']['reichweite']?></dd>
<dt>Geschwindigkeit</dt><dd><?php echo $flugzeugtyp['Flugzeugtyp']['vmax']?></dd>
<dt>Jährliche Kosten</dt><dd><?php echo number_format($flugzeugtyp['Flugzeugtyp']['jahreskosten'] / 100,2 , ",", ".");?></dd>
<dt>Stündliche Kosten</dt><dd><?php echo number_format($flugzeugtyp['Flugzeugtyp']['stundenkosten'] / 100,2 , ",", ".");?></dd>
<dt>Crew Personal</dt><dd><?php echo $flugzeugtyp['Flugzeugtyp']['crewPersonal']?></dd>
<dt>Kabinen Personal</dt><dd><?php echo $flugzeugtyp['Flugzeugtyp']['cabinPersonal']?></dd>
</dl>

<!--
//TODO: Bild des Flugzeugs
-->