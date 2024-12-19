<?php $this->titre = "Changer Capteur"; ?>
<form class="modifCapteur" method="POST" action="index.php?action=conf">
    <?php 
        $id = intval($currentCapteur['id_capteur']);
        $emplacement = $currentCapteur['emplacement'];
        $type = $currentCapteur['type_capteur'];
        $valeur = $currentCapteur['valeur'];
    ?>
    <h2><?=$id?></h2>
    <input type="hidden" name="id" value="<?= $id ?>">
    <input type="text" placeholder="emplacement" name="emplacement" value="<?=$emplacement?>">
    <?php if ($type=='consommation'): ?>
    <input type="text" placeholder="valeur" name="valeur" value="<?=$valeur?>">
    <?php else: ?>
    <input type="hidden" name="valeur" value="<?=$valeur?>">
    <?php endif; ?>
    <p>Type : <?=$type?></p>
    <div class="buttons">
        <button type="submit">Confirmer</button>
        <a id="del" href="<?= "index.php?action=del&id=$id"?>">🗑️</a>
    </div>

</form>