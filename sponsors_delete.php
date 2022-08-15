<?php
 require_once("connection.php");
 $idsponsorspublic = $_GET["idpublic"];

 $sql ="DELETE FROM sponsorsspost WHERE idsponsorspublic = $idsponsorspublic;";

  $query = mysqli_query($connection,$sql);
   
  mysqli_close($connection);

  header("Location: sponsors.php");


?>