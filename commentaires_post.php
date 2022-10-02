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

<?php
$mess ='';
if( isset($_GET['create'])) {
    if ( !empty($_GET['ID_billet'] . $_GET['auteur'] . $_GET['contenu'] . $_GET['date_commentaire'])) {
        $sql = 'INSERT INTO monblog_commentaires(ID_billet, auteur, contenu, date_commentaire) VALUES ("' . $_GET['ID_billet'] . $_GET['auteur'] . $_GET['contenu'] . $_GET['date_commentaire'] . '")';
        if( $db->exec($sql)) {
            $mess = 'Commentaire posté !';
        }
        else {
            $mess = 'Erreur lors du post du commentaire';
        }
    }
    else {
        $mess = 'Entrer un pseudo';
    }
}
?>