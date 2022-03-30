<?php ob_start(); ?>

<p>Il y a <?= $requete->rowCount() ?> <?= $requete->rowCount()? "villages": "village" ?></p>

<table>
    <thead>
        <tr>
            <th>Nom lieu</th>
            <th>Nombre habitants</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requete as $lieu ) { ?>
                <tr>
                    <td><?= $lieu["lieu"] ?></td>
                    <td><?= $lieu["nbPerso"] ?></td>
                    
                </tr>

        <?php
            }
        $requete = null;
        
        
        ?>
    </tbody>
</table>
<?php

$titre = "Lieux et nombre d'habitant";
$titre_secondaire= "Lieux et nombre d'habitant";
$contenu = ob_get_clean();
require "view/template.php";

?>