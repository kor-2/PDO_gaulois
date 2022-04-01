<?php ob_start(); 

?>

<table>
    <thead>
        <tr>
            <th>Nom du personnage</th>
            <th>Adresse</th>
            <th>Image</th>
            <th>Lieu</th>
            <th>Spécialité</th>
        </tr>
    </thead>
    <tbody>
            <?php 
            foreach ($alls as $list) {
            ?>
        <tr>
            <td><?= $list['nom_personnage']; ?></td>
            <td><?= $list['adresse_personnage'] ?></td>
            <td><?= $list['image_personnage'] ?></td>
            <td><a href="?action=list_lieu&lieu=<?=$list['id_lieu']?>"><?= $list['nom_lieu'] ?></a></td>
            <td><a href="?action=list_spe&spe=<?=$list['id_specialite']?>"><?= $list['nom_specialite'] ?></a></td>
        </tr>
        <?php }?>
    </tbody>
</table>
<?php

$titre = "Les personnages" ;
$titre_secondaire= $titre;
$contenu = ob_get_clean();
require "view/template.php";

?>