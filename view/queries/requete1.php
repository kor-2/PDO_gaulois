<?php ob_start(); ?>

<p>Il y a <?= $requete->rowCount() ?> <?= $requete->rowCount()? "villages": "village" ?></p>

<table>
    <thead>
        <tr>
            <th>Nom lieu qui fini en "um"</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requete as $lieu ) { ?>
                <tr>
                    <td><?= $lieu["nom_lieu"] ?></td>
                    
                </tr>

        <?php
            }
        $requete = null;
        
        
        ?>
    </tbody>
</table>
<?php

$titre = "Lieux qui fini en \"um\"";
$titre_secondaire= "Lieux qui fini en \"um\"";
$contenu = ob_get_clean();
require "view/template.php";

?>