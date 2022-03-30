<?php ob_start(); ?>

<table>
    <thead>
        <tr>
            <th>Nom lieu</th>
            <th>nb</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requete as $lieu ) { ?>
                <tr>
                    <td><?= $lieu["nom_lieu"] ?></td>
                    <td><?= $lieu["nb"] ?></td>
                    

                    
                </tr>

        <?php
            }
        $requete = null;
        
        
        ?>
    </tbody>
</table>
<?php

$titre = "Nom du / des lieu(x) possédant le plus d'habitants, en dehors du village gaulois.";
$titre_secondaire= $titre;
$contenu = ob_get_clean();
require "view/template.php";

?>