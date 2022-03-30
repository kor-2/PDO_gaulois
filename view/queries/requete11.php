<?php ob_start(); ?>

<table>
    <thead>
        <tr>
            <th>Nombre casque</th>
            <th>Nom type casque</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requete as $lieu ) { ?>
                <tr>
                    <td><?= $lieu["nb_casques"] ?></td>
                    <td><?= $lieu["nom_type_casque"] ?></td>
                    <td><?= $lieu["total"] ?></td>

                    
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