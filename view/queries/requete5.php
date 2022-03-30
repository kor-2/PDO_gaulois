<?php ob_start(); ?>

<table>
    <thead>
        <tr>
            <th>Nom bataile</th>
            <th>date bataille</th>
            <th>Nom lieu</th>

        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requete as $lieu ) { ?>
                <tr>
                    <td><?= $lieu["nom_bataille"] ?></td>
                    <td><?= $lieu["date_bataille"] ?></td>
                    <td><?= $lieu["nom_lieu"] ?></td>

                    
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