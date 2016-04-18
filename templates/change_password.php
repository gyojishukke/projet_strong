 <?php
// ****************************************
// test du token
// ****************************************
if(isset($_SESSION['erreur']['login']))
{
    $_SESSION['erreur']['login'] =array();
}

//On retrouve l'id utilisateur envoyé par mail avec  le token
if(isset($_GET['id']) && isset($_GET['token']))
    $id    = $_GET['id'];
    $token = $_GET['token'];

    $resultat = get_token($id, $token);
    if(!$resultat['id'])
    {
        $_SESSION['erreur']['login'] = "ce lien a expiré , veuillez reessayer de saisir un mot de passe !";
        header('Location: /index.php/login');
    }
    else
    {
         ob_start();
         $titre = "changement de mot de passe";
     ?>
        <div class="l-content">
            <div class="containerBouton pricing-tables pure-g">
                <div class="containerBloc pure-u-1 pure-u-md-1-3">
                    <div class="pricing-table pricing-table-free">
                        <form method="POST" class="pure-form pure-form-aligned"  action="/index.php/change_password_traitement">
                        <div>
                            <legend>Changer votre mot de passe.</legend>
                            

                            <!-- <div class="pure-control-group">
                                <input type="email" name="email" placeholder="Email">
                            </div> -->
                            <div class="pure-control-group">
                                <input type="password" name="password" placeholder="Mot de passe">
                            </div>
                               <div class="pure-control-group">
                                <input type="password" name="passwordConfirm" placeholder="Confirmer votre mot de passe">
                            </div>
                           
                            <input type="hidden" name="id" value="<?= $id ?>">
                           
                            <div class="pure-control-group">
                                <button type="submit" name ="valider" class="pure-button pure-button-primary buttonGo">Valider</button>
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
                    </div>
                </div>



<?php $content = ob_get_clean() ?>
<?php include "layoutBase.php" ?>
<?php } ?>

