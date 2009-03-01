<h2>Flugzeughersteller</h2>

<h3>Informationen</h3>

<dl>
<dt>ID</dt>  <dd><?php echo $flugzeughersteller['Flugzeughersteller']['id']?></dd>
<dt>Name</dt><dd><?php echo $flugzeughersteller['Flugzeughersteller']['name']?></dd>
<dt>Link</dt><dd><a href="<?php echo $flugzeughersteller['Flugzeughersteller']['link']?>" target=_blank><?php echo $flugzeughersteller['Flugzeughersteller']['link']?></a></dd>
<dt>Informatioen</dt><dd><?php echo $flugzeughersteller['Flugzeughersteller']['information']?></dd>
</dl>



<h3>Flugzeugtypen</h3>
    <?php echo $html->link('Neuen Flugzeugtyp anlegen','/flugzeugtyps/add')?>
    <table>
        <tr>
            <th>Name</th>
            <th>Reichweite</th>
            <th>Geschwindkeit</th>
            <th>Aendern</th>
            <th>Loeschen</th>
        </tr>

    <?php foreach ($flugzeughersteller['Flugzeugtyp'] as $zeile):?>
    <tr>
        <td><?php echo $html->link($zeile['name'], "/flugzeugtyps/view/".$zeile['id']); ?></td>
        <td><?php echo $zeile['reichweite']; ?></td>
        <td><?php echo $zeile['vmax']; ?></td>
        <td><?php echo $html->link('Aendern', "/flugzeugtyps/edit/{$zeile['id']}");?></td>
        <td><?php echo $html->link('Loeschen', "/flugzeugtyps/delete/{$zeile['id']}", null, 'Sind Sie sich sicher?' )?></td>
    </tr>
    <?php endforeach; ?>

</table>
