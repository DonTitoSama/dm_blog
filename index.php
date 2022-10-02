<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>DM Blog</title>
</head>

<body>
    <?php
    try
    {
        $db = new PDO("mysql:host=localhost:3306;dbname=diego;charset=utf8", "diego", "iY7Vei7k");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
    catch( Execption $e )
    {   
        die( "Erreur : " . $e->getMessage());
    }
    ?>


    <header class="container">
    <h1>Mon Blog - BUSSU Diego</h1><br>
    </header>

    <section class="container-fluid">
    <div class="row justify-content-center">
    <div class="col-9">
        <h4>Articles les plus récents :</h4>  
    </div>
    </div>

    <main class="container">
    <?php
    $req = $db->query ( // Affichage des 10 derniers articles du blog
    'SELECT ID, titre, contenu, 
    DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_de_creation
    FROM monblog_billets 
    ORDER BY date_creation 
    DESC LIMIT 0, 10'
    );
    ?>


    <?php
    while ($donnees = $req->fetch()) { // debut du while
    ?>

    <div class="card mt-5">
        <div class="card-header">
            <em>publié le <?php echo $donnees['date_de_creation']; ?></em>
        </div>

        <div class="card-body">
            <h3 class="card-title"><?php echo htmlspecialchars($donnees['titre']); ?></h3>

            <p class="card-text"><?php echo nl2br(htmlspecialchars($donnees['contenu'])); ?></p>

            <a href="commentaires.php?ID=<?php echo $donnees['ID']; ?>" class="btn btn-primary">Voir les commentaires</a>
        </div>
    </div>

    <?php
    } // fin du while
    $req->closeCursor();
    ?>

    </div>
    </div>
    </main>

    <footer class="container">
    </footer>
</body>
</html>
   