<?php $this->titre = "Fuite"; ?>

<?php foreach ($fuites as $fuite):?>
    <div id="row">
        <div>
			ID: <?= $fuite['id_fuite'];?>
		</div>
		<div>
			Description: <?= $fuite['description'];?>
		</div>
		<div>
			Date: <?= $fuite['date_signalement'];?>
		</div>
		<div>
			Emplacement: <?= $fuite['emplacement'];?>
		</div>
		<div>
			<form action="index.php?action=edit_fuite&id=<?= $fuite['id_fuite']?>" method='post'>
				Résolu <input name='statut' id='statut' type='checkbox' <?php if($fuite['statut']) echo('checked');?>>
				<input name='submit' id='submit' type='submit'>
			</form>
		</div>
    </div>
    <hr />
<?php endforeach; ?>