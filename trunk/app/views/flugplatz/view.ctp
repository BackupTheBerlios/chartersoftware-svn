<h2>Flugplatz</h2>

<h3>Informationen</h3>

<dl>
<dt>ID</dt>  <dd><?php echo $this->data['Flugplatz']['id']?></dd>
<dt>Bezeichnung</dt><dd><?php echo $this->data['Flugplatz']['name']?></dd>
<dt>IATA</dt><dd><?php echo $this->data['Flugplatz']['iata']?></dd>
<dt>Geogr. Position</dt><dd><?php echo $this->data['Flugplatz']['geoPosition']?></dd>
<dt>Zeitzone</dt><dd><?php echo $zeitzonenliste[$flugplatz['Flugplatz']['zeitzone_id']]?></dd>
</dl>

