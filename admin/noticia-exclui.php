<?php
require "../inc/funcoes-sessao.php";
require "../inc/funcoes-noticias.php";
verificaAcesso();

// PEGANDO O ID DA NOTICIA (DA URL) QUE VAI EXCLUIR
$idNoticia = $_GET['id'];

// PEGANDO TIPO DO USUARIO (DA SESSION)
$tipoUsuario  = $_SESSION['tipo'];

// PEGANDO ID DO USUARIO (DA SESSION)
$idUsuario = $_SESSION['id'];

// EXECUTAR A FUNÇÃO
excluirNoticia($conexao, $idNoticia, $idUsuario, $tipoUsuario);

// REDIRECIONAR PARA noticias.php
header("location:noticias.php");
?>