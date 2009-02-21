<h2>Flugzeugtyp</h2>
<?php echo $html->link('Neuen Flugplatz anlegen','/flugplatzs/add')?>
<table>
	<tr>
		<th>Id</th>
        <th>Internat. Kuerzel</th>
		<th>Name</th>
        <th>Zeitzone</th>
		<th>Aendern</th>
		<th>Loeschen</th>
	</tr>

	<?php foreach ($flugplatzs as $zeile): ?>
	<tr>
		<td><?php echo $zeile['Flugplatz']['id']; ?></td>
		<td><?php echo $html->link($zeile['Flugplatz']['internatKuerzel'], "/flugplatzs/view/".$zeile['Flugplatz']['id']); ?></td>
        <td><?php echo $html->link($zeile['Flugplatz']['name'], "/flugplatzs/view/".$zeile['Flugplatz']['id']); ?></td>
		<td><?php echo $html->link($zeile['Zeitzone']['name'], "/zeitzones/view/".$zeile['Zeitzone']['id']); ?></td>
		<td><?php echo $html->link('Aendern', "/flugplatzs/edit/{$zeile['Flugplatz']['id']}");?></td>
		<td><?php echo $html->link('Loeschen', "/flugplatzs/delete/{$zeile['Flugplatz']['id']}", null, 'Sind Sie sich sicher?' )?></td>
	</tr>
	<?php endforeach; ?>

</table>