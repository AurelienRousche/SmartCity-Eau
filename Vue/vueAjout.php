<?php $this->titre = "Ajout Capteur"; ?>
<form class="modifCapteur" method="POST" action="index.php?action=conf_ajout">
    <input type="text" placeholder="emplacement" name="emplacement" value="">
    <select placeholder="type" name="type" value="">
		<option value="consommation">consommation</option>
		<option value="fuite">fuite</option>
	</select>
    <div class="buttons">
        <button type="submit">Confirmer</button>
    </div>
</form>