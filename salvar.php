<?php
	@ini_set('display errors','1');
	error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
	
	$nome = $_POST["nome"];
	$sobrenome = $_POST["sobrenome"];
	$email = $_POST["email"];
	$sexo = $_POST["sexo"];
	
	//DAO Data Access Object
	$servername = "localhost";
	$username = "root";
	$conn = new mysqli($servername, $username, "");

	//Conectar o banco de dados: bdweb
	mysqli_select_db($conn, "bdweb");
	mysqli_query($conn,"INSERT INTO tabela (id_tabela, nome, sobrenome, email, sexo)
	VALUES(NULL,'$nome', '$sobrenome', '$email','$sexo')");
	mysqli_close($conn);
	echo "Salvo com Sucesso <br />";
	

?>
<br></br><a href="index.html">Voltar...</br>