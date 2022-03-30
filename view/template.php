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
    <title><?= $titre ?></title>
</head>
<body>
    
    <div id="wrapper">
        <main>
            <div id="contenu">
                <h1>PDO Gaulois</h1>
                <form method="get">
                    <h2>Exe requête SQL(de 1 a 15)</h2>
                    <input type="number" name="action" min="1" max="15">
                    <input type="submit">
                </form>
                
                <h2><?= $titre_secondaire ?></h2>
                <?= $contenu ?>
            </div>
        </main>
    </div>
    
</body>
</html>