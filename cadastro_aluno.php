<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>CAO - Controle Acadêmico Online - Cadastro de aluno</title>
	</head>
	<body>
		<h2>Cadastro de aluno</h2>

		<form action="cadastro_aluno.php" method="get">
			<label>Nome:<input type="text" name="nomeAlu"></label><br><br>
			<label>Matrícula:<input type="text" name="matriculaAlu"></label><br><br>
			<label>Selecione a(s) disciplina(s):</label><br><br>
			<!-- O checkbox com as disciplinas será criado dinamicamente -->
			<button type="submit">Cadastrar</button>
		</form>

		<?php
			//exibir o checkbox das disciplinas dinamicamente

			//realizar o cadastro do aluno 
		?>

	</body>
</html>