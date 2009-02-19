<h1>Flugzeug Hersteller</h1>
<?php echo $html->link('Neuen Hersteller anlegen','/flugzeugherstellers/add')?>
<table>
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Aendern</th>
		<th>Loeschen</th>
	</tr>

	<?php foreach ($flugzeugherstellers as $zeile): ?>
	<tr>
		<td><?php echo $zeile['FlugzeugHersteller']['id']; ?></td>
		<td><?php echo $html->link($zeile['FlugzeugHersteller']['name'], "/flugzeugherstellers/view/".$zeile['FlugzeugHersteller']['id']); ?></td>
		<td><?php echo $html->link('Aendern', "/flugzeugherstellers/edit/{$zeile['FlugzeugHersteller']['id']}");?></td>
		<td><?php echo $html->link('Loeschen', "/flugzeugherstellers/delete/{$zeile['FlugzeugHersteller']['id']}", null, 'Sind Sie sich sicher?' )?></td>
	</tr>
	<?php endforeach; ?>

</table>