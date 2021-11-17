<?php
	//tratativas de erros, warning e problemas em PHP
	@ini_set('display_errors', '1');
	error_reporting(E_ALL &~E_NOTICE &~ E_DEPRECATED);
	
	//DAO: Data Access Object
	$servername="localhost";
	$username="root";
	$conn=new mysqli($servername,$username,"");
	
	//Pegar o ID que veio pelo método GET de listar.php.
	//excluir.php?id="X",
	$id = $_GET["id"];
	settype($id,"integer");
	
	
	//Conectar o banco de dados: bdweb
	mysqli_select_db($conn,"bdweb");
	mysqli_query($conn,"delete from tabela where id_tabela = $id");
	mysqli_close($conn);
	header("Location: listar.php");



?>