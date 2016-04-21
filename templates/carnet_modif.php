<?php ob_start();
$titre = "carnet_modif";


?>

<!-- Modifier carnet  -->

<form method="POST" class="pure-form pure-form-aligned inputCarnet" action="/index.php/carnet_modif">
  <fieldset>

    <?php  foreach ($note as $valeur) {

     ?>

     <!-- Type d'activite -->
     <div class="pure-control-group">
      <select classe"pure-form" id="activite" name="activite">

        <?php foreach ($activite as $valu) {
          if ($valu['id'] === $valeur['type_activite_id']) { ?>
          <option disabled selected value="<?= $valeur['type_activite_id']  ?>" ><?= $valu['activite']  ?></option>
          <?php
        } else { ?>
        <!-- <option disabled selected>type d'activité</option> -->
        <?php

      }

    } ?>
    <!-- ******* -->
    <?php  foreach ($activite as $value) {

     ?>

     <option value="<?= $value['id'] ?>"><?= $value['activite']  ?></option>
     <?php } ?>
   </select>

 </div>

 <!-- Type d'exercice -->

 <div class="pure-control-group">
  <select classe"pure-form" id="exercice" name="exercice">

    <?php foreach ($exercice as $vali) {
      if ($vali['id'] === $valeur['type_exercice_id']) { ?>
      <option disabled selected value="<?= $valeur['type_exercice_id']  ?>" ><?= $vali['exercice']  ?></option>
      <?php
    } else { ?>
    <!-- <option disabled selected>type d'activité</option> -->
    <?php

  }

} ?>
<?php  foreach ($exercice as $vale) {

 ?>

 <option value="<?= $vale['id'] ?>" class="<?= $vale['id_activite']?>"><?= $vale['exercice']  ?></option>
 <?php } ?>
</select>

</div>

<!-- Type d'epreuve -->

<div class="pure-control-group">

  <select name="epreuve" id="epreuve" classe"pure-form" >

   <?php foreach ($epreuve as $valie) {
    if ($valie['id'] === $valeur['type_epreuve_id']) { ?>
    <option disabled selected value="<?= $valeur['type_epreuve_id']  ?>" ><?= $valie['epreuve']  ?></option>
    <?php
  } else { ?>
  <!-- <option disabled selected>type d'activité</option> -->
  <?php

}

} ?>

<?php  foreach ($epreuve as $val) {

 ?>

 <option value="<?= $val['id'] ?>"><?= $val['epreuve']  ?></option>
 <?php } ?>
</select>

</div>

<!-- Sensations -->

<div class="pure-control-group">
  <textarea name="sensation" placeholder="Sensation, ressenti" ><?= $valeur['sensations']?></textarea>
</div>

<!-- Lieux -->
<div class="pure-control-group">
  <input type="text" placeholder="Lieux" name="lieux" value="<?= $valeur['lieu']?>">
</div>

<!-- Condition -->
<div class="pure-control-group">
  <input type="text" name="condition" placeholder="Météo" value="<?= $valeur['conditions']?>">
</div>

<!-- Distance parcouru -->
<div class="pure-control-group">
  <input type="text" name="distance" placeholder="distance parcouru / poids : 10, 20, 40, etc.." value="<?= $valeur['valeur']?>">
</div>

<!-- UNITE : kilometre, kilo, miles -->
<div class="pure-control-group">
  <select classe"pure-form" id="unite" name="unite" >
    <?php foreach ($unit as $vali) {
      if ($vali['id'] === $valeur['unite_id']) { ?>
      <option disabled selected value="<?= $valeur['unite_id']  ?>" ><?= $vali['unite']  ?></option>
      <?php
    } else { ?>
    <!-- <option disabled selected>type d'activité</option> -->
    <?php

  }

} ?>
<?php  foreach ($unit as $va) {

 ?>

 <option value="<?= $va['id'] ?>"><?= $va['unite']  ?></option>
 <?php } ?>
</select>

</div>

<!-- commentaire -->
<div class="pure-control-group">
  <textarea name="commentaire"><?= $valeur['commentaires']?></textarea>
</div>

<div class="pure-control-group">
  <!-- A FAIRE AFIN D'ENREGISTRER L'ID DE L'UTILISATEUR QUI REMPLI LE FORMULAIRE -->
  <!-- <input type="hidden" value="1" name="utilisateur" > -->
</div>


<?php } ?>




<!-- <label for="remember"> -->
<!-- <input id="remember" type="checkbox">Se souvenir de moi. -->
<!-- </label> -->
<div class="pure-control-group">

</div>
<input type="submit" name="submit" value="Modifier"> 
<!-- <button type="submit" name="submit" class="button-choose pure-button button-carnet" >Envoi</button> -->
</fieldset>
</form>

<?php $content = ob_get_clean() ?>
<?php include "layoutBase.php" ?>