<?php
    if(isset($_SESSION["sistema"]["nome"])){
        $usuarioLogado = $_SESSION["sistema"]["nome"];

    }

?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="home.php" class="brand-link">
        <img src="imagens/logo.png" alt="Logo Faster Food Service" class="brand-image img-circle elevation-3"style="opacity: .8">
        <span class="brand-text font-weight-light">Faster Food Service</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <i class="fa fa-user"></i>
            </div>
            <div class="info">
                <a href="#" onblur="limitarTexto(<?=$usuarioLogado?>, 5)"> <?php echo $usuarioLogado;?></a><!-- arrumar-->
            </div>
        </div>
      <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-user"></i>
                        <p>Usuário
                        <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="home.php?fd=usuario&pg=cadastro" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cadastro</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="home.php?fd=usuario&pg=listar" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lista</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-hand-point-up"></i>
                        <p>Pedidos
                        <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="home.php?fd=pedido&pg=cadastro" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Efetuar Pedido</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="home.php?fd=pedido&pg=cozinha" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listar Pedido</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="home.php?fd=pedido&pg=consulta" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Consultar Pedidos</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fab fa-product-hunt"></i>
                        <p>Produto
                        <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="home.php?fd=produto&pg=cadastro" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cadastro</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="home.php?fd=produto&pg=listar" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lista</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>Pizza
                        <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="home.php?fd=pizza&pg=cadastro" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cadastro</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="home.php?fd=pizza&pg=listar" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lista</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-lemon"></i>
                        <p>Matéria-Prima
                        <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="home.php?fd=materiaprima&pg=cadastro" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cadastro</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="home.php?fd=materiaprima&pg=listar" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lista</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>Cliente
                        <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="home.php?fd=cliente&pg=cadastro" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cadastro</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="home.php?fd=cliente&pg=listar" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lista</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-expand-arrows-alt"></i>
                        <p>Tamanho
                        <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="home.php?fd=tamanho&pg=cadastro" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cadastro</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="home.php?fd=tamanho&pg=listar" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lista</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-city"></i>
                        <p>Cidade
                        <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="home.php?fd=cidade&pg=cadastro" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cadastro</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="home.php?fd=cidade&pg=listar" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lista</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-flag"></i>
                        <p>Estado
                        <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="home.php?fd=estado&pg=cadastro" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cadastro</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="home.php?fd=estado&pg=listar" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lista</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-utensils"></i>
                        <p>Garçom
                        </p>
                    </a>
                </li>
                <!--<li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-edit-square-o"></i>
                        <p>Cadastros
                        <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="home.php?fd=cadastro&pg=usuario" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Usuário</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="home.php?fd=cadastro&pg=produto" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Produto</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="home.php?fd=cadastro&pg=cliente" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cliente</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="home.php?fd=cadastro&pg=tamanho" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tamanho</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="home.php?fd=cadastro&pg=pizza" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pizza</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="home.php?fd=cadastro&pg=materiaprima" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Matéria-Prima</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="home.php?fd=cadastro&pg=estadocidade" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Estado/Cidade</p>
                            </a>
                        </li>
                    </ul>
                </li> fim do Charts -->
                <!--<li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-pie-chart"></i>
                        <p>Relatórios
                        <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>...</p>
                            </a>
                        </li>
                    </ul>
                </li> fim do Cadastro -->
                <!--<li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-list"></i>
                        <p>Listas
                        <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="home.php?fd=listas&pg=usuario" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Usuários</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="home.php?fd=listas&pg=produto" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Produtos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="home.php?fd=listas&pg=cliente" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Clientes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="home.php?fd=listas&pg=materiaprima" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Matéria-Prima</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="home.php?fd=listas&pg=tamanho" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tamanhos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="home.php?fd=listas&pg=estadocidade" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Estado/Cidade</p>
                            </a>
                        </li>
                    </ul>
                </li> listas -->
                <!-- <li class="nav-item has-treeview">
                    <a href="https://github.com/Vengicx/ffsplus/" target="_blank" class="nav-link">
                        <i class="nav-icon fa fa-github"></i>
                        <p>GitHub
                        <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                </li>fim do github -->
            </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>