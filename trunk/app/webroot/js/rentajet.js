/**
 * GUI Interactions
 *
 * @author F. Geist
 *
 * Stellt alle Funktionen für das Arbeiten mit dem Frontend zur Verfügung.
 * z.B. Tooltips, Nachladen von Daten (Ajax / XML), automatische Aktualisierung von Auswahlmenues, Berechnungen von Gesamtstrecken usw. 
 * Siehe auch genutztes Framework für weitere Informationen : http://jquery.com/
 * 
 * Letzte Änderung: 04.06.2009
 *
 */

$(document).ready(function () {

	reqcounter = 0;
	reqsum = 0;
	
	$("#VorgangAdresseId").change(function () {
		$("#loader_adresse").show();
		$.ajax({
			type: "GET",
			url: "../../adressen/view/"+$("#VorgangAdresseId").val()+".xml",
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
				$("#loader_adresse").hide();
			}
	
		});	
	});


	$("#VorgangZeitcharter").change(function () {
		hidetooltip();
		if ($(this).val() == '1') {
			$("#button_add_zwischenstop").slideUp("normal");
			$("#DivZwischenstop").slideUp("normal");
			deleteZwischenstop('',1);
			updateFlugzeuge();
		}
		if ($(this).val() == '0') {
			$("#button_add_zwischenstop").slideDown("normal");
			$("#DivZwischenstop").slideDown("normal");
			updateFlugdaten();	
		}
	});
	

	$("#VorgangStartflughafen").change(function () {
		hidetooltip();
		if ($("input[name^='start;']").size() > 0) {
			$("input[name^='start;']").remove();
		}
		$("#txtcontent2_wrapper").append("<input type=\"hidden\" name=\"start;"+$("#VorgangStartflughafen option:selected").val()+"\" value=\""+$("#VorgangStartflughafen option:selected").text()+"\">\n");
		updateFlugdaten();	
	});
	
	$("#VorgangZielflughafen").change(function () {
		hidetooltip();
		if ($("input[name^='ziel;']").size() > 0) {
			$("input[name^='ziel;']").remove();
		}
		$("#txtcontent2_wrapper").append("<input type=\"hidden\" name=\"ziel;"+$("#VorgangZielflughafen option:selected").val()+"\" value=\""+$("#VorgangZielflughafen option:selected").text()+"\">\n");
		updateFlugdaten();	
	});
	
	$("#button_zwischenstop").click(function () {
		hidetooltip();
		if ($("#VorgangZwischenstop option:selected").val() != '') {
			$("#txtcontent2_wrapper").append("<input type=\"hidden\" name=\"zwischenstop;"+$("input[name^='zwischenstop;']").size()+";"+$("#VorgangZwischenstop option:selected").val()+"\" value=\""+$("#VorgangZwischenstop option:selected").text()+"\">\n");
			$('#VorgangZwischenstop').find('option:first').attr('selected', 'selected').parent('select');
			updateFlugdaten();	
		}
	});
	
	$("#personen_update").click(function () {
		hidetooltip();
		updateFlugzeuge();
		calcCosts();	
	});
	
	$("#button_sonderwunsch").click(function () {
		hidetooltip();
		calcCosts();	
	});
	
	$("#VorgangFlugzeugtypId").change(function () {
		hidetooltip();
		updateFlugzeuge();
		calcCosts();	
	});
	
	$("#attendands_add").click(function() {
		hidetooltip();
		$("#VorgangFlugzeugtypId option:selected").text().search(/.*\(Reichweite (.*), Begleitung (.*), Passagiere (.*)\)/g);
		var maxpersonen = parseInt(RegExp.$3);
		var personen = parseInt($("#VorgangAnzahlPersonen").val());
		var attendands = parseInt($("#VorgangAnzahlFlugbegleiter").val());
		if (maxpersonen > (personen+attendands)) {
			$("#VorgangAnzahlFlugbegleiter").val(attendands+1);
		}
		if (maxpersonen == (personen+attendands)) {
			$("#help_maxpersonen").fadeIn("fast");
		}
		calcCosts();
	});
	
	$("#attendands_del").click(function() {
		hidetooltip();
		$("#VorgangFlugzeugtypId option:selected").text().search(/.*\(Reichweite (.*), Begleitung (.*), Passagiere (.*)\)/g);
		var minattendands = parseInt(RegExp.$2);
		var personen = parseInt($("#VorgangAnzahlPersonen").val());
		var attendands = parseInt($("#VorgangAnzahlFlugbegleiter").val());
		if (attendands > minattendands) {
			$("#VorgangAnzahlFlugbegleiter").val(attendands-1);
		}
		if (attendands == minattendands) {
			$("#help_minattendands").fadeIn("fast");
		}
		calcCosts();
	});
	
	$("*.showhelp").mouseenter(function(){   	
		$(".help").each(function(){
			$(this).hide();
		});
		var title = $(this).attr("title");
		$("#help_"+title).fadeIn("fast");
	}); 

	$("*.showhelp").mouseleave(function(){   
		var title = $(this).attr("title");
		$("#help_"+title).fadeOut("fast");
	}); 
	
	/* $("#loader").ajaxStop(function(){
		$(this).hide();
	});
	
	$("#loader").ajaxStart(function(){
		$(this).show();
	}); */
	
}); // DOCUMENT READY END

