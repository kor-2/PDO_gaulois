<?php ob_start(); ?>



<form action="" method="post">
    <input type="text" placeholder="Nom casque" name="nom">
    <input type="text" placeholder="Cout casque" name="cout">
    <select name="lieu" id="">
        <option value="">--Type casque--</option>
        <?php
        foreach ($types as $type) {
            ?>
        <option value="<?=  $type['id_type_casque']; ?>"><?= $type['nom_type_casque']; ?></option>
        <?php
        }
        ?>

    </select>
    <input type="submit">
</form>



<?php

$titre = 'Ajout casque';
$titre_secondaire = $titre;
$contenu = ob_get_clean();
require 'view/template.php';
?>