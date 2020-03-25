<?php 

    session_start();

    if(!isset($_SESSION['usuario']))
        header('Location: index.php?erro=1');

    require_once('db.class.php');

    $id_usuario = $_SESSION['id_usuario'];

    $objDb = new db();
    $link = $objDb->connect_mysql();

    /*$sql = " SELECT t.data_inclusao, t.tweet, u.usuario FROM tweet AS t, usuarios AS u";
    $sql.= " WHERE id_usuario = $id_usuario AND t.id_usuario = u.id ORDER BY data_inclusao DESC ";*/

    $sql = " SELECT DATE_FORMAT(t.dt_inclusao, '%d %b %Y %T') AS dt_inclusao, t.tweet, u.usuario, t.id_tweet, t.id_usuario";
    $sql.= " FROM tweet AS t JOIN usuarios AS u ON (t.id_usuario = u.id)";
    $sql.= " WHERE id_usuario = $id_usuario";
    $sql.= " OR id_usuario IN (SELECT seguindo_id_usuario FROM usuarios_seguidores WHERE id_usuario = $id_usuario)";
    $sql.= " ORDER BY dt_inclusao DESC ";

    $resultado_id = mysqli_query($link, $sql);

    if($resultado_id){

        while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
            echo '<a href="#" class="list-group-item">';
                echo '<h4 class="list-group-item-heading">'.$registro['usuario'];
                echo '<small> - '.$registro['dt_inclusao'].'</small>';
                if($registro['id_usuario'] == $id_usuario)
                    echo '<span id="tweet_'.$registro['id_tweet'].'" class="excluir text-danger pull-right" data-id_tweet="'.$registro['id_tweet'].'">&times</span></h4>';
                else echo '</h4>';
                echo '<p class="list-group-item-text">'.$registro['tweet'].'</p>';
            echo '</a>';
        }

    }else
        echo 'Erro na consulta de tweets no banco de dados';

?>