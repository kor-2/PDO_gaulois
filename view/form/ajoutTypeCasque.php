<?php ob_start(); ?>



<form action="" method="post">
    <input type="text" placeholder="Nom type casque" name="nom">
    <input type="submit">
</form>



<?php

$titre = 'Ajout type casque';
$titre_secondaire = $titre;
$contenu = ob_get_clean();
require 'view/template.php';
?>