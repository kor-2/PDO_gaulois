<?php ob_start(); ?>

<table>
    <thead>
        <tr>
            <th>Nom personnage</th>

            
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requete as $lieu ) { ?>
                <tr>
                    <td><?= $lieu["nom_personnage"] ?></td>
                    
                </tr>

        <?php
            }
        $requete = null;
        
        
        ?>
    </tbody>
</table>
<?php

$titre = "Nom des personnagesqui n'ont jamais bu aucunepotion.";
$titre_secondaire= $titre;
$contenu = ob_get_clean();
require "view/template.php";

?>