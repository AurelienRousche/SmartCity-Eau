<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="style.css"/>
        <title><?= $titre ?></title>
    </head>
    <body>
        <div id="global">
            <header>
                <a href="index.php"><h1 id="titre">SmartCity - Eau</h1></a>
                <nav>
                    <a href="<?= "index.php?action=capteurs" ?>">Capteurs</a>
                    <a href="<?= "index.php?action=fuites" ?>">Fuites</a>
                    <a href="<?= "index.php?action=conso" ?>">Consommation</a>
                </nav>
            </header>
            <div id="contenu">
                <?= $contenu ?>
            </div> <!-- #contenu -->
            <footer id="piedBlog">
                &copy; 2024-2025
            </footer>
        </div> <!-- #global -->
    </body>
</html>