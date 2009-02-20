<h2>Flugzeug Hersteller</h2>
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
		<td><?php echo $zeile['Flugzeughersteller']['id']; ?></td>
		<td><?php echo $html->link($zeile['Flugzeughersteller']['name'], "/flugzeugherstellers/view/".$zeile['Flugzeughersteller']['id']); ?></td>
		<td><?php echo $html->link('Aendern', "/flugzeugherstellers/edit/{$zeile['Flugzeughersteller']['id']}");?></td>
		<td><?php echo $html->link('Loeschen', "/flugzeugherstellers/delete/{$zeile['Flugzeughersteller']['id']}", null, 'Sind Sie sich sicher?' )?></td>
	</tr>
	<?php endforeach; ?>

</table>