<?php ob_start(); ?>

<p>Il y a <?= $requete->rowCount() ?> <?= $requete->rowCount()? "villages": "village" ?></p>

<table>
    <thead>
        <tr>
            <th>Nom habitant</th>
            <th>id habitant</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requete as $lieu ) { ?>
                <tr>
                    <td><?= $lieu["nom_personnage"] ?></td>
                    <td><?= $lieu["id_personnage"] ?></td>
                </tr>

        <?php
            }
        $requete = null;
        
        
        ?>
    </tbody>
</table>
<?php

$titre = "Lieux + nombre d'habitants";
$titre_secondaire= "Lieux + nombre d'habitants";
$contenu = ob_get_clean();
require "view/template.php";

?>