<?php
require_once __DIR__ . '/../Modelo/DAO/ClassUsuarioDAO.php';

$dao = new UsuariosDAO();
$usuarios = $dao->listarUsuarios();
?>

<div class="lista-usuarios">
    <h2>Usuários cadastrados</h2>

    <?php if (!empty($usuarios)) : ?>
        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario) : ?>
                    <tr>
                        <td><?= htmlspecialchars($usuario['idUsuario']); ?></td>
                        <td><?= htmlspecialchars($usuario['nome']); ?></td>
                        <td><?= htmlspecialchars($usuario['email']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>Nenhum usuário cadastrado.</p>
    <?php endif; ?>
</div>