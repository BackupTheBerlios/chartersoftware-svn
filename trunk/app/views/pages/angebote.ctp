<div id="txtcontent" class="normal">
 <form method="post" action="" class="yform columnar">
            <fieldset>
			<div class="type-text">
                <label for="firstname">Vorgangsnummer</label>
                <input type="text" name="firstname" id="firstname" size="20" class="readonly" readonly value="[--VORGANGSNUMMER--]"/>
              </div>
			</fieldset>
			
			<fieldset>
              <legend>Kundendaten</legend>
              <div class="type-select">
                <label for="salutation">Kunde <sup title="This field is mandatory.">*</sup> </label>
                <select name="customer" id="customer" size="1">
                  <option value="0" selected="selected" disabled="disabled">Bitte wählen</option>
                  <option value="1">Kunden1</option>
				  <option value="2">Kunden2</option>
				  <option value="3">Kunden3</option>
                </select>
              </div>
            <div class="type-text">
                <label for="firstname">Firma</label>
                <input type="text" name="firma" id="firma" size="20" class="readonly" readonly />
			</div>
			 <div class="type-text">
				<label for="firstname">Anrede</label>
                <input type="text" name="anrede" id="anrede" size="20" class="readonly" readonly />
			</div>
			<div class="type-text">
				<label for="firstname">Name</label>
                <input type="text" name="name" id="name" size="20" class="readonly" readonly />
			</div>
			<div class="type-text">
				<label for="firstname">Vorname</label>
                <input type="text" name="vorname" id="vorname" size="20" class="readonly" readonly />
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
</div><!--txtcontent-->
