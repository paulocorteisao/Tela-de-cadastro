<?php

require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
    $senha = $_POST["senha"];

    if (empty($nome) || empty($email) || empty($senha)) {
        die("Preencha todos os campos!");
    }

    $senha = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, email, senha)
            VALUES (?, ?, ?)";

    if ($conexao->execute_query($sql, [$nome, $email, $senha])) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao realizar o cadastro!";
    }

} else {
    echo "Acesso inválido!";
}

?>
