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

    $sql = ("SELECT 
                pe.id AS id_pedido,
                us.nome AS nome_usuario,
                ta.nome AS nome_tamanho,
                pr.nome AS nome_produto,
                p_a.hora AS hora_inicio,
                an.situacao AS nome_andamento 
            
            FROM pedido pe
            INNER JOIN usuario us ON us.id = pe.usuario_id
            INNER JOIN tamanho ta ON ta.id = pe.tamanho_id
            INNER JOIN produto pr ON pr.id = pe.produto_id
            INNER JOIN pedido_andamento p_a ON p_a.idPedido = pe.id
            INNER JOIN andamento an ON an.id = p_a.idAndamento
            WHERE NOT an.id = 3");
    $consulta = $pdo->prepare($sql);
        
    $consulta->execute();
        
    $c = 0; //contador 
    while($dados = $consulta->fetch(PDO::FETCH_OBJ)){//ele só vai entrar no while se o $dados for verdadeiro
        $id = $dados->id_pedido;
        $usuario_nome = $dados->nome_usuario;
        $produto_nome = $dados->nome_produto;
        $tamanho_nome = $dados->nome_tamanho;
        $horaPedido = $dados->hora_inicio;
        $situacao = $dados->nome_andamento;
            
        if($situacao == "Pedido Realizado"){
            $botao = "<a href='home.php?fd=pedido&pg=prepararPedido&id=$id' class='btn btn-primary'>Preparar</a>";
            $botaoWarning = "";

        }elseif($situacao == "Pedido em Produção"){
            $botao = "<a href='home.php?fd=pedido&pg=prepararPedido&id=$id' class='btn btn-success'>Pronto!</a>";
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