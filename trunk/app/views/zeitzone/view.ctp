<h2>Zeitzone</h2>

<h3>Informationen</h3>

<dl>
<dt>ID</dt>  <dd><?php echo $zeitzone['Zeitzone']['id']?></dd>
<dt>Name</dt><dd><?php echo $zeitzone['Zeitzone']['name']?></dd>
<dt>Differenz zur UTC</dt><dd><?php echo $zeitzone['Zeitzone']['differenzUtc']?></dd>
</dl>



<h3>Flugplaetze in Zeitzone</h3>
<table>
    <tr>
        <th>Id</th>
        <th>Internat. Kuerzel</th>
        <th>Name</th>
        <th>Aendern</th>
        <th>Loeschen</th>
    </tr>

    <?php foreach ($zeitzone['Flugplatz'] as $zeile):?>
    <tr>
        <td><?php echo $zeile['id']; ?></td>
        <td><?php echo $html->link($zeile['internatKuerzel'], "/flugplatzs/view/".$zeile['id']); ?></td>
        <td><?php echo $html->link($zeile['name'], "/flugplatzs/view/".$zeile['id']); ?></td>
        <td><?php echo $html->link('Aendern', "/flugplatzs/edit/{$zeile['id']}");?></td>
        <td><?php echo $html->link('Loeschen', "/flugplatzs/delete/{$zeile['id']}", null, 'Sind Sie sich sicher?' )?></td>
    </tr>
    <?php endforeach; ?>

</table>
