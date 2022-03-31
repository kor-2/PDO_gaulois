<?php ob_start(); ?>


<form action="" method="post">
    <input type="text" placeholder="Personnage" name="perso">
    <input type="text" placeholder="Adresse" name="adress">
    <input type="text" placeholder="Image personnage" name="imgPerso" value="indisponible.jpg">
    
    <!-- lieu  -->
    <select name="lieu" id="">
        <option value="">--Lieu--</option>
        <?php
        foreach ($lieux as $lieu) {
            ?>
        <option value="<?=  $lieu['id_lieu']; ?>"><?= $lieu['nom_lieu']; ?></option>
        <?php
        }
        ?>

    </select>
    <!-- specialité  -->
    <select name="spe" id="">
        <option value="">--Spécialité--</option>
        <?php
        foreach ($spec as $spe) {
            ?>
        <option value="<?=  $spe['id_specialite']; ?>"><?= $spe['nom_specialite']; ?></option>
        <?php
        }
        ?>

    </select>
    <input type="submit">
</form>




<?php

$titre = 'Ajout Personnage';
$titre_secondaire = $titre;
$contenu = ob_get_clean();
require 'view/template.php';

?>