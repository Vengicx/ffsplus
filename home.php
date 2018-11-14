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

  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/adminlte.min.css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

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
<!-- ./wrapper -->

<script src="js/jquery.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- nao sei -->
<script src="js/bootstrap.bundle.min.js"></script>4
<!-- inputmask das coisas -->
<script src="js/bootstrap-inputmask.min.js"></script>
<!-- data tables -->
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<!-- funcoes do layout -->
<script src="js/adminlte.js"></script>

</body>
</html>
