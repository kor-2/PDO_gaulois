<?php

namespace Controller;
use Model\Connect;

class FormController{
    public function showFormLieu(){
        return require "view/form/ajoutLieu.php";
    }

    public function addLieu(){

        $lieu = filter_input(INPUT_POST, 'lieu', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if ($lieu) {
            $newLieu = $_POST['lieu'];
            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare("INSERT INTO lieu (nom_lieu) VALUES (:lieu) ");
            $requete->execute([':lieu'=> $newLieu]);
        }
        
    }
    public function showFormSpe(){
        return require "view/form/ajoutSpe.php";
    }

    public function addSpe($spe){
        
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        INSERT INTO specialite (nom_specialite) VALUES ('$spe')
        ");
    }
}