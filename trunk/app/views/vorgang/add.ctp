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
                  		echo "<option value=\"".$id."\">".$name."</option>\n";
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
                  		echo "<option value=\"".$id."\">".$name."</option>\n";
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
                  		echo "<option value=\"".$id."\">".$name."</option>\n";
                  	endforeach;
                  ?>
                </select>
              </div>
			  
			  <div class="type-button">
			<input type="button" value="Hinzufügen" id="button_zwischenstop" name="button_zwischenstop" style="float:right"/>
			</div>
               
			 <div class="type-text">
				<label for="firstname">Anzahl Personen</label>
                <input type="text" name="firstname" id="firstname" size="20" />
			</div>
			 <div class="type-select">
                <label for="more">Flugzeugtyp</label>
                <select name="salutation" id="salutation" size="1">
                  <option value="0" selected="selected" disabled="disabled">Bitte wählen</option>
                  <?php 
                  foreach ($Flugzeugtypen as $zeile):
                  		$id         = $zeile['Flugzeugtyp']['id'];
                  		$maxdistanz = $zeile['Flugzeugtyp']['reichweite'];
                  		$maxperson  = $zeile['Flugzeugtyp']['seats'];
                  		$minattend  = $zeile['Flugzeugtyp']['cabinPersonal'];
                  		$name	    = $zeile['Flugzeugtyp']['name'];
						echo '<option title="'.$maxdistanz.';'.$maxperson.';'.$minattend.'" value="'.$id.'">'.$name.'</option>'."\n";
                  	endforeach;
                  ?>
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
			$.ajax({
				type: "GET",
				url: "<?php echo $html->url('/adressen/view/');?>"+$("#customer").val()+".xml",
				dataType: "xml",
				cache: false,
				success:function(xml){
					$("#loader").hide();
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
	
		$("#zeitcharter").change(function () {
			if ($(this).val() == 'ja') {
				$("#div_zwischenstop").hide(500);
			}
			if ($(this).val() == 'nein') {
				$("#div_zwischenstop").show(500);
			}
		});
		
		$("#startflughafen").change(function () {
			if ($("input[name^='start;']").size() > 0) {
				$("input[name^='start;']").remove();
			}
			$("#txtcontent2_wrapper").append("<input type=\"hidden\" name=\"start;"+$("#startflughafen option:selected").val()+"\" value=\""+$("#startflughafen option:selected").text()+"\">");
			updateFlugdaten();	
		});
		
		$("#zielflughafen").change(function () {
			if ($("input[name^='ziel;']").size() > 0) {
				$("input[name^='ziel;']").remove();
			}
			$("#txtcontent2_wrapper").append("<input type=\"hidden\" name=\"ziel;"+$("#zielflughafen option:selected").val()+"\" value=\""+$("#zielflughafen option:selected").text()+"\">");
			updateFlugdaten(); 	
		});
		
		$("#button_zwischenstop").click(function () {
			if ($("input[name^='zwischenstop;']").size() < 10) {
				var count = "0"+$("input[name^='zwischenstop;']").size();
			}
			$("#txtcontent2_wrapper").append("<input type=\"hidden\" name=\"zwischenstop;"+count+";"+$("#zwischenstop option:selected").val()+"\" value=\""+$("#zwischenstop option:selected").text()+"\">");
			$('#zwischenstop').find('option:first').attr('selected', 'selected').parent('select');
			updateFlugdaten();	
		});
		
		
		function deleteZwischenstop(id) {
			
			$("input[name^='zwischenstop;"+id+"']").remove();
			var k ="";
			var airport = "";
			for (var i = 0; i < $("input[name^='zwischenstop;']").size(); i++){
				airport = $("input[name^='zwischenstop;']:eq("+i+")").attr('name').slice(16);
				if (i < 10) {
				k= "0"+i;
				$("input[name^='zwischenstop;']:eq("+i+")").attr("name", "zwischenstop;"+k+";"+airport);
				} else {
				$("input[name^='zwischenstop;']:eq("+i+")").attr("name", "zwischenstop;"+i+";"+airport);
				}
			}	
			updateFlugdaten();
		}
		
		function updateFlugdaten() {
			$("#fluginfos").html('');
			var add = "";
			add += "<table class=\"flugdaten_table\">\n";
			add += "<tr><td class=\"title_top\" colspan=\"2\">Flufdaten<\/td><\/tr>\n";
			var i=0;

			if ($("input[name^='start;']").size() > 0) {
				
				add += "<tr>\n";
				add += "<td class=\"img abflug\"><\/td><td class=\"airport\">"+$("input[name^='start;']").val()+"<\/td>\n";
				add += "<\/tr>\n";
				add += "<tr>\n";
				add += "<td colspan=\"2\" class=\"distance\">\n";
				if ($("input[name^='zwischenstop;']").size() > 0) {
					add += "Flugstrecke: <span title=\""+$("input[name^='start;']").attr('name').slice(6)+";"+$("input:first[name^='zwischenstop;']").attr('name').slice(16)+"\" id=\"distance_"+i+"\"><\/div>\n";
					i++;
				}
				if ( $("input[name^='ziel;']").size() > 0 && $("input[name^='zwischenstop;']").size() == 0) {
					add += "Flugstrecke: <span title=\""+$("input[name^='start;']").attr('name').slice(6)+";"+$("input[name^='ziel;']").attr('name').slice(5)+"\" id=\"distance_"+i+"\"><\/span>\n";
					i++;
				}
				add += "<\/td>\n";
				add += "<\/tr>\n";
			}
			
			if ($("input[name^='zwischenstop;']").size() > 0) {
			
			add += "<tr>\n";
			$("input[name^='zwischenstop;']").each(function(){  
				
				add += "<td class=\"img zwischenstop\"><\/td><td title=\"delzwischenstop_"+$(this).attr('name').slice(13,15)+"\" class=\"airport\">"+$(this).val()+"<\/td>\n";
				add += "<\/tr>\n";
				add += "<tr>\n";
				add += "<td colspan=\"2\" class=\"distance\">\n";
				if ($("input:last[name^='zwischenstop;']").attr('name') == $(this).attr('name') && $("input[name^='ziel;']").size() > 0) {
					add += "Flugstrecke: <span title=\""+$("input:last[name^='zwischenstop;']").attr('name').slice(16)+";"+$("input[name^='ziel;']").attr('name').slice(5)+"\" id=\"distance_"+i+"\"><\/span>\n";
					i++;
				}
				if ($("input:last[name^='zwischenstop;']").attr('name') != $(this).attr('name')) {
					add += "Flugstrecke: <span title=\""+$(this).attr('name').slice(16)+";"+$(this).next("input:last[name^='zwischenstop;']").attr('name').slice(16)+"\" id=\"distance_"+i+"\"><\/span>\n";
					i++;
				}
				add += "<\/td>\n";
				add += "<\/tr>\n";
				
			});
			}
			
			if ($("input[name^='ziel;']").size() > 0) {
				add += "<tr>\n";
				add += "<td class=\"img ankunft\"><\/td><td class=\"airport\">"+$("input[name^='ziel;']").val()+"<\/td>\n";
				add += "<\/tr>\n";
			}
			
			if ($("input[name^='ziel;']").size() == 0 && $("input[name^='zwischenstop;']").size() == 0) {
				add += "<\/table>\n";
				$("#fluginfos").append(add);
			} else {
				add += "<tr><td class=\"title\" colspan=\"2\">Gesamtstrecke<\/td><\/tr>\n";
				add += "<tr><td colspan=\"2\" id=\"distancesum\" class=\"distancesum\"><\/td><\/tr>\n";
				add += "<\/table>\n";
				$("#fluginfos").append(add);
				calcDitances();
			}
			
			$("td[title^='delzwischenstop_']").click(function () {
				deleteZwischenstop($(this).attr('title').slice(16));
				$("#help_delzwischenstop").fadeOut("fast");
			});
			
			$("td[title^='delzwischenstop_']").hover(
				function () {
				$(this).css('color','red').css('cursor','pointer');
				$("#help_delzwischenstop").fadeIn("fast");
				},
				function (){
				$(this).css('color','#000').css('cursor','auto');
				$("#help_delzwischenstop").fadeOut("fast");
				}
			);
		}
		
		function calcDitances(spanid, ap1, ap2) {
			if (!spanid) {
				$("#distancesum").text('0');
				$("span[id^='distance_']").each(function(){ 
					calcDitances($(this).attr("id").slice(9),$(this).attr("title").slice(0,1),$(this).attr("title").slice(2));
				});
				
			} else {
				$.ajax({
					type: "GET",
					url: "<?php echo $html->url('/entfernungen/berechnen/');?>"+ap1+"/"+ap2+".xml",
					dataType: "xml",
					cache: false,
					success:function(xml){
						$(xml).find('entfernung').each(function(){  
							if($(this).find('distance').text() == '') {
								$("#distance_"+spanid+"").text(0);
							} else {						
								$("#distance_"+spanid+"").text($(this).find('distance').text());
								$("#distancesum").text(parseInt($("#distancesum").text())+parseInt($(this).find('distance').text()));
							}
						});
					}
				});	
			}
		}
		
		$("#loader").ajaxStop(function(){
			$(this).hide();
		});
		
		$("#loader").ajaxStart(function(){
			$(this).show();
		});
	
	
	}); // DOCUMENT READY END


</script>
	