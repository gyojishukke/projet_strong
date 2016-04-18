<?php ob_start() ;

$titre = "Inscription";
// on affiche "Accès admin" si le compte a un role admin
require_once 'templates/admin.php';

?>


<!-- <div class="l-content">
    <div class="containerBouton pricing-tables pure-g">
        <div class="containerBloc pure-u-1 pure-u-md-1-3">
            <div class="pricing-table pricing-table-free"> -->



            <form id="inscription" method="POST" class="pure-form pure-form-aligned"  action="/index.php/inscription_traitement">

                <div>

                    <legend>Inscription</legend> 



                    <p>
<!--                         <label for="password">password</label> -->
                        <input type="text" name="nom" placeholder="Nom">
                    </p>

                    <p>
<!--                         <label for="password">password</label> -->
                        <input type="text" name="prenom" placeholder="Prenom">
                    </p>

                    <p>
<!--                     <p><label for="login">Login</label></p> -->
                        <input type="email" name="email" placeholder="email">
                    </p>
            
                </div>


                <div>

                    <p>
<!--                         <label for="password">password</label> -->
                        <input type="password" name="password" placeholder="password">
                    </p>

                    <p>
<!--                         <label for="password">password</label> -->
                        <input type="password" name="passwordConfirm" placeholder="Confirmer le password">
                    </p>
                        

                    <p>
                        <button type="submit" name ="valider" class="pure-button pure-button-primary buttonGo">Inscription</button>
                    </p>
                </div>


                 <?php
                // Apparition du message d'erreur en cas de pseudo déja utulisé
                   if(isset($_SESSION['erreur']['login']) && !empty($_SESSION['erreur']['login']))
                    {
                        echo "<h4>". $_SESSION['erreur']['login']. "</h4>";
                        echo "<br>";
                        
                    }
                ?>  

            </form>
<?php $content = ob_get_clean() ?>
<?php include "layoutBase.php" ?>