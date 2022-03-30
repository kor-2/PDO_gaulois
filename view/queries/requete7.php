<?php ob_start(); ?>

<table>
    <thead>
        <tr>
            <th>Nom ingredient</th>
            <th>Cout ingredient</th>

        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requete as $lieu ) { ?>
                <tr>
                    <td><?= $lieu["nom_ingredient"] ?></td>
                    <td><?= $lieu["cout_ingredient"] ?></td>

                    
                </tr>

        <?php
            }
        $requete = null;
        
        
        ?>
    </tbody>
</table>
<?php

$titre = "Nom des ingrédients + coût + quantité de chaque ingrédient qui composent la potion 'Santé'.";
$titre_secondaire= $titre;
$contenu = ob_get_clean();
require "view/template.php";

?>