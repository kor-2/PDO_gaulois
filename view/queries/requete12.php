<?php ob_start(); ?>

<table>
    <thead>
        <tr>
            <th>Nom potion</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requete as $lieu ) { ?>
                <tr>
                    <td><?= $lieu["nom_potion"] ?></td>
                    

                    
                </tr>

        <?php
            }
        $requete = null;
        
        
        ?>
    </tbody>
</table>
<?php

$titre = "Nom des potions dont la recette comporte dupoisson.";
$titre_secondaire= $titre;
$contenu = ob_get_clean();
require "view/template.php";

?>