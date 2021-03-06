<h3>Informationen</h3>

<dl>
<dt>ID</dt>  <dd><?php echo $flugzeug['Flugzeug']['id']?></dd>
<dt>Kennzeichen</dt><dd><?php echo $flugzeug['Flugzeug']['kennzeichen']?></dd>
</dl>

<h3>Informationen zum Flugzeugtyp</h3>
<dl>
<dt>ID des Typs</dt><dd><?php echo $flugzeug['Flugzeugtyp']['id']?></dd>
<dt>Flugzeugtyp</dt><dd><?php echo $flugzeug['Flugzeugtyp']['name']?></dd>
<dt>Reichweite</dt><dd><?php echo $flugzeug['Flugzeugtyp']['reichweite']?></dd>
<dt>Geschwindigkeit</dt><dd><?php echo $flugzeug['Flugzeugtyp']['vmax']?></dd>
<dt>Jährliche Kosten</dt><dd><?php echo number_format($flugzeug['Flugzeugtyp']['jahreskosten'] / 100,2 , ",", ".");?></dd>
<dt>Stündliche Kosten</dt><dd><?php echo number_format($flugzeug['Flugzeugtyp']['stundenkosten'] / 100,2 , ",", ".");?></dd>
<dt>Crew Personal</dt><dd><?php echo $flugzeug['Flugzeugtyp']['crewPersonal']?></dd>
<dt>Kabinen Personal</dt><dd><?php echo $flugzeug['Flugzeugtyp']['cabinPersonal']?></dd>
<dt>Link</dt><dd><a href="<?php echo $flugzeug['Flugzeugtyp']['wikipedia']?>" target=_blank><?php echo $flugzeug['Flugzeugtyp']['wikipedia']?></a></dd>
<dt>Bild</dt><dd><?php echo $html->image($flugzeug['Flugzeugtyp']['bild'],array('width'=>'300' ))?></dd>
</dl>


<h3>Informationen zum Hersteller</h3>
<dl>
<dt>ID</dt>  <dd><?php echo $flugzeughersteller['Flugzeughersteller']['id']?></dd>
<dt>Name</dt><dd><?php echo $flugzeughersteller['Flugzeughersteller']['name']?></dd>
<dt>Link</dt><dd><a href="<?php echo $flugzeughersteller['Flugzeughersteller']['link']?>" target=_blank><?php echo $flugzeughersteller['Flugzeughersteller']['link']?></a></dd>
<dt>Informatioen</dt><dd><?php echo $flugzeughersteller['Flugzeughersteller']['information']?></dd>
</dl>
