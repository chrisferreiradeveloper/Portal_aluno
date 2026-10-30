<?php
session_start();
require_once __DIR__ . "/includes/funcoes.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: cadastro.php");
    exit;
}

$nome = limparTexto(filter_input(INPUT_POST, "nome") ?? "");
$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
$idade = filter_input(INPUT_POST, "idade", FILTER_VALIDATE_INT);

$erro = "";

if ($nome === "") {
    $erro = "O nome não pode estar vazio.";
} elseif ($email === false || $email === null || !validarEmail($email)) {
    $erro = "Informe um e-mail válido.";
} elseif ($idade === false || $idade === null || $idade <= 0) {
    $erro = "A idade deve ser um número inteiro maior que zero.";
}

if ($erro !== "") {
    $_SESSION["erro"] = $erro;
    $_SESSION["dados_anteriores"] = [
        "nome" => $nome,
        "email" => $_POST["email"] ?? "",
        "idade" => $_POST["idade"] ?? ""
    ];
    header("Location: cadastro.php");
    exit;
}

$_SESSION["aluno"] = [
    "nome" => $nome,
    "email" => $email,
    "idade" => $idade
];
$_SESSION["mensagem"] = "Cadastro realizado com sucesso!";
header("Location: resultado.php");
exit;
