<?php ob_start(); ?>

<table>
    <thead>
        <tr>
            <th>Nom personnage</th>
            <th>Nombre casque</th>

        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requete as $lieu ) { ?>
                <tr>
                    <td><?= $lieu["nom_personnage"] ?></td>
                    <td><?= $lieu["nb_casques"] ?></td>

                    
                </tr>

        <?php
            }
        $requete = null;
        
        
        ?>
    </tbody>
</table>
<?php

$titre = "Nom du ou des personnagesqui ont pris le plus de casques dans la bataille 'Bataille du village gaulois'.";
$titre_secondaire= $titre;
$contenu = ob_get_clean();
require "view/template.php";

?>