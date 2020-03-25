<?php

    session_start();

    if(!isset($_SESSION['usuario']))
		header('Location: index.php?erro=1');

	$id_usuario = $_SESSION['id_usuario'];

	require_once('db.class.php');

	$objDb = new db();
    $link = $objDb->connect_mysql();
		
	//qtd tweets
	$sql = " SELECT COUNT(*) AS qtde_tweets from tweet WHERE id_usuario = $id_usuario ";

	$resultado_id = mysqli_query($link, $sql);
	$qtde_tweets = 0;

	if($resultado_id){
		$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
		$qtde_tweets = $registro['qtde_tweets'];
	}
	else
		echo 'Erro ao executar a query';

	//qtd seguidores
	$sql = " SELECT COUNT(*) AS qtde_seguidores from usuarios_seguidores WHERE seguindo_id_usuario = $id_usuario ";

	$resultado_id = mysqli_query($link, $sql);
	$qtde_seguidores = 0;

	if($resultado_id){
		$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
		$qtde_seguidores = $registro['qtde_seguidores'];
	}
	else
		echo 'Erro ao executar a query';

?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>

		<?php 
			require_once('head.php');
		?>

		<script type="text/javascript" src="js/home.js"></script>

	</head>

	<body>

		<!-- Static navbar -->
	    <nav class="navbar navbar-default navbar-static-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <img src="imagens/icone_twitter.png" />
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="sair.php">Sair</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">

			<?php require('utils/painel_qtd_seguidor.php');?>

	    	<div class="col-md-6">

				<div class="panel panel-default">
					<div class="panel-body">
						<form id="form_tweet" class="input-group">
							<input type="text" id="texto_tweet" name="texto_tweet" class="form-control" placeholder="O que está acontecendo agora?" maxlength="140">
							<span class="input-group-btn">
								<button class="btn btn-primary" id="btn_tweet" type="button">Tweet</button>
							</span>
						</form>
					</div>
				</div>

				<div id="tweets" class="list-group"></div>

			</div>

			<div class="col-md-3">

				<div class="panel panel-default">
					<div class="panel-body">

						<h4><a href="procurar_pessoas.php">Procurar por pessoas</a></h4>

					</div>
				</div>

			</div>

		</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>