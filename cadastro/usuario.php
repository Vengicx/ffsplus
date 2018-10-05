
<div class="card-header">
    <h3 class="card-title text-center">Cadastro de Usuário</h3>
</div>
<form role="form">
    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" placeholder="Digite o nome do Usuário">
    </div>
    <div class="form-group">
        <label for="login">Login:</label>
        <input type="text" class="form-control" placeholder="Digite o login">
    </div>
    <div class="form-group">
        <label for="senha">Senha:</label>
        <input type="password" class="form-control" placeholder="Digite a senha">
    </div>
    <div class="form-group">
        <label for="email">E-Mail:</label>
        <input type="email" class="form-control" placeholder="Digite o E-Mail">
    </div>
    <div class="form-group"><!-- select dos tipo de Usuários -->
        <label>Tipo de Usuário</label>
            <select multiple class="form-control">
                <option>option 1</option>
                <option>option 2</option>
                <option>option 3</option>
                <option>option 4</option>
                <option>option 5</option>
            </select>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cadastrar/Alterar</button>
    </div>
</form>