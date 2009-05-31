<?php echo $rentform->create('Vorgang', 'add');
	
	//================================================
	echo $rentform->begFieldset('Kundendaten');
	echo $rentform->select('Vorgang.adresse_id',$adressenliste, 'Kunde<sup title="Pflichtfeld.">*</sup>');
	echo $rentform->disabledTextInput('firma');
	echo $rentform->disabledTextInput('abteilung');
	echo $rentform->disabledTextInput('ansprechpartner');
	echo $rentform->disabledTextInput('strasse');
	echo $rentform->disabledTextInput('plz','PLZ');
	echo $rentform->disabledTextInput('ort');
	echo $rentform->endFieldset();
	

	//================================================
	echo $rentform->begFieldset('Flugdaten');
	echo $rentform->select('zeitcharter', $zeitcharter);
	echo $rentform->textInput('datepicker', 'Von Datum');
	echo $rentform->textInput('datepicker2', 'Bis Datum');
	echo $rentform->select('startflughafen', $flugplatzliste);	
	echo $rentform->select('zielflughafen', $flugplatzliste);
	echo '<div id="DivZwischenstop">' . "\n";
	echo $rentform->select('Zwischenstop', $flugplatzliste);
	echo $rentform->button('Hinzufügen', array('id'=>'button_zwischenstop', 'name'=>"button_zwischenstop", 'style'=>"float:right"));	
	echo '</div>' . "\n";
	echo $rentform->textInput('AnzahlPersonen', 'Anzahl Personen');
	echo $rentform->select('Flugzeugtyp', $flugzeugtypenliste);
	echo $rentform->textInput('AnzahlFlugbegleiter', 'Anzahl Flugbegleiter');
	echo $rentform->endFieldset();



	//================================================
	echo $rentform->begFieldset('Sonderwünsche');
	echo $rentform->textInput('Sonderwunsch');
	echo $rentform->textInput('Aufpreis');
	echo $rentform->button('Hinzufügen', array('id'=>'button_sonderwunsch', 'name'=>"button_sonderwunsch", 'style'=>"float:right"));	
		
	echo $rentform->end('Speichern')
?>
<script language="javascript" type="text/javascript">
	$(document).ready(function () {
		$("#VorgangAdresseId").change(function () {
			$.ajax({
				type: "GET",
				url: "<?php echo $html->url('/adressen/view/');?>"+$("#VorgangAdresseId").val()+".xml",
				dataType: "xml",
				cache: false,
				success:function(xml){
					$("#loader").hide();
					$(xml).find('adresse').each(function(){  
						$("#VorgangFirma").val($(this).find('firma').text())
						$("#VorgangAbteilung").val($(this).find('abteilung').text())
						$("#VorgangAnsprechpartner").val($(this).find('ansprechpartner').text())
						$("#VorgangStrasse").val($(this).find('strasse').text())
						$("#VorgangPlz").val($(this).find('plz').text())
						$("#VorgangOrt").val($(this).find('ort').text())
					});
				}
        
			});	
		});
	}); // DOCUMENT READY END
</script>
	