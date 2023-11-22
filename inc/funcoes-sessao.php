<?php
/* Sessões no PHP
Recurso usado para o controle de acesso á determinadas
paginas e/ou recursos do site.

Exemplos: área administrativa, painel de controles, área de cliente/aluno etc.

Nestas áreas o acess só é possivel mediante alguma forma de autenticação. Exemplo: login/senha, digital, facial etc...
*/

// Verificar  se já NÃO EXISTE uma sessão em funcionamento
if( !isset($_SESSION)){
    // Então inicie uma sessão
    session_start();
}

function verificaAcesso(){
    // Se NÃO EXISTIR uma variável de sessão chamada "id" baseada no id de um
    // usuário logado, então significa que ele/ela M]AO ESTÁ LOGADO(A) no sistema.
    if(!isset($_SESSION['id'])){
        // Portanto, destrua os dados de sessão,
        // redirecione para a página login.php e pare o script.
        session_destroy();
        header("location:../login.php?acesso_negado");
        exit;
    }
}






?>