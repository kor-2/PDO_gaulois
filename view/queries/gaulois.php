<?php ob_start(); ?>

<p>Il y a <?= $requete->rowCount(); ?> <?= $requete->rowCount() ? 'villages' : 'village'; ?></p>

<table>
    <thead>
        <tr>
            <th>Nom habitant</th>
            <th>id habitant</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requete as $perso) { ?>
                <tr>
                    <td><a href="?action=detail&perso=<?= $perso['id_personnage']; ?>"><?= $perso['nom_personnage']; ?></a></td>
                    <td><?= $perso['id_personnage']; ?></td>
                </tr>

        <?php
            }
        $requete = null;

        ?>
    </tbody>
</table>
<?php

$titre = 'Personnage';
$titre_secondaire = $titre;
$contenu = ob_get_clean();
require 'view/template.php';

?>