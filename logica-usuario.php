<?php

// Cria ou utiliza uma sessão já criada
session_start();

function verificaUsuario() {
    if( !usuarioEstaLogado() ){
        header("Location: index.php?falhaDeSeguranca=true");
        die();
    }
}

function usuarioEstaLogado(){
    return isset( $_SESSION["usuario_logado"] );
}

function usuarioLogado(){
    return $_SESSION["usuario_logado"];
}

function logaUsuario($email){
    $_SESSION["usuario_logado"] = $email;
}

function logout(){
    session_destroy();
}