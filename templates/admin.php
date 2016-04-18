<?php

// on affiche "Accès admin" si le compte a un role admin
$admin = false ;
$connecte = false;
// echo "<pre>";
//     	print_r($_SESSION);
//     	echo "<pre>";

    if(isset($_SESSION['user']['roles']))
    {
        if(in_array('admin',$_SESSION['user']['roles']))
        {
            $admin = true ;
        }

    }
    // status connecte/non connecte
    if(isset($_SESSION['user']['connecte']))
    {
        if(in_array('connecte',$_SESSION['user']))
        {
            $connecte = true ;
        }
        
    }

