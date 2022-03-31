<?php ob_start(); ?>



<form action="" method="post">
    <input type="text" placeholder="Nom bataille" name="nom">
    <input type="date" name="date">
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
    <input type="submit">
</form>



<?php

$titre = 'Ajout bataille';
$titre_secondaire = $titre;
$contenu = ob_get_clean();
require 'view/template.php';
?>