<?php $this->titre = "Accueil Smartcity"; ?>
	 
<?php 
    foreach ($capteurs as $capteur){
        $nbr_capteurs = $capteur['nbr_capteur'];
        $conso_tot = $capteur['conso_tot'];
    }
    foreach ($fuites as $fuite){
        $nbr_fuites = $fuite['nbr_fuites'];
    }
?>
<div id="home">
    <div id="dashboard">
        <div class="actifs box">
            <h2>Capteurs actifs</h2>
            <p class="number"><?= $nbr_capteurs ?></p>   
        </div>
        <a href="index.php?action=conso" class="conso box">
            <h2>Conso totale de la journée</h2>
            <div class="metrecube">
                <p class="number_m3"><?= $conso_tot ?></p>   
                <p class="m3">m3</p>
            </div>
        </a>
        <a class="fuites box">
            <h2>Fuites</h2>
            <p class="number"><?= $nbr_fuites ?></p>   
        </a>
    </div>
</div>
