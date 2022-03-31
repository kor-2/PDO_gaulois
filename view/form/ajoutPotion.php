<?php ob_start(); ?>
<h2>Nombre d'ingredient</h2>
<form action="">
    <input type="hidden" name="action" value="potion">
    <input type="number" name="nbIngre" min= 1 max= 6>
    <input type="submit">

</form>
<h2>Nouvelle potion</h2>
<form action="" method="post">
    <input type="text" placeholder="Nom de la potion" name="potion">

    <!-- ingredient -->

    <?php for ($i = 0; $i < $nbIngre; ++$i) {?>

    <select name="ingre<?= $i; ?>" id="">
        <option value="">--Ingredient--</option>

            <?php foreach ($ingred as $ingre) { ?>

                <option value="<?= $ingre['id_ingredient']; ?>"><?= $ingre['nom_ingredient']; ?></option>
                
            <?php } ?>
        </select>
    <?php } ?>





    <!-- specialité  -->
    <select name="spe" id="">
        <option value="">--Spécialité--</option>
        <?php
        foreach ($spec as $spe) {
            ?>
            <option value="<?= $spe['id_specialite']; ?>"><?= $spe['nom_specialite']; ?></option>
        <?php
        }
        ?>

    </select>
    <input type="submit">
</form>




<?php

$titre = 'Ajout Potion';
$titre_secondaire = $titre;
$contenu = ob_get_clean();
require 'view/template.php';

?>