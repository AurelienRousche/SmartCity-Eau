<?php $this->titre = "Fuites"; ?>

<?php foreach ($fuites as $fuite):
    ?>
<<<<<<< Updated upstream
	<a href="index.php?action=fuite">
=======
	<a href="<?= "index.php?action=fuite&id=" . $fuite['id_fuite'] ?>">
>>>>>>> Stashed changes
    <div id="row">
        <div>
			ID:<?= $fuite['id_fuite'];?>
		</div>
		<div>
			Description:<?= $fuite['description'];?>
		</div>
		<div>
			Date:<?= $fuite['date_signalement'];?>
		</div>
		<div>
			Emplacement:<?= $fuite['emplacement'];?>
		</div>
		<div>
			Statut:<?= $fuite['statut'];?>
		</div>
    </div>
	</a>
    <hr />
<<<<<<< Updated upstream
<?php endforeach; ?>
=======
<?php endforeach; ?>
>>>>>>> Stashed changes
