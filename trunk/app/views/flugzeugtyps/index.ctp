<h1>Flugzeugtyp</h1>
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
		<td><?php echo $zeile['FlugzeugTyp']['id']; ?></td>
		<td><?php echo $html->link($zeile['FlugzeugTyp']['name'], "/flugzeugtyps/view/".$zeile['FlugzeugTyp']['id']); ?></td>
		<td><?php echo $html->link($zeile['FlugzeugTyp']['name'], "/flugzeugtyps/view/".$zeile['FlugzeugTyp']['id']); ?></td>
		<td><?php echo $html->link('Aendern', "/flugzeugtyps/edit/{$zeile['FlugzeugTyp']['id']}");?></td>
		<td><?php echo $html->link('Loeschen', "/flugzeugtyps/delete/{$zeile['FlugzeugTyp']['id']}", null, 'Sind Sie sich sicher?' )?></td>
	</tr>
	<?php endforeach; ?>

</table>