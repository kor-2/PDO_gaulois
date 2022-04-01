<?php ob_start(); 

?>

<table>
    <thead>
        <tr>
            <th>Nom du personnage</th>
            <th>Adresse</th>
            <th>image</th>
            <th>Lieu</th>
            <th>Spécialité</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php 
            foreach ($details as $detail) {

            
            ?>
            
            <td><?= $detail['nom_personnage'] ?></td>
            <td><?= $detail['adresse_personnage'] ?></td>
            <td><?= $detail['image_personnage'] ?></td>
            <td><a href="?action=list_lieu&lieu=<?=$detail['id_lieu']?>"><?= $detail['nom_lieu'] ?></a></td>
            <td><a href="?action=list_spe&spe=<?=$detail['id_specialite']?>"><?= $detail['nom_specialite'] ?></a></td>
            <?php }?>
        </tr>
    </tbody>
</table>
<?php

$titre = "Détail personnage" ;
$titre_secondaire= $titre;
$contenu = ob_get_clean();
require "view/template.php";

?>