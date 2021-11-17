<?php
@ini_set('display_errors', '1');
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$id = $_GET["id"];
settype($id, "integer");

$servername="localhost";
$username="root";
$conn=new mysqli($servername,$username,"");
mysqli_select_db($conn,"bdweb");

$resultado = mysqli_query($conn,"select * from tabela where id_tabela = $id");
$dados     = mysqli_fetch_array($resultado);
if($dados["sexo"] == "M") {
	$checkedM   = "checked=\"checked\"";
	$checkedF   = "";
} else {
	$checkedM   = "";
	$checkedF   = "checked=\"checked\"";
}	
mysqli_close($conn);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8"/>
<meta http-equiv="Content-Type"/>
<title>Cadastro</title>
</head>

<body>
<form id="form1" name="form1" method="get" action="salvar_edicao.php">
<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
  <h2 align="center"><strong>Cadastro PHP/MYSQL </strong></h2>
  <table width="390" border="1" align="center">
    <tr>
      <td width="165">Nome</td>
      <td width="209"><input name="nome" type="text" id="nome" value="<?php echo $dados["nome"];?>" /></td>
    </tr>
    <tr>
      <td>Sobrenome</td>
      <td><input name="sobrenome" type="text" id="sobrenome" value="<?php echo $dados["sobrenome"];?>" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input name="email" type="text" id="email" value="<?php echo $dados["email"];?>" /></td>
    </tr>    
    <tr>
      <td>Sexo</td>
      <td><input name="sexo" type="radio" value="M" <?php echo $checkedM;?> /> 
        Masculino 
        <input name="sexo" type="radio" value="F" <?php echo $checkedF;?> /> 
        Feminino </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Gravar" style="cursor:pointer"/></td>
    </tr>
  </table>
</form>
<center>
	<h3><a href="index.html">Voltar</a></h3>
</center>
</body>
</html>