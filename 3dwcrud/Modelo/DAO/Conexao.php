<?php
abstract class Conexao {

    public static function getInstance() {
        $dsn = 'mysql:host=localhost;port=3307;dbname=bdpoo';
        $user = 'root';
        $pass = '';
        try {
            $pdo = new PDO($dsn, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $exc) {
            echo 'Erro ao conectar: ' . $exc->getMessage();
            exit;
        }
    }
}