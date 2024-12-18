<?php $this->titre = "Accueil Smartcity"; ?>
	 
<?php 
    foreach ($sensors as $sensor){
        $nbr_capteurs = $sensor['nbr_capteur'];
        $conso_tot = $sensor['conso_tot'];
    }
?>
<div id="home">
    <h2>Hello World !</h2>
    <p><?= $nbr_capteurs ?></p>
    <p><?= $conso_tot ?></p>
</div>
