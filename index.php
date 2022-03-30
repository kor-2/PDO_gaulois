<?php
use Controller\GauloisController;
use Controller\FormController;


spl_autoload_register(function ($class_name){
    include $class_name.'.php';
});

$ctrlGaulois = new GauloisController();
$ctrlform = new FormController();

if (isset($_GET["action"])) {
    switch ($_GET["action"]) {
        case '1': $ctrlGaulois->requete1();break;
        case '2': $ctrlGaulois->requete2();break;
        case '3': $ctrlGaulois->requete3();break;
        case '4': $ctrlGaulois->requete4();break;
        case '5': $ctrlGaulois->requete5();break;
        case '6': $ctrlGaulois->requete6();break;
        case '7': $ctrlGaulois->requete7();break;
        case '8': $ctrlGaulois->requete8();break;
        case '9': $ctrlGaulois->requete9();break;
        case '10': $ctrlGaulois->requete10();break;
        case '11': $ctrlGaulois->requete11();break;
        case '12': $ctrlGaulois->requete12();break;
        case '13': $ctrlGaulois->requete13();break;
        case '14': $ctrlGaulois->requete14();break;
        case '15': $ctrlGaulois->requete15();break;
        
    }
}else {
    
    $ctrlform->ajoutLieu($_POST['addLieu']);
    $ctrlGaulois->listGaulois();
}

