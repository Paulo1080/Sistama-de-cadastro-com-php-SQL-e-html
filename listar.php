<?php
	@ini_set('display errors','1');
	error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
		
	//DAO Data Access Object
	$servername = "localhost";
	$username = "root";
	$conn = new mysqli($servername, $username, "");

	//Conectar o banco de dados: bdweb
	mysqli_select_db($conn, "bdweb");
	$resultado = mysqli_query($conn,"select * from tabela order by id_tabela");
	mysqli_close($conn);
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Listar tabela</title>
	<head>
	<body>
<?php
	if( mysqli_num_rows($resultado) < 1){
		exit;
	}
?>
	<table width="500" border="1" align="center">
		<tr>
			<th>ID</th>
			<th>NOME</th>
			<th>SOBRENOME</th>
			<th>EMAIL</th>
			<th>SEXO</th>
		<tr>
		
<?php
	while($list = mysqli_fetch_array($resultado)){
		$id= $list["id_tabela"];
		$nome=$list["nome"];
		$sobrenome=$list["sobrenome"];
		$email=$list["email"];
		$sexo=$list["sexo"] == "M" ? "Masculino" : "Feminino";         // (:) = if
		echo"
		<tr>
			<td>$id</td>
			<td>$nome</td>
			<td>$sobrenome</td>
			<td>$email</td>
			<td>$sexo</td>
			<td><a href=\"editar.php?id=$id\">[Editar]</a>
				<a href=\"excluir.php?id=$id\">[Excluir]</a></td>
		</tr>\n";
	}
?>
	</table>
	
	<br></br><a href="index.html">Voltar...</br>
</body>
</html>

