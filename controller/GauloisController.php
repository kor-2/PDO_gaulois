<?php

namespace Controller;
use Model\Connect;

class GauloisController{
    /**
     * lister les gaulois
     */
    public function listGaulois(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT id_personnage, nom_personnage
        FROM personnage
        ORDER BY nom_personnage
        ");
        require "view/queries/gaulois.php";
    }

    /**
     * Details gaulois
     */

    public function showGaulois(){

    $perso = filter_input(INPUT_GET, 'perso', FILTER_VALIDATE_INT);

    if ($perso) {
        $pdo = Connect::seConnecter();
        $details = $pdo->prepare('
        SELECT p.id_personnage, p.nom_personnage , p.adresse_personnage , p.image_personnage ,l.id_lieu, l.nom_lieu ,s.id_specialite, s.nom_specialite
        FROM personnage p 
        RIGHT JOIN lieu l ON p.id_lieu = l.id_lieu
        RIGHT JOIN specialite s ON p.id_specialite = s.id_specialite
        WHERE p.id_personnage = :perso
        ');
        $details->execute(['perso' => $perso]);
        require "view/queries/detailGaulois.php";
    }

    }
    /**
     * liste des personnage d'un lieu
     */

     public function showListLieu(){

        $lieu = filter_input(INPUT_GET, 'lieu', FILTER_VALIDATE_INT);

        $pdo = Connect::seConnecter();
        $listLieu = $pdo->prepare('
        SELECT p.id_personnage, p.nom_personnage ,  l.nom_lieu 
        FROM personnage p 
        RIGHT JOIN lieu l ON p.id_lieu = l.id_lieu
        WHERE l.id_lieu = :lieu
        ');
        $listLieu->execute(['lieu' => $lieu]);
        require "view/queries/listLieu.php";
     }
    /**
     * liste des personnages d'une specialite
     */

     public function showListSpe(){

        $spe = filter_input(INPUT_GET, 'spe', FILTER_VALIDATE_INT);

        $pdo = Connect::seConnecter();
        $listSpe = $pdo->prepare('
        SELECT p.id_personnage, p.nom_personnage ,  s.nom_specialite
        FROM personnage p 
        RIGHT JOIN specialite s ON p.id_specialite = s.id_specialite
        WHERE s.id_specialite = :spe
        ');
        $listSpe->execute(['spe' => $spe]);
        require "view/queries/listSpe.php";
     }

    /**
     * liste des personnages
     */

    public function showAllGaulois(){


    
        $pdo = Connect::seConnecter();
        $alls = $pdo->prepare('
        SELECT p.id_personnage, p.nom_personnage , p.adresse_personnage , p.image_personnage ,l.id_lieu, l.nom_lieu ,s.id_specialite, s.nom_specialite
        FROM personnage p 
        RIGHT JOIN lieu l ON p.id_lieu = l.id_lieu
        RIGHT JOIN specialite s ON p.id_specialite = s.id_specialite
        ');
        $alls->execute();
        require "view/queries/allPerso.php";
    }




    public function requete1(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT l.nom_lieu 
        FROM lieu l
        WHERE l.nom_lieu
        LIKE '%um'
        ");
        require "view/queries/requete1.php";
    }
    public function requete2(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT lieu.nom_lieu AS 'lieu' ,  
        COUNT(*) AS 'nbPerso'
        FROM personnage
        INNER JOIN lieu ON personnage.id_lieu = lieu.id_lieu
        GROUP BY lieu.nom_lieu
        ORDER BY nbPerso DESC
        ");
        require "view/queries/requete2.php";
    }

    public function requete3(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT  p.nom_personnage, 
                l.nom_lieu, 
                s.nom_specialite
        FROM personnage p, lieu l, specialite s
        WHERE l.id_lieu=p.id_lieu AND s.id_specialite=p.id_specialite 
        ORDER BY l.nom_lieu ASC, p.nom_personnage ASC
        ");
        require "view/queries/requete3.php";
    }
    public function requete4(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT  s.nom_specialite, 
                COUNT(p.id_personnage) AS nb_personnages 
        FROM specialite s 
        LEFT JOIN personnage p ON s.id_specialite=p.id_specialite 
        GROUP BY s.id_specialite 
        ORDER BY nb_personnages DESC
        ");
        require "view/queries/requete4.php";
    }
    public function requete5(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT  b.nom_bataille, 
                DATE_FORMAT(b.date_bataille, '%d %M -%y') AS date_bataille, 
                l.nom_lieu
        FROM bataille b, lieu l 
        WHERE b.id_lieu=l.id_lieu
        ORDER BY YEAR(b.date_bataille) ASC,   MONTH(b.date_bataille) DESC, DAY(b.date_bataille) DESC
        ");
        require "view/queries/requete5.php";
    }
    public function requete6(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT  p.nom_potion, 
                SUM(i.cout_ingredient*c.qte) AS cout_potion 
        FROM potion p 
        LEFT JOIN composer c ON c.id_potion=p.id_potion 
        LEFT JOIN ingredient i ON c.id_ingredient=i.id_ingredient 
        GROUP BY p.id_potion 
        ORDER BY cout_potion DESC
        ");
        require "view/queries/requete6.php";
    }
    public function requete7(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT  i.nom_ingredient, 
                SUM(i.cout_ingredient*c.qte) AS cout_ingredient 
        FROM potion p, composer c, ingredient i
        WHERE p.id_potion=c.id_potion AND c.id_ingredient=i.id_ingredient AND p.nom_potion='Santé'
        GROUP BY i.id_ingredient
        ");
        require "view/queries/requete7.php";
    }
    public function requete8(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT  p.nom_personnage, 
                SUM(pc.qte) AS nb_casques 
        FROM personnage p, bataille b, prendre_casque pc 
        WHERE p.id_personnage=pc.id_personnage AND pc.id_bataille=b.id_bataille AND b.nom_bataille='Bataille du village gaulois'
        GROUP BY p.id_personnage HAVING nb_casques >= ALL(
            SELECT 
                SUM(pc.qte)
                FROM prendre_casque pc, bataille b
                WHERE b.id_bataille=pc.id_bataille AND b.nom_bataille='Bataille du village gaulois'
                GROUP BY pc.id_personnage)
        ");
        require "view/queries/requete8.php";
    }
    public function requete9(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT  p.nom_personnage, 
                pt.nom_potion, 
                SUM(b.dose_boire) AS qte_bue 
        FROM personnage p, boire b, potion pt
        WHERE p.id_personnage=b.id_personnage AND b.id_potion=pt.id_potion 
        GROUP BY p.id_personnage, pt.id_potion 
        ORDER BY qte_bue DESC
        ");
        require "view/queries/requete9.php";
    }
    public function requete10(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT  b.nom_bataille, 
                SUM(pc.qte) AS nb_casques
        FROM bataille b, prendre_casque pc 
        WHERE b.id_bataille=pc.id_bataille 
        GROUP BY b.id_bataille 
        HAVING nb_casques >= ALL(SELECT
                                    SUM(pc.qte) 
                                FROM bataille b, prendre_casque pc
                                WHERE b.ID_BATAILLE=pc.ID_BATAILLE 
                                GROUP BY b.id_bataille)
        ");
        require "view/queries/requete10.php";
    }
    public function requete11(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT
            COUNT(c.id_casque) AS nb_casques, 
            tc.nom_type_casque,
            SUM(c.cout_casque) AS total 
        FROM type_casque tc 
        LEFT JOIN casque c ON tc.id_type_casque=c.id_type_casque 
        GROUP BY tc.id_type_casque
        ORDER BY nb_casques DESC
        ");
        require "view/queries/requete11.php";
    }

    public function requete12(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT  p.nom_potion
        FROM potion p, ingredient i, composer c
        WHERE p.id_potion=c.id_potion AND c.id_ingredient=i.id_ingredient AND LOWER(i.nom_ingredient) LIKE \"%poisson%\"
        ");
        require "view/queries/requete12.php";
    }
    public function requete13(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT  l.nom_lieu, 
                COUNT(p.id_personnage) AS nb 
        FROM personnage p, lieu l 
        WHERE p.id_lieu=l.id_lieu AND l.nom_lieu !='Village gaulois'
        GROUP BY l.id_lieu 
        HAVING nb >=ALL (   SELECT COUNT(p.id_personnage)
                            FROM personnage p, lieu l 
                            WHERE l.id_lieu=p.id_lieu
                            AND l.nom_lieu !='Village gaulois'
                            GROUP BY l.id_lieu)
        ");
        require "view/queries/requete13.php";
    }
    public function requete14(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT  p.nom_personnage
        FROM personnage p
        WHERE p.id_personnage NOT IN(
            SELECT  p.id_personnage
            FROM personnage p, boire b
            WHERE p.id_personnage=b.id_personnage)
        ");
        require "view/queries/requete14.php";
    }
    public function requete15(){
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT  p.nom_personnage
        FROM personnage p
        WHERE p.id_personnage NOT IN(   SELECT id_personnage
                                        FROM autoriser_boire a, potion pt
                                        WHERE pt.id_potion=a.id_potion AND pt.nom_potion='Magique')
        ");
        require "view/queries/requete15.php";
    }
}