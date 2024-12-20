<?php $this->titre = "Capteurs"; ?>
    <h2 id="capteurTitle">Capteurs :</h2>
<div class="capteurs">
	<a href="index.php?action=ajout" id="addButton">
			+
	</a>
<?php 
    foreach ($capteurs as $capteur):
        $id_capteur = $capteur['id_capteur'];
        $type_capteur = $capteur['type_capteur'];
        $emplacement = $capteur['emplacement'];
        $valeur = $capteur['valeur'];

?>
    <div class="capteur">
        <a href="index.php?action=change&id=<?= $id_capteur?>"><?= $id_capteur ?> : <?= $type_capteur ?>, <?= $emplacement ?> : <?= $valeur ?>m³</a>
    </div>
<?php endforeach; ?>
</div>
