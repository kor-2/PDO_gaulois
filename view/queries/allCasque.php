<?php ob_start(); 

?>

<table>
    <thead>
        <tr>
            <th>Nom du casque</th>
            <th>Cout du casque</th>
            <th>Type de casque</th>
        </tr>
    </thead>
    <tbody>
            <?php 
            foreach ($alls as $list) {
            ?>
        <tr>
            <td><?= $list['nom_casque']; ?></td>
            <td><?= $list['cout_casque'] ?></td>
            <td><?= $list['nom_type_casque'] ?></td>
        </tr>
        <?php }?>
    </tbody>
</table>
<?php

$titre = "Les casques" ;
$titre_secondaire= $titre;
$contenu = ob_get_clean();
require "view/template.php";

?>