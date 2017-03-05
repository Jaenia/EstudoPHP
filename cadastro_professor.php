<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>CAO - Controle Acadêmico Online - Cadastro de professor</title>
	</head>
	<body>
		<h2>Cadastro de professor</h2>

		<form action="cadastro_professor.php" method="get">
			<label>Código:<input type="text" name="matricula_prof" autofocus></label><br><br>
			<label>Nome:<input type="text" name="nome"></label><br><br>
			<button type="submit">Cadastrar</button>
		</form>

		<br><button><a href="index.php">Voltar para a página inicial</a></button>

		<?php

			$login = "root";
			$password = "";
			
			try{
				$bd = new PDO('mysql:host=localhost;dbname=academico', $login, $password);
			}catch(PDOException $e){
				echo "Error! ".$e->getmessage();
				die();
			}
		?>

		<?php
			if(isset($_GET['matricula_prof']) && isset($_GET['nome'])){
				$codigo = $_GET['matricula_prof'];
				$nome = $_GET['nome'];

				$sql = "insert into professor values ('$codigo', '$nome')";

				$res = $bd->exec($sql);

				if($res > 0){
					echo "<br><br>Cadastro realizado com sucesso!";
				}else{
					echo "<br><br>Cadastro não realizado";
				}
			}	
		?>

		<?php
			$bd = null;
		?>

	</body>
</html>