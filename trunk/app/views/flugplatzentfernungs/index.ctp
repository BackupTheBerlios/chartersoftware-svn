<h2>Entfernung zwischen Flugplaetzen</h2>
<?php echo $html->link('Neue Flugplatz-Entfernung anlegen','/flugplatzentfernungs/add')?>
<table>
	<tr>
		<th>Id</th>
		<th>Start-Flugplatz</th>
		<th>Ziel-Flugplatz</th>
        <th>Entfernung</th>
		<th>Aendern</th>
		<th>Loeschen</th>
	</tr>

<?php
    $flugplatzModell = new Flugplatz(); 
    $flugplatz =$flugplatzModell->find('list');
?>
	<?php foreach ($flugplatzentfernungs as $zeile): ?>
	<tr>
		<td><?php echo $zeile['Flugplatzentfernung']['id']; ?></td>
		<td><?php echo $flugplatz[$zeile['Flugplatzentfernung']['flugplatzstart_id']]?></td>
        <td><?php echo $flugplatz[$zeile['Flugplatzentfernung']['flugplatzziel_id']]?></td>
        <td><?php echo $zeile['Flugplatzentfernung']['entfernung']?></td>
		<td><?php echo $html->link('Aendern', "/flugplatzentfernungs/edit/{$zeile['Flugplatzentfernung']['id']}");?></td>
		<td><?php echo $html->link('Loeschen', "/flugplatzentfernungs/delete/{$zeile['Flugplatzentfernung']['id']}", null, 'Sind Sie sich sicher?' )?></td>
	</tr>
	<?php endforeach; ?>

</table>