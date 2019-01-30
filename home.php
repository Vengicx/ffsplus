<?php
    session_cache_expire(5);
    session_start();

    if (!isset($_SESSION["sistema"]["id"])) {
        header("Location: index.php");
        exit;
        
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Faster Food Service</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--<link rel="stylesheet" href="plugins/css/font-awesome.min.css">-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" 
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link rel="stylesheet" href="plugins/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="plugins/css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <script src="plugins/js/jquery.min.js"></script>
  <script src="plugins/js/jquery.dataTables.min.js"></script>
  <script src="plugins/js/dataTables.bootstrap4.js"></script>


</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php 
      //Navbar 
      include "topMenu.php";

      //Main Sidebar Container 
      include "leftMenu.php"; 
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <br>
    <br>
    <!-- Main content -->
    <section class="content" style="border: 10px !important;">
    
    <?php
    $fd = $pg = "";
            
            if(isset($_GET["fd"])){
                $fd = trim ($_GET["fd"]);
            }

            if(isset($_GET["pg"])){
                $pg = trim ($_GET["pg"]);
            }

            if (empty ($pg)){
                $page = "principal.php";

            }else{
                $page = $fd."/".$pg.".php";

            }
            if(file_exists($page)){
                include $page;

            }else{
                include "erro.php";
                
            }

      ?>
    </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
      <?php include "footer.php"; ?>
  </footer>
  <!-- /.control-sidebar -->
</div>
<!-- nao sei -->
<script src="plugins/js/bootstrap.bundle.min.js"></script>4
<!-- inputmask das coisas -->
<script src="plugins/js/bootstrap-inputmask.min.js"></script>
<!-- data tables -->

<!-- funcoes do layout -->
<script src="plugins/js/adminlte.js"></script>

</body>
</html>