// FUNCTIONS
	
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
	var route = "";
	var i=0;
	var k=0;
	var startid = "";
	var zielid = "";
	var zwischenstop1 = "";
	var zwischenstop2 = "";
	
	$("#fluginfos").html('');
	
	if ($("input[name^='zwischenstop;']").size() > 0 || $("input[name^='start;']").size() > 0 || $("input[name^='ziel;']").size() > 0) {
		add += "<table class=\"flugdaten_table\">\n";
		add += "<tr><td class=\"title_top\" colspan=\"2\">Flugdaten<\/td><\/tr>\n";
	}

	if ($("input[name^='start;']").size() > 0) {

		$("input[name^='start;']").attr('name').search(/.*;(.*)/g);
		startid = RegExp.$1;
		
		if ( $("input[name^='ziel;']").size() > 0) {
		$("input[name^='ziel;']").attr('name').search(/.*;(.*)/g);
		zielid = RegExp.$1;
		}
		
		add += "<tr>\n";
		add += "<td class=\"img abflug\"><\/td><td class=\"airport\">"+$("input[name^='start;']").val()+"<\/td>\n";
		add += "<\/tr>\n";
		add += "<tr>\n";
		add += "<td colspan=\"2\" class=\"distance\">\n";
		if ($("input[name^='zwischenstop;']").size() > 0) {
			$("input[name^='zwischenstop;0;']").attr('name').search(/.*;.*;(.*)/g);
			zwischenstop1 = RegExp.$1;
			add += "Flugstrecke: <span title=\""+startid+";"+zwischenstop1+"\" id=\"distance_"+i+"\"><\/div>\n";
			i++;
		}
		if ( $("input[name^='ziel;']").size() > 0 && $("input[name^='zwischenstop;']").size() == 0) {
			add += "Flugstrecke: <span title=\""+startid+";"+zielid+"\" id=\"distance_"+i+"\"><\/span>\n";
		}
		add += "<\/td>\n";
		add += "<\/tr>\n";
	
		// Update Routeninfo für Übergabe an Cake
		route += startid;
		
	}
	
	if ($("input[name^='zwischenstop;']").size() > 0) {
		
		$("input[name^='zwischenstop;']").each(function(){  
			
			$("input[name^='zwischenstop;"+k+";']").attr('name').search(/.*;.*;(.*)/g);
			zwischenstop1 = parseInt(RegExp.$1);
			
			add += "<tr>\n";
			add += "<td class=\"img zwischenstop\"><\/td><td title=\"delzwischenstop_"+k+"\" class=\"airport\">"+$("input[name^='zwischenstop;"+k+";']").val()+"<\/td>\n";
			add += "<\/tr>\n";
			
			if ($("input[name^='zwischenstop;"+(k+1)+";']").size() != 0) {
			
				$("input[name^='zwischenstop;"+(k+1)+";']").attr('name').search(/.*;.*;(.*)/g);
				zwischenstop2 = parseInt(RegExp.$1);
				
				add += "<tr>\n";
				add += "<td colspan=\"2\" class=\"distance\">\n";
				add += "Flugstrecke: <span title=\""+zwischenstop1+";"+zwischenstop2+"\" id=\"distance_"+i+"\"><\/span>\n";
				add += "<\/td>\n";
				add += "<\/tr>\n";
			}
			
			if ($("input[name^='zwischenstop;"+(k+1)+";']").size() == 0 && $("input[name^='ziel;']").size() != 0) {
			
				add += "<tr>\n";
				add += "<td colspan=\"2\" class=\"distance\">\n";
				add += "Flugstrecke: <span title=\""+zwischenstop1+";"+zielid+"\" id=\"distance_"+i+"\"><\/span>\n";
				add += "<\/td>\n";
				add += "<\/tr>\n";
			
			}
			
			route += ";"+zwischenstop1;
			k++;
			i++;
			
		});
	}
	
	if ($("input[name^='ziel;']").size() > 0) {
		
		add += "<tr>\n";
		add += "<td class=\"img ankunft\"><\/td><td class=\"airport\">"+$("input[name^='ziel;']").val()+"<\/td>\n";
		add += "<\/tr>\n";
		
		route += ";"+zielid;
	}
	
	if (($("input[name^='ziel;']").size() == 0 && $("input[name^='zwischenstop;']").size() == 0) || ($("input[name^='start;']").size() == 0 && $("input[name^='zwischenstop;']").size() == 0) || ($("input[name^='start;']").size() == 0 && $("input[name^='ziel;']").size() == 0)) {
		add += "<\/table>\n";
		$("#fluginfos").append(add);
	} else {
		add += "<tr><td class=\"title\" colspan=\"2\">Gesamtstrecke<\/td><\/tr>\n";
		add += "<tr><td colspan=\"2\" id=\"distancesum\" class=\"distancesum\"><\/td><\/tr>\n";
		add += "<\/table>\n";
		$("#fluginfos").append(add);
	}
	
	calcDitances();
	
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
	
	$("#VorgangFlugstrecke").val(route);
	
}

