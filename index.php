<style>
body {
    background: url('imagens/bgWood.jpg') fixed no-repeat;

}

#cardLogin {
        margin: 100px auto;
        width: 300px;
        text-align: center;
        
}

</style>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faster Food Service - Area Restrita</title>
    <link rel="stylesheet" href="bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/adminlte.min.css">
</head>
<body>
    <div id="cardLogin">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <form action="verificar.php" method="post">
                    <h4><i class="fa fa-warning"></i> Área Restrita</h4>
                    <div class="form-group">
                        <label for="loginUsuario">Usuário</label>
                        <input type="text" name="loginUsuario" class="form-control" placeholder="Digite seu usuário" required value="admin">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" class="form-control" placeholder="Digite sua senha" value="f@ster123" required>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Entrar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>