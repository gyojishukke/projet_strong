<?php



?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sport Training Report On Next Goal ">

    <title>strong</title>

    <!-- TODO : ajouter le favicon -->
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="../css/coffrage.css">
    <!-- <link rel="stylesheet" href="css/main.css"> -->
    

</head>



<body>

    <header id="containerBandeauTitre">
    <!-- TODO : ajouter le lien dynamique du titre : <?=$titre ?> -->
        <h1>&lt; strong &gt;</h1>
    </header>

    <main class="wrapper">
        <section class="content">
            

            <?php include 'carnet.php' ?>

        </section>

        <nav id="navigation">
            <a href="#" title="apropos">A propos</a>
            <a href="#" title="contact">Contact</a>
            <a href="#" title="CGU">CGU</a>
            <a href="#" title="FAQ">FAQ</a>
        </nav>
        <aside>
            <a href="#">Accès admin</a>
            <a href="#">Réglages</a>
        </aside>

    </main>

    <footer>
        Vers l'infini et au delà !
    </footer>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-2.2.2.min.js"><\/script>')</script>

    <!-- <script src="js/vendor/bootstrap.min.js"></script> -->

    <script src="js/main.js"></script>  


</body>
</html>
