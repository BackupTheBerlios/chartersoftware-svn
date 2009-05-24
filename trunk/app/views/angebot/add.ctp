	<form method="post" action="" class="yform columnar">
            <fieldset>
			<div class="type-text">
                <label for="vorgangsnummer">Vorgangsnummer</label>
                <input type="text" name="vorgangsnummer" id="vorgangsnummer" size="20" class="readonly" readonly value=<?php echo '"'.$Vorgangsnummer . '"'?>/>
              </div>
			</fieldset>
			
			<fieldset>
              <legend>Kundendaten</legend>
              <div class="type-select">
                <label for="salutation">Kunde <sup title="This field is mandatory.">*</sup> </label>
                <select name="customer" id="customer" size="1">
                  <option value="0" selected="selected" disabled="disabled">Bitte wählen</option>
                  <?php
                  	foreach ($Adressen as $zeile):
                  		//name des Ansprechpartners
                  		$name = $zeile['Adresse']['ansprechpartner'];
                  		//ggf. Firma hinzu
                  		if (strlen($zeile['Adresse']['firma'])>0) {
                  			$name = $zeile['Adresse']['firma'] . ' (' . $name .')';
                  		}
                  		//$name = $html->url('/adressen/ajaxview/');
                  		echo "<option value=\"".$zeile['Adresse']['id']."\">".$name."</option>";
                  	endforeach;
                  ?>
                </select>
              </div>
            <div class="type-text">
                <label for="firstname">Firma</label>
                <input type="text" name="firma" id="firma" size="20" class="readonly" readonly />
			</div>
			 <div class="type-text">
				<label for="firstname">Abteilung</label>
                <input type="text" name="abteilung" id="abteilung" size="20" class="readonly" readonly />
			</div>
			<div class="type-text">
				<label for="firstname">Ansprechpartner</label>
                <input type="text" name="ansprechpartner" id="ansprechpartner" size="20" class="readonly" readonly />
			</div>
			<div class="type-text">
				<label for="firstname">Straße</label>
                <input type="text" name="strasse" id="strasse" size="20" class="readonly" readonly />
            </div>
			<div class="type-text">
				<label for="firstname">PLZ</label>
                <input type="text" name="plz" id="plz" size="20" class="readonly" readonly />
            </div>
			<div class="type-text">
				<label for="firstname">Ort</label>
                <input type="text" name="ort" id="ort" size="20" class="readonly" readonly />
            </div>
            </fieldset>
            <fieldset>
              <legend>Flugdaten</legend>
              <div class="type-select">
                <label for="more">Zeitcharter</label>
                <select name="salutation" id="salutation" size="1">
                  <option value="0" selected="selected" disabled="disabled">Bitte wählen</option>
                  <option value="Mr.">Ja</option>
				  <option value="Mr.">Nein</option>
                </select>
              </div>
			  
			  <div class="type-select">
                <label for="more">Startflughafen</label>
                <select name="salutation" id="salutation" size="1">
                  <option value="0" selected="selected" disabled="disabled">Bitte wählen</option>
                  <option value="Mr.">Ja</option>
				  <option value="Mr.">Nein</option>
                </select>
              </div>
			  
			  <div class="type-select">
                <label for="more">Zwischenstop</label>
                <select name="salutation" id="salutation" size="1">
                  <option value="0" selected="selected" disabled="disabled">Bitte wählen</option>
                  <option value="Mr.">Ja</option>
				  <option value="Mr.">Nein</option>
                </select>
              </div>
			 <div class="type-button">
				<input type="button" value="Hinzufügen" id="button1" name="button1" style="float:right"/>
			</div>
			<div id="liste_zwischenstop">
				<br /><hr><br />
				<div class="type-text_element">
					<label for="firstname">Zwischenstop</label>
					<input type="text" name="firstname" id="firstname" size="20" class="text" value="Paris" />
					<input type="button" value="entfernen" id="button1" name="button1" class="button"/>
				</div>
				<br /><hr><br />
			</div>
			  <div class="type-select">
                <label for="more">Zielflughafen</label>
                <select name="salutation" id="salutation" size="1">
                  <option value="0" selected="selected" disabled="disabled">Bitte wählen</option>
                  <option value="Mr.">Ja</option>
				  <option value="Mr.">Nein</option>
                </select>
              </div>
			  
               <div class="type-text">
				<label for="firstname">Von Datum</label>
				<input type="text" name="firstname" id="datepicker" size="20" />
			</div>
               <div class="type-text">
				<label for="firstname">Bis Datum</label>
                <input type="text" name="firstname" id="datepicker2" size="20" />
			</div>
			 <div class="type-text">
				<label for="firstname">Anzahl Personen</label>
                <input type="text" name="firstname" id="firstname" size="20" />
			</div>
			 <div class="type-select">
                <label for="more">Flugzeugtyp</label>
                <select name="salutation" id="salutation" size="1">
                  <option value="0" selected="selected" disabled="disabled">Bitte wählen</option>
                  <option value="Mr.">Ja</option>
				  <option value="Mr.">Nein</option>
                </select>
              </div>
			<div class="type-text">
				<label for="firstname">Flightattendants</label>
                <input type="text" name="firstname" id="firstname" size="20" />
			</div>
            </fieldset>
            <fieldset>
			<legend>Sonderwünsche</legend>
             <div class="type-text">
				<label for="firstname">Sonderwunsch</label>
                <textarea name="message" id="message" cols="30" rows="1"></textarea>
			</div>
			<div class="type-text">
				<label for="firstname">Aufpreis</label>
                <input type="text" name="firstname" id="firstname" size="20" />
			</div>
			<div class="type-button">
			<input type="button" value="Hinzufügen" id="button1" name="button1" style="float:right"/>
			</div>
			<div id="liste_sonderwunsch">
			<br /><hr><br />
			<div class="type-text">
				<label for="firstname">Sonderwunsch</label>
                <textarea name="message" id="message" cols="30" rows="1" readonly>2 nackte Pilotinen</textarea>
			</div>
			<div class="type-text">
				<label for="firstname">Aufpreis</label>
                <input type="text" name="firstname" id="firstname" size="20" readonly value="200,00"/>
			</div>
			<div class="type-button">
			<input type="button" value="Entfernen" id="button1" name="button1" style="float:right"/>
			</div>
			
			</div>
            </fieldset>
            <div class="type-button">
              <input type="button" value="Speichern" id="button1" name="button1" />
			  <input type="button" value="Druckansicht" id="button1" name="button1" />
            </div>

          </form>

