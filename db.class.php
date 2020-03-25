<?php

    class db {

        //host
        private $host = 'localhost';

        //usuario
        private $user = 'root';

        //senha
        private $password = '';

        //banco de dados
        private $database = 'twitter_clone';

        public function connect_mysql(){

            //criar a conexão
            //mysqli_connect(localizacao do bd, usuario, senha, banco de dados);
            $connection = mysqli_connect($this->host, $this->user, $this->password, $this->database);
            
            //ajustar o charset de comunicação entre a aplicação e o banco de dados
            mysqli_set_charset($connection, 'utf8');

            //verificar se houve erro de conexão
            if(mysqli_connect_errno()) echo 'Erro ao tentar se conectar com o BD MySQL: '.mysqli_connect_error();

            return $connection;

        }


    }

?>