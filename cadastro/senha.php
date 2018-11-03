<form method="post" action="home.php?fd=salvar&pg=senha" style="padding: 50px;">
    <div class="form-group">
        <label for="senha">Senha Atual: </label>
        <input type="password" name="senhaAntiga" class="form-control" required>
    </div>    
    <div class="form-group">
        <label for="senhaNova">Senha Nova: </label>
        <input type="password" name="senhaNova" class="form-control" required>
    </div>    
    <div class="form-group">
        <label for="senhaConfirma">Senha Confirma: </label>
        <input type="password" name="senhaConfirma" class="form-control" required>
    </div>
    <div class="card-footer text-center mt-5">
    	<button type="submit" class="btn btn-primary">Alterar Senha</button>
	</div>
</form>