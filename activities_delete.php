<?php
 require_once("connection.php");
 $idactivitiespublic = $_GET["idpublic"];

 $sql ="DELETE FROM activitiespost WHERE idactivitiespublic = $idactivitiespublic;";

  $query = mysqli_query($connection,$sql);
   
  mysqli_close($connection);

  header("Location: activities.php");


?>