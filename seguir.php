<?php 

    session_start();

    if(!isset($_SESSION['usuario']))
        header('Location: index.php?erro=1');

    require_once('db.class.php');

    $id_usuario = $_SESSION['id_usuario'];
    $seguir_id_usuario = $_POST['seguir_id_usuario'];

    if($id_usuario == '' || $seguir_id_usuario == '')
        die();

    $mDb = new db();
    $link = $mDb->connect_mysql(); 
    
    $sql = " INSERT INTO usuarios_seguidores (id_usuario, seguindo_id_usuario) VALUES ($id_usuario, $seguir_id_usuario) ";

    mysqli_query($link, $sql);

?>