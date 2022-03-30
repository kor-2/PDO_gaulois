<?php ob_start(); ?>

<table>
    <thead>
        <tr>
            <th>Nom Personnage</th>
            <th>Nom lieu</th>
            <th>Nom spécialité</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requete as $lieu ) { ?>
                <tr>
                    <td><?= $lieu["nom_personnage"] ?></td>
                    <td><?= $lieu["nom_lieu"] ?></td>
                    <td><?= $lieu["nom_specialite"] ?></td>
                    
                </tr>

        <?php
            }
        $requete = null;
        
        
        ?>
    </tbody>
</table>
<?php

$titre = "Nom des personnages+ spécialité + adresse et lieu d'habitation";
$titre_secondaire= "Nom des personnages+ spécialité + adresse et lieu d'habitation";
$contenu = ob_get_clean();
require "view/template.php";

?>