function calcCosts() {
	
	var sonderwunsch = '';
	var html = "";
	
	$("#flugkosten").html('');
	
	if ($("#VorgangZeitcharter option:selected").val() == 1) {
		html += "<table class=\"flugkosten_table\">\n";
		html += "<tr><td class=\"title\" colspan=\"2\">Flugkosten<\/td><\/tr>\n";
		html += "<tr><td>Berechnen sich nach Triebwerkslaufzeit<\/td><\/tr>\n";
		html += "<\/table>\n";
		$("#flugkosten").html(html)
	}
	
	if ($("#VorgangFlugzeugtypId option:selected").val() != '' && $("#distancesum").text() != '' && $("#VorgangZeitcharter option:selected").val() == 0) {
		
		if ($("#VorgangSonderwunschNetto").val() == '') {
		sonderwunsch = '0';
		} else {
		sonderwunsch = $("#VorgangSonderwunschNetto").val();
		}
		
		//alert("../../vorgaenge/SimpleCalc/"+$("#VorgangFlugzeugtypId option:selected").val()+"/"+$("#distancesum").text()+"/"+sonderwunsch+"/"+$("#VorgangZeitcharter option:selected").val()+"/"+$("#VorgangAnzahlFlugbegleiter").val()+"/"+$("input[name^='zwischenstop;']").size()+".xml");
		$("#loader_costs").show();
		$.ajax({
			type: "GET",
			url: "../../vorgaenge/SimpleCalc/"+$("#VorgangFlugzeugtypId option:selected").val()+"/"+$("#distancesum").text()+"/"+sonderwunsch+"/"+$("#VorgangZeitcharter option:selected").val()+"/"+$("#VorgangAnzahlFlugbegleiter").val()+"/"+$("input[name^='zwischenstop;']").size()+".xml",
			dataType: "xml",
			cache: false,
			success:function(xml){
				$(xml).find('kalkulation').each(function(){  
					html += "<table class=\"flugkosten_table\">\n";
					html += "<tr><td class=\"title\" colspan=\"2\">Flugkosten<\/td><\/tr>\n";
					html += "<tr><td class=\"kostentyp\">Netto<\/td><td id=\"kosten_nettosum\" class=\"kosten\">"+$(this).find('netto').text()+"<\/td><\/tr>\n";
					html += "<tr><td class=\"kostentyp\">Mwst.<\/td><td id=\"kosten_mwst\" class=\"kosten\">"+$(this).find('mwst').text()+"<\/td><\/tr>\n";
					html += "<tr><td class=\"kostentyp\">Brutto<\/td><td id=\"kosten_bruttosum\" class=\"kosten\">"+$(this).find('brutto').text()+"<\/td><\/tr>\n";
					html += "<\/table>\n";
				});
				$("#flugkosten").html(html)
				$("#loader_costs").hide();
			}
		});	
	}
	
}
	