<script language="javascript" type="text/javascript">


	$(function() {
		$("#datepicker").datepicker({ dateFormat: 'dd.mm.yy', dayNamesMin: ['So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa'], dayNames: ['Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag'], monthNames: ['Januar','Februar','M�rz','April','Mai','Juni','Juli','August','September','Oktober','November','Dezember']});
	});
	
	$(function() {
		$("#datepicker2").datepicker({ dateFormat: 'dd.mm.yy', dayNamesMin: ['So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa'], dayNames: ['Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag'], monthNames: ['Januar','Februar','M�rz','April','Mai','Juni','Juli','August','September','Oktober','November','Dezember']});
	});


	
	$(document).ready(function () {
		$("#customer").change(function () {
			var query= "controller=ajax_customerinfo&id="+$("#customer").val();
			$.ajax({
				type: "POST",
				url: "<?php echo $html->url('/adressen/view/');?>"+$("#customer").val()+".xml",
				data: "controller=ajax_customerinfo&id="+$("#customer").val(),
				dataType: "xml",
				cache: false,
				success:function(xml){
					$(xml).find('adresse').each(function(){  
						$("#firma").val($(this).find('firma').text())
						$("#abteilung").val($(this).find('abteilung').text())
						$("#ansprechpartner").val($(this).find('ansprechpartner').text())
						$("#strasse").val($(this).find('strasse').text())
						$("#plz").val($(this).find('plz').text())
						$("#ort").val($(this).find('ort').text())
					});
				}
        
			});	
		});
	});
</script>
	