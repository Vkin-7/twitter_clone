<?php 

    session_start();

    if(!isset($_SESSION['usuario']))
        header('Location: index.php?erro=1');

    require_once('db.class.php');

    $id_usuario = $_SESSION['id_usuario'];
    $id_tweet = $_POST['id_tweet'];

    if($id_usuario == '' || $id_tweet == '')
        die();

    $mDb = new db();
    $link = $mDb->connect_mysql(); 
    
    $sql = " DELETE FROM tweet WHERE id_tweet = $id_tweet AND id_usuario = $id_usuario ";

    mysqli_query($link, $sql);

?>