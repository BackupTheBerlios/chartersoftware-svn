<!-- File: /app/views/posts/index.ctp -->

<h1>Flugplatz</h1>
<?php echo $html->link('Neuen Flugplatz anlegen','/flugplatz/add')?>
<table>
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Int Abk</th>
		<th>Zeitzone</th>
		<th>Diff UTC</th>
		<th>Geogr. Position</th>
	</tr>

	<!-- Here is where we loop through our $posts array, printing out post info -->

	<?php foreach ($flugplaetze as $platz): ?>
	<tr>
		<td><?php echo $platz['Flugplatz']['id']; ?></td>
		<td>
			<?php echo $html->link($platz['Flugplatz']['name'], "/flugplatz/view/".$platz['Flugplatz']['id']); ?>
		</td>
		<td><?php echo $platz['Flugplatz']['int_abk']; ?></td>
		<td><?php echo $platz['Flugplatz']['zeitzone']; ?></td>
		<td><?php echo $platz['Flugplatz']['diff_utc']; ?></td>
		<td><?php echo $platz['Flugplatz']['position']; ?></td>
	</tr>
	<?php endforeach; ?>

</table>