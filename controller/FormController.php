<?php

namespace Controller;

use Model\Connect;

class FormController
{
    public function showFormLieu()
    {
        return require 'view/form/ajoutLieu.php';
    }

    public function addLieu()
    {
        $lieu = filter_input(INPUT_POST, 'lieu', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if ($lieu) {
            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare('INSERT INTO lieu (nom_lieu) VALUES (:lieu)');
            $requete->execute(['lieu' => $lieu]);
        }
    }

    public function showFormSpe()
    {
        return require 'view/form/ajoutSpe.php';
    }

    public function addSpe()
    {
        $spe = filter_input(INPUT_POST, 'spe', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if ($spe) {
            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare('INSERT INTO specialite (nom_specialite) VALUES (:spe)');
            $requete->execute(['spe' => $spe]);
        }
    }

    public function showFormPerso()
    {
        $pdo = Connect::seConnecter();
        $lieux = $pdo->prepare('SELECT * FROM lieu');
        $lieux->execute();
        $spec = $pdo->prepare('SELECT * FROM specialite');
        $spec->execute();
        require 'view/form/ajoutPerso.php';
    }

    public function addPerso()
    {
        $perso = filter_input(INPUT_POST, 'perso', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $adress = filter_input(INPUT_POST, 'adress', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $img = filter_input(INPUT_POST, 'imgPerso', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $lieu = filter_input(INPUT_POST, 'lieu', FILTER_VALIDATE_INT);
        $spe = filter_input(INPUT_POST, 'spe', FILTER_VALIDATE_INT);

        if ($perso && $adress && $img && $lieu && $spe) {
            $pdo = Connect::seConnecter();
            $addPerso = $pdo->prepare('
                INSERT INTO personnage (nom_personnage, adresse_personnage, image_personnage,id_lieu, id_specialite ) 
                VALUES (:nom, :adress, :image, :lieu, :spe )');
            $addPerso->execute([
                'nom' => $perso,
                'adress' => $adress,
                'image' => $img,
                'lieu' => $lieu,
                'spe' => $spe, ]);
        }
    }

    public function showFormPotion()
    {
        $nbIngre = filter_input(INPUT_GET, 'nbIngre', FILTER_VALIDATE_INT);
        if ($nbIngre) {
            $nbIngre = $_GET['nbIngre'];
        } else {
            $nbIngre = 1;
        }

        $pdo = Connect::seConnecter();
        $ingred = $pdo->prepare('SELECT id_ingredient , nom_ingredient FROM ingredient');
        $ingred->execute();
        $spec = $pdo->prepare('SELECT * FROM specialite');
        $spec->execute();
        require 'view/form/ajoutPotion.php';
    }
}
