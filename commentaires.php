<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Commentaire du blog</title>
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
        <h1>Les commentaires :</h1>
        <a href="index.php"> <p class="text-center">Retournez à l'accueil</p></a>
    </header>

    <main class="container">

    <?php
    $req = $db->prepare(
    'SELECT ID, titre, contenu, 
    DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr 
    FROM monblog_billets 
    WHERE ID = ?'
    );

    $req->execute(array($_GET['ID']));
    $donnees = $req->fetch();
    ?>

    <div class="card mt-5">
        <div class="card-header">
        <em>publié le <?php echo $donnees['date_creation_fr']; ?></em>
        </div>
        <div class="card-body">
        <h5 class="card-title"><?php echo htmlspecialchars($donnees['titre']); ?></h5>
        <p class="card-text"><?php echo nl2br(htmlspecialchars($donnees['contenu'])); ?></p>
        </div>
    </div>




    <div class="row justify-content-center mt-5">
    <div class="col-5">
        <h3 class="row justify-content-center">Commentaire(s) de l'article :</h3><br>
    <div class="list-group">
        
    <?php
    $req->closeCursor();

    $req = $db->prepare(
    'SELECT auteur, contenu, 
    DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr 
    FROM monblog_commentaires 
    WHERE id_billet = ? 
    ORDER BY date_commentaire'
    );
    $req->execute(array($_GET['ID']));
    ?>


    <?php
    while ($donnees = $req->fetch()) // debut du while
    {
    ?>


    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1"><?php echo htmlspecialchars($donnees['contenu']); ?></h5>
            <small><?php echo htmlspecialchars($donnees['auteur']); ?></strong> le <?php echo $donnees['date_commentaire_fr']; ?></small>
        </div>
        <p class="mb-1"><?php echo nl2br(htmlspecialchars($donnees['commentaire'])); ?></p>
    </a>

    <?php
    } // fin du while
    $req->closeCursor();

    echo $mess;
    ?>

    <br><br><br>
    <form action="commentaires_post.php?" method="get" name="accessFrom">
        <div class="col-auto">
            <input type ="hidden" value="" name="create">
            <input type="number" class="form-control" name="ID_billet" id="ID_billet" required="required"><br>
            <input type="date" class="form-control" name="date_commentaire" id="date_commentaire" required="required"><br>
            <input type="text" class="form-control" name="auteur" id="auteur" placeholder="Entrer un pseudo" required="required"><br>
            <input type="text" class="form-control" name="contenu" id="contenu" placeholder="Écrivez votre réponse" required="required">
        </div>
        <div class="col-auto">
            <br><button type="submit" class="btn btn-primary">Postez votre commentaire</button>
        </div>
    </form>

    </div>
    </div>
    </div>
    </main>

    <footer class="container">
                
    </footer>
</body>
</html>
