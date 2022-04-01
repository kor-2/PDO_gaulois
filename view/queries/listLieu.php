<?php ob_start(); 

?>

<table>
    <thead>
        <tr>
            <th>Nom du personnage</th>
            <th>Lieu</th>
        </tr>
    </thead>
    <tbody>
            <?php 
            foreach ($listLieu as $list) {
            ?>
        <tr>
            <td><a href="?action=detail&perso=<?= $list['id_personnage']; ?>"><?= $list['nom_personnage']; ?></a></td>
            <td><?= $list['nom_lieu'] ?></td>
        </tr>
        <?php }?>
    </tbody>
</table>
<?php

$titre = "Détail lieu" ;
$titre_secondaire= $titre;
$contenu = ob_get_clean();
require "view/template.php";

?>