<div class="cadastro-usuario">
    <h2>Cadastro de Usuário</h2>

    <form action="/3dwcrud/Controle/ControleUsuario.php?ACAO=cadastrarUsuario" method="POST">
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" placeholder="Digite o nome" required>
        </div>

        <div>
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" placeholder="Digite o e-mail" required>
        </div>

        <button type="submit">Cadastrar</button>
    </form>
</div>