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
                <label for="zeitcharter">Zeitcharter</label>
                <select name="zeitcharter" id="zeitcharter" size="1">
                  <option value="0" selected="selected" disabled="disabled">Bitte wählen</option>
                  <option value="ja">Ja</option>
				  <option value="nein">Nein</option>
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
			  <div class="type-select">
                <label for="startflughafen">Startflughafen</label>
                <select name="startflughafen" id="startflughafen" size="1">
                  <option value="0" selected="selected" disabled="disabled">Bitte wählen</option>
                  <?php
                  	foreach ($Flugplaetze as $zeile):
                  		$name = $zeile['Flugplatz']['name'];
                  		$iata = $zeile['Flugplatz']['iata'];
                  		$id   = $zeile['Flugplatz']['id'];
                  		$name = $name . ' (' . $iata . ')';
                  		echo "<option value=\"".$id."\">".$name."</option>";
                  	endforeach;
                  ?>
                </select>
              </div>
			   <div class="type-select">
                <label for="zielflughafen">Zielflughafen</label>
                <select name="zielflughafen" id="zielflughafen" size="1">
                  <option value="0" selected="selected" disabled="disabled">Bitte wählen</option>
                  <?php
                  	foreach ($Flugplaetze as $zeile):
                  		$name = $zeile['Flugplatz']['name'];
                  		$iata = $zeile['Flugplatz']['iata'];
                  		$id   = $zeile['Flugplatz']['id'];
                  		$name = $name . ' (' . $iata . ')';
                  		echo "<option value=\"".$id."\">".$name."</option>";
                  	endforeach;
                  ?>
                </select>
              </div>
			  <div class="type-select" id="div_zwischenstop">
                <label for="zwischenstop">Zwischenstop</label>
                <select name="zwischenstop" id="zwischenstop" size="1">
                  <option value="0" selected="selected" disabled="disabled">Bitte wählen</option>
                  <?php
                  	foreach ($Flugplaetze as $zeile):
                  		$name = $zeile['Flugplatz']['name'];
                  		$iata = $zeile['Flugplatz']['iata'];
                  		$id   = $zeile['Flugplatz']['id'];
                  		$name = $name . ' (' . $iata . ')';
                  		echo "<option value=\"".$id."\">".$name."</option>";
                  	endforeach;
                  ?>
                </select>
				<input type="button" value="Hinzufügen" id="button1" name="button1" style="float:right"/>
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
				type: "GET",
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
	
	$("#zeitcharter").change(function () {
		if ($(this).val() == 'ja') {
		 $("#div_zwischenstop").hide(500);
		 $("#us_zeitcharter").html('ja');
		}
		if ($(this).val() == 'nein') {
		$("#div_zwischenstop").show(500);
		$("#us_zeitcharter").html('nein');
		}
		
	});
	
	$("#startflughafen").change(function () {
		$('#loader').show();
		$.ajax({
			type: "POST",
			url: "<?php echo $html->url('/flugplatz/view/');?>"+$("#startflughafen").val()+".xml",
			data: "controller=ajax_flugroute&action=add_start&id="+$("#startflughafen").val(),
			dataType: "xml",
			cache: false,
			success:function(xml){
				
				$("#us_content").html('');
				$("#loader").hide();
				$(xml).find('flugdaten').each(function(){  
					if ($(this).find('streckesum').text() != '0') {
						
						$(this).find('route').each(function(){  
							var add = "<div class=\"type-text\">\n";
							add += "<label for=\"us_abflug\">Von<\/label>\n";
							add += "<input type=\"text\" name=\"us_abflug\" size=\"20\" value=\""+$(this).find('start').text()+"\"\/>\n";
							add += "<\/div>\n";
							add += "<div class=\"type-text\">\n";
							add += "<label for=\"us_ankunft\">Nach<\/label>\n";
							add += "<input type=\"text\" name=\"us_ankunft\" size=\"20\" value=\""+$(this).find('ziel').text()+"\"\/>\n";
							add += "<\/div>\n";
							add += "<div class=\"type-text\">\n";
							add += "<label for=\"us_ankunft\">Distanz<\/label>\n";
							add += "<input type=\"text\" name=\"us_distanz\" size=\"20\" value=\""+$(this).find('strecke').text()+"\"\/>\n";
							add += "<\/div>\n";
							if ($(this).find('zwischenstop').text() == '1') {
				
								add += "<br \/><input type=\"button\" value=\"Zwischenstop löschen\" id=\"zwischenstop_"+$(this).find('id').text()+"\" name=\"zw_delete\" \/>\n";
							}
							add += "<hr class=\"hr2\">\n";
						
							$("#us_content").append(add);
						});		
						
						add = "";
						add += "<div class=\"type-text\">\n";
						add += "<label for=\"us_distancesum\">Distanz Gesamt<\/label>\n";
						add += "<input type=\"text\" name=\"us_distancesum\" size=\"20\" value=\""+$(this).find('distance').text()+"\"\/>\n";
						add += "<\/div>\n";
						
						$("#us_content").append(add);
					
						if ($(this).find('kosten').text() != '0') {
						add = "";
						add += "<div class=\"type-text\">\n";
						add += "<label for=\"us_distancesum\">Kosten<\/label>\n";
						add += "<input type=\"text\" name=\"us_distancesum\" size=\"20\" value=\""+$(this).find('kosten').text()+"\"\/>\n";
						add += "<\/div>\n";
						
						$("#us_content").append(add);
						
						}
					}
				});
			}
	
		});
		
	});
	
	$("#zielflughafen").change(function () {
		$.ajax({
			type: "POST",
			url: "data/index.php",
			data: "controller=ajax_flugroute&action=add_ziel&id="+$("#Zielflughafen").val(),
			dataType: "xml",
			cache: false,
			success:function(xml){
				alert("test2");
			}
	
		});	
		
	});
	
	$("#zwischenstop").change(function () {
		$.ajax({
			type: "POST",
			url: "data/index.php",
			data: "controller=ajax_flugroute&action=add_zwischenstop&id="+$("#zwischenstop").val(),
			dataType: "xml",
			cache: false,
			success:function(xml){
				alert("test2");
			}
	
		});	
		
	});

	
	
</script>
	