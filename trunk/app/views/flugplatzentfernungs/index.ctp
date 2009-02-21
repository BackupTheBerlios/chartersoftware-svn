<h2>Flugzeugtyp</h2>
<?php echo $html->link('Neuen Flugzeugtyp anlegen','/flugzeugtyps/add')?>
<table>
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Hersteller</th>
		<th>Aendern</th>
		<th>Loeschen</th>
	</tr>

	<?php foreach ($flugzeugtyps as $zeile): ?>
	<tr>
		<td><?php echo $zeile['Flugzeugtyp']['id']; ?></td>
		<td><?php echo $html->link($zeile['Flugzeugtyp']['name'], "/flugzeugtyps/view/".$zeile['Flugzeugtyp']['id']); ?></td>
		<td><?php echo $html->link($zeile['Flugzeughersteller']['name'], "/flugzeugherstellers/view/".$zeile['Flugzeughersteller']['id']); ?></td>
		<td><?php echo $html->link('Aendern', "/flugzeugtyps/edit/{$zeile['Flugzeugtyp']['id']}");?></td>
		<td><?php echo $html->link('Loeschen', "/flugzeugtyps/delete/{$zeile['Flugzeugtyp']['id']}", null, 'Sind Sie sich sicher?' )?></td>
	</tr>
	<?php endforeach; ?>

</table>