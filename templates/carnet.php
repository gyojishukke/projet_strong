<?php ob_start();
$titre = "carnet";


?>






<form method="POST" class="pure-form pure-form-aligned inputCarnet" action="/index.php/carnet">
  <fieldset>


    <!-- Type d'activite -->
    <div class="pure-control-group">
      <select classe"pure-form" id="activite" name="activite">
        <option disabled selected>Type d'activité</option>
        <?php  foreach ($activite as $value) {

         ?>

         <option value="<?= $value['id'] ?>"><?= $value['activite']  ?></option>
         <?php } ?>
       </select>

     </div>

     <!-- Type d'exercice -->
     <div class="pure-control-group">
      <select classe"pure-form" id="exercice" name="exercice">
        <option disabled selected>Type d'exercice</option>
        <?php  foreach ($exercice as $vale) {

         ?>

         <option value="<?= $vale['id'] ?>" class="<?= $vale['id_activite']?>"><?= $vale['exercice']  ?></option>
         <?php } ?>
       </select>

     </div>

     <!-- Type d'epreuve -->
     <div class="pure-control-group">

      <select name="epreuve" classe"pure-form" >
        <option disabled selected>Type d'Epreuve</option>
        <?php  foreach ($epreuve as $val) {

         ?>

         <option value="<?= $val['id'] ?>"><?= $val['epreuve']  ?></option>
         <?php } ?>
       </select>

     </div>


     <div class="pure-control-group">
      <textarea name="sensation" placeholder="Sensation, ressenti"></textarea>
    </div>

    <div class="pure-control-group">
      <input name="lieux" type="text" placeholder="Lieux" >
    </div>

    <div class="pure-control-group">
      <input name="condition" type="text" placeholder="Météo" >
    </div>

    <div class="pure-control-group">
      <input name="distance" type="text" placeholder="distance parcouru / poids : 10, 20, 40, etc.." >
    </div>

    <!-- UNITE : kilometre, kilo, miles -->
    <div class="pure-control-group">
      <select classe"pure-form" name="unite" >
        <option disabled selected>Selectionner l'unité</option>
        <?php  foreach ($unit as $va) {

         ?>

         <option value="<?= $va['id'] ?>"><?= $va['unite']  ?></option>
         <?php } ?>
       </select>

     </div>


     <div class="pure-control-group">
      <textarea placeholder="Commentaire..." name="commentaire"></textarea>
    </div>

    <div class="pure-control-group">
      <!-- A FAIRE AFIN D'ENREGISTRER L'ID DE L'UTILISATEUR QUI REMPLI LE FORMULAIRE -->
      <!-- <input type="hidden" value="1" name="utilisateur" > -->
    </div>







    <!-- <label for="remember"> -->
    <!-- <input id="remember" type="checkbox">Se souvenir de moi. -->
    <!-- </label> -->
    <div class="pure-control-group">
      <button class="pure-button pure-button-primary buttonGo">Aide</button>
    </div>
    <input type="submit" name="submit" value="Envoi"> 
    <!-- <button type="submit" name="submit" class="button-choose pure-button button-carnet" >Envoi</button> -->
  </fieldset>
  <a name="lien" href="/index.php/carnet_affiche">Voir Tous mes carnets</a>
</form>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-2.2.2.min.js"><\/script>')</script>





<?php $content = ob_get_clean() ?>
<?php include "layoutBase.php" ?>