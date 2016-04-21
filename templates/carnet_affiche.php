<?php
ob_start();
$titre = "Mes carnets";
?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
	<meta charset="UTF-8">
	<title>Liste de Votre carnet</title>
</head>
<body>
<?php if ($carnet) {

 ?>
	<?php foreach ($carnet as $value) {
	  ?>
	<figure>
		<?php foreach ($activite as $valeur) {
			if ($valeur['id'] === $value['type_activite_id']) { ?>
				<p>L'activité : <?=  $valeur['activite'] ?></p>
			<?php
				
			}
		} ?>

		<?php foreach ($exercice as $valeur) {
			if ($valeur['id'] === $value['type_exercice_id']) { ?>
				<p>L'exercice : <?=  $valeur['exercice'] ?></p>
			<?php
				
			}
		} ?>

		<?php foreach ($epreuve as $valeur) {
			if ($valeur['id'] === $value['type_epreuve_id']) { ?>
				<p>Type d'epreuve : <?=  $valeur['epreuve'] ?></p>
			<?php
				
			}
		} ?>

		<?php foreach ($unit as $valeur) {
			if ($valeur['id'] === $value['unite_id']) { ?>
				<p>Distance : <?= $value['valeur'] ?> <?=  $valeur['unite'] ?></p>
			<?php
				
			}
		} ?>

		<p> Les sensations ressenties : <?= $value['sensations'] ?></p>
		<figcaption>
			Mon commentaire : <?= $value['commentaires'] ?>
		</figcaption>
		<a href="/index.php/carnet_modif?id=<?= $value['id'] ?>">Modifier</a>
	</figure>
<?php } ?>
<?php } else{
	echo "Vous n'avez pas de note dans votre carnet";
	} ?>



</body>
</html>



<?php $content = ob_get_clean() ?>
<?php include "layoutBase.php" ?>