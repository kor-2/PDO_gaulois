<?php ob_start(); ?>

<table>
    <thead>
        <tr>
            <th>Nom spécialité</th>
            <th>Nombre personnage</th>

        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requete as $lieu ) { ?>
                <tr>
                    <td><?= $lieu["nom_specialite"] ?></td>
                    <td><?= $lieu["nb_personnages"] ?></td>

                    
                </tr>

        <?php
            }
        $requete = null;
        
        
        ?>
    </tbody>
</table>
<?php

$titre = "Nom  des  spécialités  avec  nombre  de personnagespar  spécialité  (trié  par  nombre  de personnagesdécroissant).";
$titre_secondaire= $titre;
$contenu = ob_get_clean();
require "view/template.php";

?>