<?php ob_start(); ?>

<table>
    <thead>
        <tr>
            <th>Nom bataille</th>
            <th>Nombre de casque</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requete as $lieu ) { ?>
                <tr>
                    <td><?= $lieu["nom_bataille"] ?></td>
                    <td><?= $lieu["nb_casques"] ?></td>

                    
                </tr>

        <?php
            }
        $requete = null;
        
        
        ?>
    </tbody>
</table>
<?php

$titre = "Nom de la bataille où le nombre de casques pris a été le plus important.";
$titre_secondaire= $titre;
$contenu = ob_get_clean();
require "view/template.php";

?>