	$(function() {
		$("#VorgangDatepicker").datepicker({ dateFormat: 'dd.mm.yy', dayNamesMin: ['So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa'], dayNames: ['Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag'], monthNames: ['Januar','Februar','M�rz','April','Mai','Juni','Juli','August','September','Oktober','November','Dezember']});
	});
	
	$(function() {
		$("#VorgangDatepicker2").datepicker({ dateFormat: 'dd.mm.yy', dayNamesMin: ['So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa'], dayNames: ['Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag'], monthNames: ['Januar','Februar','M�rz','April','Mai','Juni','Juli','August','September','Oktober','November','Dezember']});
	});

	$(document).ready(function () {
		$("#VorgangAdresseId").change(function () {
			$.ajax({
				type: "GET",
				url: "../adressen/view/"+$("#customer").val()+".xml",
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
	
		$("#zeitcharter").change(function () {
			if ($(this).val() == 'ja') {
				$("#button_add_zwischenstop").slideUp("normal");
				$("#div_zwischenstop").slideUp("normal");
				deleteZwischenstop('',1);
			}
			if ($(this).val() == 'nein') {
				$("#button_add_zwischenstop").slideDown("normal");
				$("#div_zwischenstop").slideDown("normal");
			}
		});
		
		$("#VorgangStartflughafen").change(function () {
			if ($("input[name^='start;']").size() > 0) {
				$("input[name^='start;']").remove();
			}
			$("#txtcontent2_wrapper").append("<input type=\"hidden\" name=\"start;"+$("#VorgangStartflughafen option:selected").val()+"\" value=\""+$("#VorgangStartflughafen option:selected").text()+"\">\n");
			updateFlugdaten();	
		});
		
		$("#VorgangZielflughafen").change(function () {
			if ($("input[name^='ziel;']").size() > 0) {
				$("input[name^='ziel;']").remove();
			}
			$("#txtcontent2_wrapper").append("<input type=\"hidden\" name=\"ziel;"+$("#VorgangZielflughafen option:selected").val()+"\" value=\""+$("#VorgangZielflughafen option:selected").text()+"\">\n");
			updateFlugdaten(); 	
		});
		
		$("#button_zwischenstop").click(function () {
			$("#txtcontent2_wrapper").append("<input type=\"hidden\" name=\"zwischenstop;"+$("input[name^='zwischenstop;']").size()+";"+$("#VorgangZwischenstop option:selected").val()+"\" value=\""+$("#VorgangZwischenstop option:selected").text()+"\">\n");
			$('#VorgangZwischenstop').find('option:first').attr('selected', 'selected').parent('select');
			updateFlugdaten();	
		});
		
		$("#personen").change(function () {
			updateFlugzeuge();
		});
		
		$("#flugzeugtyp").change(function () {
			updateFlugzeuge();
			$("#help_selectflugzeugtyp").fadeOut("fast");
		});
		
		function deleteZwischenstop(id, all) {	
			if (all == null) {
				$("input[name^='zwischenstop;"+id+"']").remove();
				for (var i = 0; i < $("input[name^='zwischenstop;']").size(); i++){
					$("input[name^='zwischenstop;']:eq("+i+")").attr('name').search(/.*;.*;(.*)/g);
					var airport = RegExp.$1;
					$("input[name^='zwischenstop;']:eq("+i+")").attr("name", "zwischenstop;"+i+";"+airport);
				}	
			}
			else {
				$("input[name^='zwischenstop;"+id+"']").each(function() {
					$(this).remove();
				});
			}
			updateFlugdaten();
		}
		
		function updateFlugdaten() {
			
			var add = "";
			var i=0;
			
			$("#fluginfos").html('');
			
			if ($("input[name^='zwischenstop;']").size() > 0 || $("input[name^='start;']").size() > 0 || $("input[name^='ziel;']").size() > 0) {
				add += "<table class=\"flugdaten_table\">\n";
				add += "<tr><td class=\"title_top\" colspan=\"2\">Flufdaten<\/td><\/tr>\n";
			}

			if ($("input[name^='start;']").size() > 0) {

				$("input[name^='start;']").attr('name').search(/.*;(.*)/g);
				var startid = RegExp.$1;
				
				if ( $("input[name^='ziel;']").size() > 0) {
				$("input[name^='ziel;']").attr('name').search(/.*;(.*)/g);
				var zielid = RegExp.$1;
				}
				
				var zwischenstop = '';
				var zwischenstop2 = '';
				
				add += "<tr>\n";
				add += "<td class=\"img abflug\"><\/td><td class=\"airport\">"+$("input[name^='start;']").val()+"<\/td>\n";
				add += "<\/tr>\n";
				add += "<tr>\n";
				add += "<td colspan=\"2\" class=\"distance\">\n";
				if ($("input[name^='zwischenstop;']").size() > 0) {
					$("input:first[name^='zwischenstop;']").attr('name').search(/.*;.*;(.*)/g);
					var zwischenstop = RegExp.$1;
					add += "Flugstrecke: <span title=\""+startid+";"+zwischenstop+"\" id=\"distance_"+i+"\"><\/div>\n";
					i++;
				}
				if ( $("input[name^='ziel;']").size() > 0 && $("input[name^='zwischenstop;']").size() == 0) {
				
					add += "Flugstrecke: <span title=\""+startid+";"+zielid+"\" id=\"distance_"+i+"\"><\/span>\n";
					i++;
				}
				add += "<\/td>\n";
				add += "<\/tr>\n";
			}
			
			if ($("input[name^='zwischenstop;']").size() > 0) {
			
			add += "<tr>\n";
			$("input[name^='zwischenstop;']").each(function(){  
				$(this).attr('name').search(/.*;(.*);.*/g);
				zwischenstop = RegExp.$1;
				add += "<td class=\"img zwischenstop\"><\/td><td title=\"delzwischenstop_"+zwischenstop+"\" class=\"airport\">"+$(this).val()+"<\/td>\n";
				add += "<\/tr>\n";
				add += "<tr>\n";
				add += "<td colspan=\"2\" class=\"distance\">\n";
				if ($("input:last[name^='zwischenstop;']").attr('name') == $(this).attr('name') && $("input[name^='ziel;']").size() > 0) {
					$("input:last[name^='zwischenstop;']").attr('name').search(/.*;.*;(.*)/g);
					zwischenstop = RegExp.$1;
					add += "Flugstrecke: <span title=\""+zwischenstop+";"+zielid+"\" id=\"distance_"+i+"\"><\/span>\n";
					i++;
				}
				if ($("input:last[name^='zwischenstop;']").attr('name') != $(this).attr('name')) {
					$(this).attr('name').search(/.*;.*;(.*)/g);
					zwischenstop = RegExp.$1;
					$(this).next("input:last[name^='zwischenstop;']").attr('name').search(/.*;.*;(.*)/g)
					zwischenstop2 = RegExp.$1;
					add += "Flugstrecke: <span title=\""+zwischenstop+";"+zwischenstop2+"\" id=\"distance_"+i+"\"><\/span>\n";
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
				$(this).attr('title').search(/.*_(.*)/g);
				var id = RegExp.$1;
				deleteZwischenstop(id);
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
					$(this).attr("id").search(/.*_(.*)/g);
					var id = RegExp.$1;
					$(this).attr("title").search(/(.*);(.*)/g);
					var from = RegExp.$1;
					var to = RegExp.$2;
					calcDitances(id,from,to);
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
								
								updateFlugzeuge();
							}
						});
					}
				});	
			}
		}
		
		function updateFlugzeuge() {
			
			$("#flugzeugtyp option[value!=0]").each(function () {
				$(this).attr("disabled","");
			});
			
			if($("#personen").val() != '') {
				var personen = parseInt($("#personen").val());
				$("#flugzeugtyp option[value!=0]").each(function () {
					$(this).attr("title").search(/(.*);(.*);(.*)/g);
					var reichweite = parseInt(RegExp.$1);
					var plaetze = parseInt(RegExp.$2);
					var requiredAttendands = parseInt(RegExp.$3);
					// Wenn ein bereits gewählter Flugzeugtype rausfällt
					if (personen > (plaetze-requiredAttendands) && ($(this).val() == $("#flugzeugtyp option:selected").val())) {
						$(this).attr("disabled","disabled");
						$('#flugzeugtyp').find('option:first').attr('selected', 'selected').parent('select');	
						$("#flightattendants").val('');
						$("#help_selectflugzeugtyp").fadeIn("fast");
					}
					if (personen > (plaetze-requiredAttendands) && ($(this).val() != $("#flugzeugtyp option:selected").val())) {
						$(this).attr("disabled","disabled");
					}
				
				});
			
			}
			
			if ($("#flugzeugtyp").val() != 0) {
				$("#flugzeugtyp option:selected").attr("title").search(/.*;.*;(.*)/g);
				requiredAttendands = parseInt(RegExp.$1);
				$("#flightattendants").val(requiredAttendands);
			
			}
			
			if ($("span[id^='distance_']").size() != 0) {
				var distance = 0;
				var maxdistance = 0;
				$("span[id^='distance_']").each(function() {
					distance = parseInt($(this).text());
					$("#flugzeugtyp option[value!=0]").each(function () {
						$(this).attr("title").search(/(.*);/g);
						maxdistance = parseInt(RegExp.$1);
						if (distance > maxdistance) {
							if (distance > maxdistance && ($(this).val() == $("#flugzeugtyp option:selected").val())) {
								$(this).attr("disabled","disabled");
								$('#flugzeugtyp').find('option:first').attr('selected', 'selected').parent('select');	
								$("#flightattendants").val('');
								$("#help_selectflugzeugtyp").fadeIn("fast");
							}
							if (distance > maxdistance && ($(this).val() != $("#flugzeugtyp option:selected").val())) {
								$(this).attr("disabled","disabled");
							}
						}
					});
				});
			}
			
		
		}
		
		// Bei Ajax Request zeige Loader (Global)
		
		$("#loader").ajaxStop(function(){
			$(this).hide();
		});
		
		$("#loader").ajaxStart(function(){
			$(this).show();
		});
	
	
	}); // DOCUMENT READY END
