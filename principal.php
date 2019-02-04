<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>150</h3>
                <p>Novas Vendas</p>
            </div>
            <div class="icon">
                <i class="fas fa-shopping-bag"></i>
            </div>
            <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
          <!-- ./col -->
    <div class="col-lg-3 col-6">
            <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>75<sup style="font-size: 20px"><!-- local para por expoentes --></sup></h3>
                <p>Vendas Realizadas</p>
            </div>
            <div class="icon">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
          <!-- ./col -->
    <div class="col-lg-3 col-6">
            <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
            <h3>44</h3>

            <p>Novos Usuários Cadastrados</p>
        </div>
            <div class="icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
          <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>65</h3>
                    <p>Pizzas Fabricadas</p>
                </div>
            <div class="icon">
                <i class="fas fa-chart-pie"></i>
            </div>
            <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
          <!-- ./col -->
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-6">
        <h3 class="text-center">Top Pizzas - Diário</h3>
        <hr>
        <table class="table table-bordered table-striped" id="tabela">
            <thead>
                <tr>
                    <td class="text-center">Nome</td>
                    <td class="text-center">Quantidade Fabricada</td>
                </tr>
            </thead>
        <?php
            include "./app/conecta.php";
            $sql = "SELECT * FROM usuario WHERE not tipoUsuario = 3";
            $consulta = $pdo->prepare($sql);
            $consulta->execute();
            while($dados = $consulta->fetch(PDO::FETCH_OBJ)){
                $id = $dados->id;
                $nome = $dados->nome;
                $tipoUsuario = $dados->tipoUsuario;

                echo "<tr>
                        <td class='text-center'>$nome <i class='fas fa-crown'></i></td>
                        <td class='text-center'>$tipoUsuario</td>
                    </tr>";
            }
        ?>
	    </table>
    </div> <!-- fim do col md 6 -->
</div><!-- fim do row -->
