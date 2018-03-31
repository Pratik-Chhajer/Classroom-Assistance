<?php
    require_once('dbConnect.php');

    $pageUrl = basename($_SERVER['PHP_SELF']);
    $pageName = explode(".",$pageUrl)[0];

    if ($pageName != 'login' && $pageName != 'signup') {

        if (isset($_SESSION['user']) == false) {
            header("LOCATION: ../login/login.php");  
        }   
    }
    
    
    // if (!isset($_SESSION['user']) && ($pageName!= 'login' ||  $pageName!= 'signin') ) {
        // header("LOCATION: login.php");  
    // }
?>




