<?php
require "conecta.php";
                        // PARÂMETROS
function inserirUsuario($conexao, $nome, $email, $senha, $tipo){
    /* Montando uma variável com o comando SQL de INSERT
    e com os dados (parâmetros) recebidos pela função */
    $sql = "INSERT INTO usuarios(nome, email, senha, tipo)
    VALUES('$nome', '$email', '$senha', '$tipo')";

    /* Executando o comando SQL */
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

function lerUsuarios($conexao){
    // Comando SQL para fazer a leitura de dados (SELECT)
    $sql = "SELECT id, nome, email, tipo FROM usuarios ORDER BY nome";
    
    // Execução do comando e armazenamento do resultado da consulta/query
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    // Retornamos o resultado da query transformando em array associativo.
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function lerUmUsuario($conexao, $id){
    // Montamos o sql contendo o ID do usuário que queremos carregar
    $sql = "SELECT * FROM usuarios WHERE id = $id";

    // Executamos e guardamos o resultado da consulta
    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

    // Retornando o resultado transformado em UM array com os dados
    return mysqli_fetch_assoc($resultado);
}

function atualizarUsuario($conexao, $id, $nome, $email, $senha, $tipo){
    $sql = "UPDATE usuarios SET
                nome = '$nome',
                email = '$email',
                senha = '$senha',
                tipo = '$tipo'
                WHERE id = $id"; // NÃO ESQUEÇA DESSA BAGAÇA!

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

function excluirUsuario( $conexao, $id){
    $sql = "DELETE FROM usuarios WHERE id = $id";

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}

function login($id, $nome, $tipo){
    /* Criação de variáveis de sessão
    Recursps que ficam disponíveis para uso durante toda a duração da sessão, 
    ou seja, enquanto o navegador não for fechado ou o usuário não clicar em sair. */

    $_SESSION['id'] = $id;
    $_SESSION['nome'] = $nome;
    $_SESSION['tipo'] = $tipo;
}

function logout(){
    session_destroy();
    header("location:../login.php?saiu");
    exit; // ou die()
}