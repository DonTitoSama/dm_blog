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
        $db = new PDO("mysql:host=localhost:3306;dbname=dmblog;charset=utf8", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
    catch( Execption $e )
    {
        die( "Erreur : " . $e->getMessage());
    }
    ?>


    <header class="container">
    <h1>Mon Blog</h1>
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
            $blog = $response->fetchAll();
            foreach( $blog as $cle=>$monblog ) {
                echo '<tr><th scope="row">' . $monblog['ID'] . '</th><td>' . $monblog['titre'] . '</td><td>' . $monblog['date_creation'] . '</td><td>' . $monblog['contenu'] . '</td></tr>';
            }
            ?>  
            </tbody>
        </table>
        </div>
        </div>
        </div>
    </main>

    <footer class="container">

    </footer>
</body>
</html>