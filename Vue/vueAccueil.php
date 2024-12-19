<?php $this->titre = "Accueil Smartcity"; ?>
	 
<?php 
    foreach ($capteurs as $capteur){
        $nbr_capteurs = $capteur['nbr_capteur'];
    }
    $nbr_fuites = $fuites['nbr_fuites'];
    $conso_tot = $consoTot['tot'];
?>
<div id="home">
    <div id="dashboard">
        <a href="index.php?action=capteurs" class="actifs box">
            <h2>Capteurs actifs</h2>
            <p class="number"><?= $nbr_capteurs ?></p>   
        </a>
        <a href="index.php?action=conso" class="conso box">
            <h2>Conso totale de la journée</h2>
            <div class="metrecube">
                <p class="number_m3"><?= ($conso_tot>0)?$conso_tot:0; ?></p>   
                <p class="m3">m3</p>
            </div>
        </a>
        <a href="index.php?action=fuites" class="fuites box">
            <h2>Fuites</h2>
            <p class="number"><?= $nbr_fuites ?></p>   
        </a>
    </div>
</div>