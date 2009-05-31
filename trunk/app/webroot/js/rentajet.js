	//scheint zu funktionieren
	$(function() {
		$("#VorgangDatepicker").datepicker({ dateFormat: 'dd.mm.yy', dayNamesMin: ['So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa'], dayNames: ['Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag'], monthNames: ['Januar','Februar','M�rz','April','Mai','Juni','Juli','August','September','Oktober','November','Dezember']});
	});
	
	//scheint zu funktionieren
	$(function() {
		$("#VorgangDatepicker2").datepicker({ dateFormat: 'dd.mm.yy', dayNamesMin: ['So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa'], dayNames: ['Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag'], monthNames: ['Januar','Februar','M�rz','April','Mai','Juni','Juli','August','September','Oktober','November','Dezember']});
	});

	//scheint zu funktionieren
	$(document).ready(function () {
		$("#VorgangAdresseId").change(function () {
			$.ajax({
				type: "GET",
				url: "../adressen/view/"+$("#VorgangAdresseId").val()+".xml",
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

	//scheint zu funktionieren
	$("#VorgangZeitcharter").change(function () {
			if ($(this).val() == 'ja') {
				$("#DivZwischenstop").hide(500);
			}
			if ($(this).val() == 'nein') {
				$("#DivZwischenstop").show(500);
			}
	});
	
	
	//scheint zu funktionieren
	$("#VorgangStartflughafen").change(function () {
			if ($("input[name^='start;']").size() > 0) {
				$("input[name^='start;']").remove();
			}
			$("#txtcontent2_wrapper").append("<input type=\"hidden\" name=\"start;"+$("#VorgangStartflughafen option:selected").val()+"\" value=\""+$("#VorgangStartflughafen option:selected").text()+"\">");
			updateFlugdaten();	
	});
		
	//scheint zu funktionieren
	$("#VorgangZielflughafen").change(function () {
			if ($("input[name^='ziel;']").size() > 0) {
				$("input[name^='ziel;']").remove();
			}
			$("#txtcontent2_wrapper").append("<input type=\"hidden\" name=\"ziel;"+$("#VorgangZielflughafen option:selected").val()+"\" value=\""+$("#VorgangZielflughafen option:selected").text()+"\">");
			updateFlugdaten(); 	
	});
		
	//scheint zu funktionieren
	$("#button_zwischenstop").click(function () {
			if ($("input[name^='zwischenstop;']").size() < 10) {
				var count = "0"+$("input[name^='zwischenstop;']").size();
			}
			$("#txtcontent2_wrapper").append("<input type=\"hidden\" name=\"zwischenstop;"+count+";"+$("#VorgangZwischenstop option:selected").val()+"\" value=\""+$("#VorgangZwischenstop option:selected").text()+"\">");
			$('#VorgangZwischenstop').find('option:first').attr('selected', 'selected').parent('select');
			updateFlugdaten();	
	});
		
		
	//scheint zu funktionieren
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
		
	//scheint zu funktionieren
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
					url: "../entfernungen/berechnen/"+ap1+"/"+ap2+".xml",
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

	//scheint zu funktionieren
	$("#loader").ajaxStop(function(){
		$(this).hide();
	});
		
	//scheint zu funktionieren
	$("#loader").ajaxStart(function(){
		$(this).show();
	});
	
	
	}); // DOCUMENT READY END
