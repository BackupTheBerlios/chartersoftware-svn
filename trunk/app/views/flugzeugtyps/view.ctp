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
<dt>Wikipedia</dt><dd><a href="<?php echo $flugzeugtyp['Flugzeugtyp']['wikipedia']?>" target=_blank><?php echo $flugzeugtyp['Flugzeugtyp']['wikipedia']?></a></dd>
<dt>Bild</dt><dd><?php echo $html->image($flugzeugtyp['Flugzeugtyp']['bild'])?></dd>
</dl>

<h3>Bestand an Flugzeugen</h3>


<?php echo $html->link('Neues Flugzeug anlegen','/flugzeugs/add')?>

<table>
    <tr>
        <th>Id</th>
        <th>Kennzeichen</th>
        <th>Aendern</th>
        <th>Loeschen</th>
    </tr>

    <?php foreach ($flugzeugtyp['Flugzeug'] as $zeile):?>
    <tr>
        <td><?php echo $zeile['id']; ?></td>
        <td><?php echo $html->link($zeile['kennzeichen'], "/flugzeugs/view/".$zeile['id']); ?></td>
        <td><?php echo $html->link('Aendern', "/flugzeugs/edit/{$zeile['id']}");?></td>
        <td><?php echo $html->link('Loeschen', "/flugzeugs/delete/{$zeile['id']}", null, 'Sind Sie sich sicher?' )?></td>
    </tr>
    <?php endforeach; ?>

</table>
<!--
//TODO: Bild des Flugzeugs
-->