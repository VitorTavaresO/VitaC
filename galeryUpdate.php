<?php
    // A sessão precisa ser iniciada em cada página diferente
    if (!isset($_SESSION)) session_start();

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Vita C Fitness</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/business-casual.min.css" rel="stylesheet">

    </head>

    <body>

    <?php if (isset($_SESSION['UsuarioID'])) {
    
    ?>
            <li>
                <a href="newsCreate.php"><img class="Profile" src="img/Plus.png" width="25" height="25"></a>
            </li>
    
        <?php } ?>

    <?php require_once("menu.php")?>

    <!-- Header -->

    <!-- Page Content -->
    <div class="container">

    <?php

        $idpublic = $_GET["idpublic"];
        $url = $_GET["url"];
        $image = $_GET["image"];



    ?>

<div class="container">

<section class="page-section about-heading">
    <div class="container">
      <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="img/UpdatesPic.jpg" alt="">
      <div class="about-heading-content">
        <div class="row">
          <div class="col-xl-9 col-lg-10 mx-auto">
            <div class="bg-faded rounded p-5">
              <h2 class="section-heading mb-4">
              <form action ="sponsors_edit.php"method="POST" enctype="multipart/form-data" id="form-publicar">
              <input type="hidden" name="idpublic" value="<?=$idpublic?>">
                 <h2> Imagem: </h2><input value="<?=$image?>" type="file" name="userfile" class=""><br><br><br> 
                 </h2>
                 <h2>Link:</h2><pre><textarea type="text" name="url" class="adminTextCamp2" rows="100000"><?=$url?></textarea></pre>
                 <input type="submit" value="Enviar" class="btn btn-primary btn-xl">
                 <input type="button" value="Voltar" class="btn btn-primary btn-xl" onClick="history.go(-1)">
                 <input type="hidden" name="env" value="post">
                 <?php
                print "<article>";
                print "<a href='sponsors_delete.php?idpublic=$idpublic'><input type='button' value='Excluir' class='btn btn-primary btn-xl2'></a>";
                print "</article>";
                    ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- /.row -->

</div>
    <?php require_once("footer.php")?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>

    </html>