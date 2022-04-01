<?php
use Controller\FormController;

$form = new FormController();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title><?= $titre; ?></title>
</head>
<body>
    
    <div id="wrapper">
        <main>
            <div id="contenu">
                <h1>PDO Gaulois</h1>
                <a href="/PDO_GAULOIS">Menu</a>
                <a href="?action=allPerso">Personnage</a>
                <a href="?action=allCasque">Casque</a>
                <form method="get">
                    <h2>Exe requête SQL(de 1 a 15)</h2>
                    <select name="action">
                        <?php
                        for ($i = 0; $i < 16; ++$i) {
                            ?>
                            <option value="<?= $i; ?>"><?= $i; ?></option>
                        <?php
                        }
                        ?>
                        <option value="lieu">Lieu</option>
                        <option value="specialite">Spécialité</option>
                        <option value="personnage">Personnage</option>
                        <option value="potion">Potion</option>
                        <option value="ingredient">Ingrédient</option>
                        <option value="bataille">Bataille</option>
                        <option value="typeCasque">Type de casque</option>
                        <option value="casque">Casque</option>
                        <option value="boire">Boire</option>
                    </select>
                    <input type="submit">
                </form>
                
                <h2><?= $titre_secondaire; ?></h2>
                <?= $contenu; ?>
            </div>
        </main>
    </div>
    
</body>
</html>