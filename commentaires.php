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

        </div>
        </div>
    </main>

    <footer class="container">

    </footer>
</body>
</html>