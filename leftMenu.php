<?php
    if(isset($_SESSION["sistema"]["nome"])){
        $usuarioLogado = $_SESSION["sistema"]["nome"];

    }

?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"style="opacity: .8">
        <span class="brand-text font-weight-light">Faster Food Service</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" onblur="limitarTexto(<?=$usuarioLogado?>, 5)">Logado Como: <?php echo $usuarioLogado;?></a><!-- arrumar-->
            </div>
        </div>
      <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-pencil-square-o"></i>
                        <p>Cadastros
                        <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="home.php?fd=cadastro&pg=usuario" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Usuário</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="home.php?fd=cadastro&pg=produto" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Produto</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="home.php?fd=cadastro&pg=tamanho" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Tamanho</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="home.php?fd=cadastro&pg=pizza" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Pizza</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="home.php?fd=cadastro&pg=materiaprima" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Matéria-Prima</p>
                            </a>
                        </li>
                    </ul>
                </li><!-- fim do Charts -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-pie-chart"></i>
                        <p>Relatórios
                        <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>...</p>
                            </a>
                        </li>
                    </ul>
                </li><!-- fim do Cadastro -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-list"></i>
                        <p>Listas
                        <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="home.php?fd=listas&pg=usuario" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Usuário</p>
                            </a>
                        </li>
                    </ul>
                </li><!-- listas -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-hand-pointer-o"></i>
                        <p>Pedidos
                        <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>...</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>