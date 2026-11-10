<div class="alterar-usuario">
    <h2>Alterar Usuário</h2>

    <form action="/3dwcrud/Controle/ControleUsuario.php?ACAO=alterar" method="POST">
        <div>
            <label for="idex_alt">ID do usuário:</label>
            <input type="number" id="idex_alt" name="idex" placeholder="Digite o ID" min="1" required>
        </div>

        <div>
            <label for="nome_alt">Novo nome:</label>
            <input type="text" id="nome_alt" name="nome" placeholder="Digite o novo nome" required>
        </div>

        <div>
            <label for="email_alt">Novo e-mail:</label>
            <input type="email" id="email_alt" name="email" placeholder="Digite o novo e-mail" required>
        </div>

        <button type="submit">Alterar</button>
    </form>
</div>