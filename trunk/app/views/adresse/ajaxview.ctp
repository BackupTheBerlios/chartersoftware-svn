<?php echo $xml->serialize($Adresse);?>
<contact>
	<?php echo $xml->elem('count','lala'); ?>
    <firma>aaa<?php echo $Adresse['Adresse']['firma']?></firma>
	<abteilung><?php echo $Adresse['Adresse']['abteilung']?></abteilung>
	<ansprechpartner><?php echo $Adresse['Adresse']['ansprechpartner']?></ansprechpartner>
	<strasse><?php echo $Adresse['Adresse']['strasse']?></strasse>
	<plz><?php echo $Adresse['Adresse']['plz']?></plz>
	<ort><?php echo $Adresse['Adresse']['ort']?></ort>
</contact>
