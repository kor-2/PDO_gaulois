<?php

namespace Controller;
use Model\Connect;

class FormController{

    public function ajoutLieu($lieu){
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        INSERT INTO lieu (nom_lieu) VALUES ('$lieu')
        ");
        require "view/form/ajoutLieu.php";
    }
}