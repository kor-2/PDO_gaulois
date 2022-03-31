<?php ob_start(); ?>



<form action="" method="post">
    <input type="text" placeholder="Ingredient" name="ingre">
    <input type="number" placeholder="Cout ingrédient" name="cout">
    <input type="submit">
</form>



<?php

$titre = 'Ajout spécialité';
$titre_secondaire = $titre;
$contenu = ob_get_clean();
require 'view/template.php';
?>