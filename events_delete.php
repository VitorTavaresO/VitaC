<?php
 require_once("connection.php");
 $ideventspublic = $_GET["idpublic"];

 $sql ="DELETE FROM eventspost WHERE ideventspublic = $ideventspublic;";

  $query = mysqli_query($connection,$sql);
   
  mysqli_close($connection);

  header("Location: events.php");


?>