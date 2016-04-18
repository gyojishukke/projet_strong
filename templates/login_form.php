<?php ob_start() ;

$titre = "connexion";
// on affiche "Accès admin" si le compte a un role admin
require_once 'templates/admin.php';

?>


<div class="l-content">
    <div class="containerBouton pricing-tables pure-g">
        <div class="containerBloc pure-u-1 pure-u-md-1-3">
            <div class="pricing-table pricing-table-free">
                <form method="POST" class="pure-form pure-form-aligned"  action="/index.php/login_traitement">
                <div>
                    <legend>Accès membres.</legend>
                    <div class="pure-control-group">
                        <input type="email" name="email" placeholder="Email">
                    </div>

                    <div class="pure-control-group">
                        <input type="password" name="password" placeholder="Mot de passe">
                    </div>
                    
                    <div class="pure-control-group">
                        <input type="text" placeholder="" disabled>
                    </div>
                    <div class="pure-control-group">
                        <input type="text" placeholder="" disabled>
                    </div>
                    <div class="pure-control-group">
                        <input type="text" placeholder="" disabled>
                    </div>

                    <!-- <label for="remember"> -->
                    <!-- <input id="remember" type="checkbox">Se souvenir de moi. -->
                    <!-- </label> -->
                    <div class="pure-control-group">
                        <button type="submit" name ="valider" class="pure-button pure-button-primary buttonGo">Connexion</button>
                    
                    <a  href="/index.php/oublie_password"><button type="button" name ="oubliLogin" class="pure-button pure-button-primary buttonGo">Mot de passe oublié</button></a>
                    </div>
                    
                </div>

                 <?php
                 // var_dump($_SESSION['erreur']['login']);
              
                // Apparition du message d'erreur en cas de pseudo déja utulisé
                    if(isset($_SESSION['erreur']['login']) && !empty($_SESSION['erreur']['login']))
                    {
                        echo "<h4>". $_SESSION['erreur']['login']. "</h4>";
                        echo "<br>";
                        
                    }
                ?>  
                </form>
            </div>
        </div>

<?php $content = ob_get_clean() ?>
<?php include "layoutBase.php" ?>



