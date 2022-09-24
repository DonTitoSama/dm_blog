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
        $db = new PDO("mysql:host=localhost:3306;dbname=dmblog;charset=utf8", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
    catch( Execption $e )
    {
        die( "Erreur : " . $e->getMessage());
    }
    ?>


    <header class="container">
    <h1>Les commentaires de l'article</h1>
        <nav class="nav">
        </nav>
    </header>

    <main class="container">
    <div class="row">
    <div class="col-12 mt-5">
    <table class="table table-borderless table-dark table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titre</th>
                <th scope="col">Date</th>
                <th scope="col">Contenu</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM billets"; 
        $response = $db->query( $sql );
        $redirection = $response->fetchAll();

        foreach( $redirection as $cle=>$blog) {
            $monScript = '#';
            if (!empty($blog['script'])) {
                $monScript = $blog['script'];
            }
            echo '<tr><th scope="row">' . $blog['ID'] . '</th><td>' . $blog['titre'] . '</td><td>' . $blog['date_creation'] . '</td><td>' . $blog['contenu'] . '</td></tr>';
        }
        ?>
        </tbody>
        </table>
        </div>
        </div>

        <div class="row">
        <div class="col-12 mt-5">
        <table class="table table-borderless table-dark table-hover table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">N° Billet</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Contenu</th>
                    <th scope="col">Date du commentaire</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM commentaires"; 
            $response = $db->query( $sql );
            $list_com = $response->fetchAll();
                foreach( $list_com as $cle=>$commentaires ) {
                    echo '<tr><th scope="row">' . $commentaires['ID'] . '<td>' . $commentaires['ID_billet'] . '</td><td>' . $commentaires['auteur'] . '</td><td>' .$commentaires['contenu'] . '</td><td>' . $commentaires['date_commentaire'] . '</td></tr>';
                }
            ?>

        </div>
        </div>
    </main>

    <footer class="container">

    </footer>
</body>
</html>