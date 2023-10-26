<h1>Novo Usuário</h1>
<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="" placeholder="Informe seu nome" autofocus>
    </div>
    <br>
    <div>
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="" placeholder="Informe o seu CPF">
    </div>
    <br>
    <div>
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="" placeholder="Informe seu email">
    </div>
    <br>
    <div>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="" placeholder="Informe sua senha">
    </div>
    <br>
    <div>
        <label for="telefone">Telefone:</label>
        <input type="number" name="telefone" id="" placeholder="Informe seu telefone">
    </div>
    <div>
        <button type="submit" class="btn">Enviar</button>
    </div>
</form>