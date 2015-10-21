<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../Entidade/usuario.php';
require_once '../Controle/usuario_controle.php';

session_start();

if ((!isset($_SESSION['usuario']) == true)) {
    unset($_SESSION['usuario']);
    header('location:../index.php');
}
$user = new usuario();
$user = $_SESSION['usuario'];

$usuario_controle = new usuario_controle();
$usuario = new usuario();

//print_r($_POST);

$id = $_GET["id"];

switch ($_GET["acao"]) {
    case "inserir":

        $usuario->setCod_secretaria($_POST["basic3"]);
        $usuario->setCod_tipo_usuário($_POST["basic4"]);
        $usuario->setCod_pessoa($_POST['basic2']);
        $usuario->setEmail_usuario($_POST["email"]);
        $usuario->setNome_usuario($_POST["usuario"]);
        $usuario->setSenha_usuario($_POST["senha"]);
        
        $resultado = $usuario_controle->InserirAtualizar($usuario);
        break;
    
    case "editar":

        $usuario->setCod_usuario($_GET["id"]);
        $usuario->setCod_secretaria($_POST["basic3"]);
        $usuario->setCod_tipo_usuário($_POST["basic4"]);
        $usuario->setCod_pessoa($_POST['basic2']);
        $usuario->setEmail_usuario($_POST["email"]);
        $usuario->setNome_usuario($_POST["usuario"]);
        $usuario->setSenha_usuario($_POST["senha"]);
        
        $resultado = $usuario_controle->InserirAtualizar($usuario);
        break;
    case "excluir":

        $usuario = $usuario_controle->BuscarPor_Cod($id);
        $resultado = $usuario_controle->Excluir($usuario);
        break;
}

$param = BuscarResultado($resultado);

function BuscarResultado($param) {
    if ($param != null) {
        @header('location:../visao/gerenciar_usuarios.php');
    } else {
        @header('location:../visao/gerenciar_usuarios.php');
    }
}

?>