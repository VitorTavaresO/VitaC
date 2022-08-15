<?php
 require_once("connection.php");
 $idnewspublic = $_GET["idpublic"];

 $sql ="DELETE FROM newspost WHERE idnewspublic = $idnewspublic;";

  $query = mysqli_query($connection,$sql);
   
  mysqli_close($connection);

  header("Location: news.php");


?>