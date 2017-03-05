<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>CAO - Controle Acadêmico Online - Cadastro de aluno</title>
	</head>
	<body>
		<h2>Cadastro de aluno</h2>

		<form action="cadastro_aluno.php" method="get">
			<label>Matrícula:<input type="text" name="matricula_aluno" autofocus></label><br><br>
			<label>Nome:<input type="text" name="nome"></label><br><br>
			<label>Selecione a(s) disciplina(s):</label><br>
	
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
			$sql = "select codigo_disc, nome from disciplina";

			foreach($bd->query($sql) as $row){
				echo "<input type='checkbox' name='disciplinas[]' value='".$row['codigo_disc']."'>".$row['nome']."<br>";
			}
		?>

			<br><button type="submit">Cadastrar</button>
		</form>

		<br><button><a href="index.php">Voltar para a página inicial</a></button>

		<?php
			if(isset($_GET['matricula_aluno']) && isset($_GET['nome']) && isset($_GET['disciplinas'])){
				$mat = $_GET['matricula_aluno'];
				$nome = $_GET['nome'];
				$disciplinas = $_GET['disciplinas'];

				$sql = "insert into aluno values ('$mat', '$nome')";

				$res = $bd->exec($sql);

				foreach($disciplinas as $val){
					$sql = "insert into cursa values ('$mat', '$val')";

					$res = $bd->exec($sql);

					if($res > 0){
						$deuCerto = true;
					}else{
						$deuCerto = false;
					}
				}

				if($deuCerto){
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