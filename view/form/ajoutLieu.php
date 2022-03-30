<?php ob_start(); ?>


<form action="" method="post">
    <input type="text" placeholder="Lieu" name="addLieu">
    <input type="submit">
</form>



<?php

$titre = "Ajout d'un lieu";
$titre_secondaire= $titre;
$contenu = ob_get_clean();
require "view/template.php";

?>