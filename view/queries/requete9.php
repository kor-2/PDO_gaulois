<?php ob_start(); ?>

<table>
    <thead>
        <tr>
            <th>Nom personnage</th>
            <th>Nom potion</th>
            <th>Quantité bue</th>

        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requete as $lieu ) { ?>
                <tr>
                    <td><?= $lieu["nom_personnage"] ?></td>
                    <td><?= $lieu["nom_potion"] ?></td>
                    <td><?= $lieu["qte_bue"] ?></td>

                    
                </tr>

        <?php
            }
        $requete = null;
        
        
        ?>
    </tbody>
</table>
<?php

$titre = "Nom  des personnageset,en distinguant  chaque  potion, laquantité  de  potion  bue.  Les classerdu plus grand buveur au plus modeste.";
$titre_secondaire= $titre;
$contenu = ob_get_clean();
require "view/template.php";

?>