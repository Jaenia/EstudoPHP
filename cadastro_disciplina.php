<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>CAO - Controle Acadêmico Online - Cadastro de disciplina</title>
	</head>
	<body>
		<h2>Cadastro de aluno</h2>

		<form action="cadastro_disciplina.php" method="get">
			<label>Nome:<input type="text" name="nomeDisc"></label><br><br>
			<label>Código:<input type="text" name="codDisc"></label><br><br>
			<label>Selecione o professor da disciplina:</label><br><br>
			<!-- os professores podem aparecer em um select -->
			<button type="submit">Cadastrar</button>
		</form>

		<?php
			//listar os professores dinamicamente

			//realizar o cadastro do professor
		?>

	</body>
</html>