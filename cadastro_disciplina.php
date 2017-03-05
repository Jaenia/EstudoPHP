<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>CAO - Controle Acadêmico Online - Cadastro de disciplina</title>
	</head>
	<body>
		<h2>Cadastro de disciplina</h2>

		<form action="cadastro_disciplina.php" method="get">
			<label>Código: <input type="text" name="codigo_disc" autofocus></label><br><br>
			<label>Nome: <input type="text" name="nome"></label><br><br>

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
			echo "<label>Selecione o professor da disciplina:</label><br>";

			$sql = "select matricula_prof, nome from professor";

			echo "<select name='professores'>";
			foreach($bd->query($sql) as $row){
				echo "<option value='".$row['matricula_prof']."'>".$row['nome']."</option>";
			}
			echo "</select>";
		?>
			<br><br><button type='submit'>Cadastrar</button>
		</form>

		<br><button><a href="index.php">Voltar para a página inicial</a></button>

		<?php

			if(isset($_GET['codigo_disc']) && isset($_GET['nome'])){
				$codigo = $_GET['codigo_disc'];
				$nomeD = $_GET['nome'];
				$codProf = $_GET['professores'];

				$sql = "insert into disciplina values('$codigo', '$nomeD', '$codProf')";

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