function calcDitances(spanid, ap1, ap2) {
	if (!spanid && (($("input[name^='zwischenstop;']").size() > 0 && $("input[name^='start;']").size() > 0) || ($("input[name^='ziel;']").size() > 0 && $("input[name^='start;']").size() > 0))) {
		reqcounter = 0;
		reqsum = $("span[id^='distance_']").size();
		$("#loader_dist").show();
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
			async: "false",
			url: "../../entfernungen/berechnen/"+ap1+"/"+ap2+".xml",
			dataType: "xml",
			cache: false,
			success:function(xml){
				reqcounter++;
				$(xml).find('entfernung').each(function(){  
					if($(this).find('distance').text() == '') {
						$("#distance_"+spanid+"").text(0);
					} else {						
						$("#distance_"+spanid+"").text($(this).find('distance').text());
						if ($("#VorgangZeitcharter option:selected").val() == 0) {
						$("#distancesum").text(parseInt($("#distancesum").text())+parseInt($(this).find('distance').text()));
						} else {
						$("#distancesum").text("Triebwerkslaufzeit");
						}
					}
					
				if (reqcounter == reqsum) {
				$("#loader_dist").hide();
				updateFlugzeuge();
				calcCosts();
				}
				});
			}
		});	
	}
}

function updateFlugzeuge() {
	$("#VorgangFlugzeugtypId option[value!=0]").each(function () {
		$(this).attr("disabled","");
	});
	
	if($("#VorgangAnzahlPersonen").val() != '' && $("#VorgangZeitcharter").val() != '1') {
		var personen = parseInt($("#VorgangAnzahlPersonen").val());
		$("#VorgangFlugzeugtypId option[value!='']").each(function () {
			$(this).text().search(/.*\(Reichweite (.*), Begleitung (.*), Passagiere (.*)\)/g);
			
			var reichweite = parseInt(RegExp.$1);
			var requiredAttendands = parseInt(RegExp.$2);
			var plaetze = parseInt(RegExp.$3);

			// Wenn ein bereits gewählter Flugzeugtype rausfällt
			if (personen > (plaetze-requiredAttendands) && ($(this).val() == $("#VorgangFlugzeugtypId option:selected").val())) {
				$(this).attr("disabled","disabled");
				$('#VorgangFlugzeugtypId').find('option:first').attr('selected', 'selected').parent('select');	
				$("#VorgangAnzahlFlugbegleiter").val('');
				$("#help_selectflugzeugtyp").fadeIn("fast");
			}
			if (personen > (plaetze-requiredAttendands) && ($(this).val() != $("#VorgangFlugzeugtypId option:selected").val())) {
				$(this).attr("disabled","disabled");
			}
		
		});
	
	}
	
	if ($("#VorgangFlugzeugtypId").val() != 0) {
		$("#VorgangFlugzeugtypId option:selected").text().search(/.*\(Reichweite (.*), Begleitung (.*), Passagiere (.*)\)/g);
		requiredAttendands = parseInt(RegExp.$2);
		$("#VorgangAnzahlFlugbegleiter").val(requiredAttendands);
	
	}
	
	if ($("span[id^='distance_']").size() != 0) {
		var distance = 0;
		var maxdistance = 0;
		$("span[id^='distance_']").each(function() {
			distance = parseInt($(this).text());
			$("#VorgangFlugzeugtypId option[value!=0]").each(function () {
				$(this).text().search(/.*\(Reichweite (.*), Begleitung (.*), Passagiere (.*)\)/g);
				maxdistance = parseInt(RegExp.$1);
				if (distance > maxdistance) {
					if (distance > maxdistance && ($(this).val() == $("#VorgangFlugzeugtypId option:selected").val())) {
						$(this).attr("disabled","disabled");
						$('#VorgangFlugzeugtypId').find('option:first').attr('selected', 'selected').parent('select');	
						$("#VorgangAnzahlFlugbegleiter").val('');
						$("#help_selectflugzeugtyp").fadeIn("fast");
					}
					if (distance > maxdistance && ($(this).val() != $("#VorgangFlugzeugtypId option:selected").val())) {
						$(this).attr("disabled","disabled");
					}
				}
			});
		});
	}

}


function hidetooltip() {
	$(".help").each(function(){
		$(this).hide();
	});
}

$(function() {
	$("#VorgangVonDatum").datepicker({ dateFormat: 'dd.mm.yy', dayNamesMin: ['So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa'], dayNames: ['Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag'], monthNames: ['Januar','Februar','M�rz','April','Mai','Juni','Juli','August','September','Oktober','November','Dezember']});
});


$(function() {
	$("#VorgangBisDatum").datepicker({ dateFormat: 'dd.mm.yy', dayNamesMin: ['So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa'], dayNames: ['Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag'], monthNames: ['Januar','Februar','M�rz','April','Mai','Juni','Juli','August','September','Oktober','November','Dezember']});
});
