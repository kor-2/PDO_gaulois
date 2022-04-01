<?php ob_start(); ?>
<form action="" method="post">
    <input type="text" placeholder="Nom de la potion" name="potion">
    <input type="submit">
</form>




<?php

$titre = 'Ajout Potion';
$titre_secondaire = $titre;
$contenu = ob_get_clean();
require 'view/template.php';

?>