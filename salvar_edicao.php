<?php
@ini_set('display_errors', '1');
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

$nome      = $_GET["nome"];
$sobrenome = $_GET["sobrenome"];
$email     = $_GET["email"];
$sexo      = $_GET["sexo"]; 

$id        = $_GET["id"];

settype($id, "integer");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdweb";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo $nome;
//echo $sobrenome;
//echo $email;
//echo $sexo;
//echo $id;
$sql = "UPDATE tabela SET nome='$nome', sobrenome='$sobrenome', email='$email', sexo = '$sexo' WHERE tabela.id_tabela =$id";

if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
<br><a href="index.html">Voltar....</a></br>