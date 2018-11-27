<style>
    .card{
        float: left;
        margin: 10px;
    }

    .btn-warning{
        float: right;
    }

</style>
</head>
<body>
    <hr>
    <?php include_once "app/conecta.php";

    $sql = ("SELECT pe.id AS id, u.nome AS nome_usuario, p.nome AS nome_produto, t.nome AS nome_tamanho, horaPedido, a.situacao AS situacao, pe.andamento_id AS andamento_id FROM pedido pe
    INNER JOIN usuario u ON usuario_id = u.id
    INNER JOIN produto p ON produto_id = p.id
    INNER JOIN tamanho t ON tamanho_id = t.id
    INNER JOIN andamento a ON andamento_id = a.id WHERE NOT andamento_id = 3 ");
    $consulta = $pdo->prepare($sql);
        
    $consulta->execute();

        
    $c = 0; //contador 
    while($dados = $consulta->fetch(PDO::FETCH_OBJ)){//ele só vai entrar no while se o $dados for verdadeiro
        $id = $dados->id;
        $usuario_nome = $dados->nome_usuario;
        $produto_nome = $dados->nome_produto;
        $tamanho_nome = $dados->nome_tamanho;
        $horaPedido = $dados->horaPedido;
        $situacao = $dados->situacao;
        $andamento = $dados->andamento_id;
            
        if($andamento == "1"){
            $botao = "<a href='home.php?fd=salvar&pg=prepararPedido&id=$id' class='btn btn-primary'>Preparar</a>";
            $botaoWarning = "";

        }elseif($andamento == "2"){
            $botao = "<a href='home.php?fd=salvar&pg=prepararPedido&id=$id' class='btn btn-success'>Pronto!</a>";
            $botaoWarning = "<a href='#' class='btn btn-warning'>Preparando...</a>";

        }

        echo "<div class='card bg-secondary text-white' style='width: 18rem;'>
                $botaoWarning
                <div class='card-body'>
                    <h5 class='card-title text-center'>$produto_nome</h5>
                    <hr>
                    <p class='card-text'>Pedido Nº: $id</p>
                    <p class='card-text'>Mesa/Cliente: $usuario_nome</p>
                    <p class='card-text'>Tamanho: $tamanho_nome</p>
                    <p class='card-text'>Hora do Pedido: $horaPedido</p>
                    $botao
                </div>
            </div>";

        $c = 1; //se ele entrar no while então ele valerá 1
        
    } //fim do while

    if($c == 0){//se ele valer 0 é pq ele não entrou no while, logo, não encontrou nada. VALEU KAWASSAKI-SANNNNN!
        echo "Nenhum pedido pendente";
    }

        ?>
  </div>