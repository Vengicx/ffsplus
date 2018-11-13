<?php
    if ( !isset ( $page ) ) {
        header("Location: ./index.php");
        exit;
    }


?>
<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="home.php" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto nav-dropdown">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="menu-user" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Usuário
            <i class="fa fa-user-circle"></i></a>
            <div class="dropdown-menu" style="border-right: 100px;">
                <a class="nav-link" href="sair.php"><i class="fa fa-power-off"></i> Logout</a>
                <a class="nav-link" href="home.php?fd=cadastro&pg=senha"><i class = "fa fa-key"></i> Alterar Senha</a>
            </div>
        </li>
    </ul>
  </nav>

  <!-- /.navbar -->