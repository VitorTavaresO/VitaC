<?php
require_once("connection.php");
$idsponsorspublic = $_POST['idpublic'];
$url = $_POST['url'];

$uploaddir = 'img/uploads/sponsors/';
$uploaddirN = 'img/uploads/sponsors/';
$uploadfile = $_FILES['userfile'];
$uploadfileN = $uploaddirN.basename($_FILES['userfile']['name']);


$sql ="UPDATE sponsorsspost SET imagem = '$uploadfileN', url ='$url' WHERE idsponsorspublic = '$idsponsorspublic';";


$query = mysqli_query($connection,$sql);

if (move_uploaded_file($uploadfile["tmp_name"], "$uploaddir".$uploadfile["name"])) { 
echo "Arquivo enviado com sucesso!"; 
} 
else { 
echo "Erro, o arquivo n&atilde;o pode ser enviado."; 
}           
mysqli_close($connection);

header("Location: sponsors.php");

?>