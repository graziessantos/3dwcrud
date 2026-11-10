<?php
require_once __DIR__ . '/../Modelo/ClassUsuario.php';
require_once __DIR__ . '/../Modelo/DAO/ClassUsuarioDAO.php';

$id =@$_POST['idex'];
$nome =@$_POST['nome'];
$email =@$_POST['email'];
$acao =@$_GET['ACAO'];

$novoUsuario = new ClassUsuario();
$novoUsuario->setIdUsuario($id);
$novoUsuario->setNome($nome);
$novoUsuario->setEmail($email);

$classUsuarioDAO = new UsuariosDAO();
switch ($acao) {
    case "cadastrarUsuario":
        $usuario = $classUsuarioDAO->cadastrar($novoUsuario);
        if($usuario >= 1){
            header('Location: ../index.php?MSG= Cadastro realizado com sucesso!');
        } else {
            header('Location: ../index.php?MSG= NÃO foi cadastrado!');
        }
        break;
    case "alterar":
        $usuario = $classUsuarioDAO->alterarUsuario($novoUsuario);
        if($usuario >= 1){
            header('Location: ../index.php?MSG= Alteração realizada com sucesso!');
        } else {
            header('Location: ../index.php?MSG= NÃO foi alterado!');
        }
        break;
    case "excluir":
        if(isset($_GET['idex'])){
            $usuario = $_GET['idex'];
            $classUsuarioDAO = new UsuariosDAO();
            $us = $classUsuarioDAO->excluirUsuario($usuario);
            if ($us == TRUE){
                header('Location: ../index.php?MSG= Exclusão realizada com sucesso!');
            } else {
                header('Location: ../index.php?MSG= NÃO foi excluído!');
            }           
        }    
        break;
        default:
        break;
}