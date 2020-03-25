<?php

    require_once('db.class.php');

    $sql = " select * from usuarios ";

    $mDb = new db();
    $link = $mDb->connect_mysql(); 

    if($resultado_id = mysqli_query($link, $sql)){
        //$dados_usuario = mysqli_fetch_array($resultado_id);
        //$dados_usuario = mysqli_fetch_array($resultado_id, MYSQLI_NUM);
        //$dados_usuario = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
        $dados_usuario = array();

        while($linha = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
            $dados_usuario[] = $linha;
        }

        foreach($dados_usuario as $usuario){
            var_dump($usuario);
            //echo $usuario['email'];
            echo '<br>';
        }

    }else
        echo 'Erro na execução da consulta, favor entrar em contato com o admin do site';

?>