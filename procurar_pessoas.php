<?php

    session_start();

    if(!isset($_SESSION['usuario']))
		header('Location: index.php?erro=1');
		
	require_once('utils/qtd_seguidor_tweet.php');

?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>

		<?php 
			require_once('head.php');
		?>

		<script type="text/javascript" src="js/procurar_pessoas.js"></script>

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
              <li><a href="home.php">Home</a></li>
	            <li><a href="sair.php">Sair</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">

			<?php require('utils/painel_qtd_seguidor.php') ?>

	    	<div class="col-md-6">

				<div class="panel panel-default">
					<div class="panel-body">
						<form id="form_procurar_pessoas" class="input-group">
							<input type="text" id="nome_pessoa" name="nome_pessoa" class="form-control" placeholder="Quem você está procurando?" maxlength="140">
							<span class="input-group-btn">
								<button class="btn btn-primary" id="btn_procurar_pessoa" type="button">Procurar</button>
							</span>
						</form>
					</div>
				</div>

				<div id="pessoas" class="list-group"></div>

			</div>

			<div class="col-md-3"></div>

		</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>