<?php ob_start(); ?>



<form action="" method="post">
    <input type="text" placeholder="Spécialité" name="spe">
    <input type="submit">
</form>



<?php

$titre = "Ajout spécialité";
$titre_secondaire= $titre;
$contenu = ob_get_clean();
require "view/template.php";
?>