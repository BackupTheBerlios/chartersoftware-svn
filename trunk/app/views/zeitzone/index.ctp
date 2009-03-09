<h2>Zeitzone</h2>
<?php echo $html->link('Neue Zeitzone anlegen','/zeitzonen/add')?>
<table>
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Diff UTC</th>
		<th>Aendern</th>
		<th>Loeschen</th>
	</tr>

	<!-- Here is where we loop through our $posts array, printing out post info -->

	<?php foreach ($zeitzonen as $zone): ?>
	<tr>
		<td><?php echo $zone['Zeitzone']['id']; ?></td>
		<td><?php echo $html->link($zone['Zeitzone']['name'], "/zeitzonen/view/".$zone['Zeitzone']['id']); ?></td>
		<td><?php echo $zone['Zeitzone']['differenzUtc']; ?></td>
		<td><?php echo $html->link('Aendern', "/zeitzonen/edit/{$zone['Zeitzone']['id']}");?></td>
		<td><?php echo $html->link('Loeschen', "/zeitzonen/delete/{$zone['Zeitzone']['id']}", null, 'Sind Sie sich sicher?' )?></td>
	</tr>
	<?php endforeach; ?>

</table>
