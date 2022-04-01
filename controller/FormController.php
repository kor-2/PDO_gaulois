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

    public function showFormIngre()
    {
        require 'view/form/ajoutIngre.php';
    }

    public function addIngre()
    {
        $ingre = filter_input(INPUT_POST, 'ingre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $cout = filter_input(INPUT_POST, 'cout', FILTER_VALIDATE_FLOAT);
        if ($ingre && $cout) {
            $pdo = Connect::seConnecter();
            $addIngre = $pdo->prepare('
                INSERT INTO ingredient (nom_ingredient, cout_ingredient ) 
                VALUES (:nom, :cout)
            ');
            $addIngre->execute(['nom' => $ingre, 'cout' => $cout]);
        }
    }

    public function showFormBataille()
    {
        $pdo = Connect::seConnecter();
        $lieux = $pdo->prepare('SELECT id_lieu , nom_lieu FROM lieu');
        $lieux->execute();
        require 'view/form/ajoutBataille.php';
    }

    public function addBataille()
    {
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lieu = filter_input(INPUT_POST, 'lieu', FILTER_VALIDATE_INT);

        if ($nom && $date && $lieu) {
            $pdo = Connect::seConnecter();
            $batai = $pdo->prepare('
            INSERT INTO bataille (nom_bataille, date_bataille, id_lieu ) 
            VALUES (:nom, :date, :lieu )
            ');
            $batai->execute(['nom' => $nom, 'date' => $date, 'lieu' => $lieu]);
        }
    }

    public function showFormTypeCasque()
    {
        return require 'view/form/ajoutTypeCasque.php';
    }

    public function addTypeCasque()
    {
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if ($nom) {
            $pdo = Connect::seConnecter();
            $batai = $pdo->prepare('
            INSERT INTO type_casque (nom_type_casque) 
            VALUES (:nom)
            ');
            $batai->execute(['nom' => $nom]);
        }
    }

    public function showFormCasque()
    {
        $pdo = Connect::seConnecter();
        $types = $pdo->prepare('SELECT id_type_casque , nom_type_casque FROM type_casque');
        $types->execute();
        require 'view/form/ajoutCasque.php';
    }

    public function addCasque()
    {
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $cout = filter_input(INPUT_POST, 'cout', FILTER_VALIDATE_FLOAT);
        $lieu = filter_input(INPUT_POST, 'lieu', FILTER_VALIDATE_INT);

        if ($nom && $cout && $lieu) {
            $pdo = Connect::seConnecter();
            $batai = $pdo->prepare('
            INSERT INTO casque (nom_casque, cout_casque, id_type_casque) 
            VALUES (:nom, :cout, :lieu)
            ');
            $batai->execute(['nom' => $nom, 'cout' => $cout, 'lieu' => $lieu]);
        }
    }
    public function showFormPotion()
    {
        require 'view/form/ajoutPotion.php';
    }

    public function addPotion(){

        $nom_potion = filter_input(INPUT_POST, 'potion', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if ($nom_potion) {
            $pdo = Connect::seConnecter();
            $pot = $pdo->prepare('INSERT INTO potion (nom_potion)  VALUES (:nom) ');
            $pot->execute(['nom'=> $nom_potion]);
        }
    }

    public function showFormBoire(){

        $pdo = Connect::seConnecter();
        $potions = $pdo->query('SELECT * FROM potion');
        $persos = $pdo->query('SELECT * FROM personnage');

        require 'view/form/ajoutBoire.php';
    }
    public function addBoire(){

        $potion = filter_input(INPUT_POST, 'potion', FILTER_VALIDATE_INT);
        $perso = filter_input(INPUT_POST, 'perso', FILTER_VALIDATE_INT);
        $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $dose = filter_input(INPUT_POST, 'dose',FILTER_VALIDATE_INT);

        if ($potion && $perso && $date && $dose) {
            $pdo = Connect::seConnecter();
            $pot = $pdo->prepare('
            INSERT INTO boire (id_potion, id_personnage, date_boire, dose_boire)  
            VALUES (:potion , :perso, :date, :dose) ');
            $pot->execute([
                'potion'=> $potion,
                'perso'=> $perso,
                'date'=> $date,
                'dose'=> $dose
            ]);
        }

    }
}
