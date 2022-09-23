<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Les commentaires</title>
</head>

<body>
    <?php
    ?>
    <header class="container">
    <h1>Commentaires</h1>
        <nav class="nav">
        </nav>
    </header>

    <main class="container">
     <div class="row">
        <div class="col-6 mt-5">
        <?php
        if( isset($_GET['supp'])) {
            $sql = "DELETE FROM personnages WHERE ID=" . $_GET['ID'];
            if( $db->exec($sql)) {
                echo '<p> Personnage supprimé </p>';
            }
            else {
            echo '<p> Erreur lors de la suppression</p>';
            }
        }

        $mess ='';
        if( isset($_GET['create'])) {
            if ( !empty($_GET['nom'])) {
                $sql = 'INSERT INTO personnages(nom) VALUES ("' . $_GET['nom'] . '")';
                if( $db->exec($sql)) {
                    $mess = 'Personnage créé !';
                }
                else {
                    $mess = 'Erreur lors de la création';
                }
            }
            else {
                $mess = 'Entrer un nom de personnage';
            }
        }


        ?>
        <h6>Liste des personnages</h6><br>
        <p>Choisir un personnage à modifier :</p>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Supprimer</th>
                        <th scope="col">Personnage</th>
                    </tr>
                </thead>
                <tbody>


                <?php
                $sql = "SELECT * FROM personnages"; 
                $response = $db->query( $sql );
                $listPerso = $response->fetchAll();
                foreach( $listPerso as $cle=>$perso ) {
                    echo '<tr><th scope="row">' . $perso['ID'] . '</th><td><a href="personnages.php?ID=' . $perso['ID'] . '&supp' .' ">x</td><td>' . $perso['nom'] . '</td></tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="col-6 mt-5">
        <h6>Créer un personnage</h6><br>
        <?php
        echo $mess;
        ?>
        <form action="personnages.php?" method="get" name="accessFrom">
            <div class="col-auto">
                <input type ="hidden" value="" name="create">
                <input type="text" class="form-control" name="nom" placeholder="Entrer un nom">
            </div>
            <div class="col-auto">
                <br><button type="submit" class="btn btn-primary">Entrer</button>
            </div>
        </form>
        </div>
    </div>
    </main>

    <footer class="container">

    </footer>
</body>
</html>