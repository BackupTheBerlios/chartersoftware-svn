<h2>Flugzeuge</h2>

<?php echo $html->link('Neues Flugzeug anlegen','/flugzeugs/add')?>

<table>
	<tr>
		<th>Id</th>
		<th>Kennzeichen</th>
		<th>Typ</th>
		<th>Aendern</th>
		<th>Loeschen</th>
	</tr>

	<?php foreach ($flugzeugs as $zeile): ?>
	<tr>
		<td><?php echo $zeile['Flugzeug']['id']; ?></td>
		<td><?php echo $html->link($zeile['Flugzeug']['kennzeichen'], "/flugzeugs/view/".$zeile['Flugzeug']['id']); ?></td>
		<td><?php echo $html->link($zeile['Flugzeugtyp']['name'], "/flugzeugtyps/view/".$zeile['Flugzeugtyp']['id']); ?></td>
        <td><?php echo $html->link('Aendern', "/flugzeugs/edit/{$zeile['Flugzeug']['id']}");?></td>
		<td><?php echo $html->link('Loeschen', "/flugzeugs/delete/{$zeile['Flugzeug']['id']}", null, 'Sind Sie sich sicher?' )?></td>
	</tr>
	<?php endforeach; ?>

</table>