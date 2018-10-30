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

  <link type="text/javascript" href="js/bootstrap-inputmask.min.js">

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
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">...</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
    
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
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/daterangepicker/daterangepicker.js"></script>
<script src="js/adminlte.js"></script>

</body>
</html>
