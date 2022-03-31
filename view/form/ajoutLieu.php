<?php ob_start(); ?>


<form action="" method="post">
    <input type="text" placeholder="Lieu" name="lieu">
    <input type="submit">
</form>




<?php

$titre = 'Ajout Lieu';
$titre_secondaire = $titre;
$contenu = ob_get_clean();
require 'view/template.php';

?>