<?php $this->titre = "Accueil Smartcity"; ?>
<div class="capteurs">
<?php 
    foreach ($capteurs as $capteur):
        $id_capteur = $capteur['id_capteur'];
        $type_capteur = $capteur['type_capteur'];
        $emplacement = $capteur['emplacement'];
        $valeur = $capteur['valeur'];

?>
    <div class="capteur">
        <p><?= $id_capteur ?> : <?= $type_capteur ?>, <?= $emplacement ?> : <?= $valeur ?></p>
    </div>
<?php endforeach; ?>
</div>
