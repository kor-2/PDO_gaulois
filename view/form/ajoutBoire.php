<?php ob_start(); ?>
<form action="" method="post">
    <select name="potion" id="">
        <option value="">--Potion--</option>
        <?php
        foreach ($potions as $potion) {
            ?>
        <option value="<?=  $potion['id_potion']; ?>"><?= $potion['nom_potion']; ?></option>
        <?php
        }
        ?>

    </select>
    <select name="perso" id="">
        <option value="">--Personnage--</option>
        <?php
        foreach ($persos as $perso) {
            ?>
        <option value="<?=  $perso['id_personnage']; ?>"><?= $perso['nom_personnage']; ?></option>
        <?php
        }
        ?>

    </select>


    <input type="date" placeholder="Date bue" name="date">
    <input type="number" placeholder="Dose bue" name="dose">
    <input type="submit">
</form>




<?php

$titre = 'Ajout Potion';
$titre_secondaire = $titre;
$contenu = ob_get_clean();
require 'view/template.php';

?>