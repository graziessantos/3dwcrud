<div class="excluir-usuario">
    <h2>Excluir Usuário</h2>

    <form action="/3dwcrud/Controle/ControleUsuario.php" method="GET"
          onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');">
        <input type="hidden" name="ACAO" value="excluir">

        <div>
            <label for="idex_exc">ID do usuário:</label>
            <input type="number" id="idex_exc" name="idex" placeholder="Digite o ID" min="1" required>
        </div>

        <button type="submit">Excluir</button>
    </form>
</div>