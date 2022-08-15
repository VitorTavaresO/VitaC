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
                          <a href="sponsorsCreate.php"><img class="Profile" src="img/Plus.png" width="25" height="25"></a>
                          <a href="sponsorsSelect.php"><img class="Profile" src="img/EditPic.png" width="25" height="25"></a>
                        </li>
               
                    <?php } ?>
              
                    
              
                <?php require_once("menu.php")?>
              
               <!-- Header -->
               <hr class="mt-2 mb-5">
              </header>
              
              <section class="page-section portfolio" id="portfolio">
                  
                          <div class="container">
                              <!-- Portfolio Section Heading-->
                              <br>
                              <br>
                              <br>
                              <br>
                              <div class="divider-custom">
                                  <div class="divider-custom-line"></div>
                                  <div class="divider-custom-icon"><i class="fas fa-money-check-alt"></i></div>
                                  <div class="divider-custom-line"></div>
                              </div>
                              <!-- Portfolio Grid Items-->
                              <div class="row">
                              <?php
                  require_once("connection.php");
                  $sql = "SELECT * FROM sponsorsspost ORDER BY idsponsorspublic DESC;";
                  $query = mysqli_query($connection, $sql);
                  $cadastrates = mysqli_num_rows($query);
              
              
              
              
                  while($linha = mysqli_fetch_array($query)){
                  $idpublic = $linha[0];
                  $image = $linha[2];
                  $url = $linha[3];
              
                  @mysqli_close($connection);
              
                 ?>
             <?php
                print "<article>";
                print "<a href='sponsorsUpdate.php?idpublic=$idpublic&image=$image&url=$url'>";
                print "</article>";
              ?>
              <div class='col-md-6 col-lg-4 mb-5'>
                                  <div class="portfolio-item mx-auto">
                                          <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                              <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                                          </div><img class="img-fluid" src=<?="$image"?>></a>
                                      </div>
                                  </div>
              <?php }?>
                  </div>
                  </div>
                      </section>
              
              
                <!-- Bootstrap core JavaScript -->
                <script src="vendor/jquery/jquery.min.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
              
              </body>
              <?php require_once("footer.php")?>
              
              </html>