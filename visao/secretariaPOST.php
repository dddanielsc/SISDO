<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once '../Entidade/usuario.php';
require_once '../Controle/secretaria_controle.php';
require_once '../Entidade/secretaria.php';


session_start();

if ((!isset($_SESSION['usuario']) == true)) {
    unset($_SESSION['usuario']);
    header('location:../index.php');
}
$user = new usuario();
$user = $_SESSION['usuario'];

$sec = new secretaria();
$sec_controle = new secretaria_controle();

$id = $_GET["id"];

switch ($_GET["acao"]) {
    case "inserir":

        $sec->setNome_secretaria($_POST["nome_secretaria"]);
        $resultado = $sec_controle->InserirAtualizar($sec);
        break;
    case "editar":

        $sec->setCod_secretaria($id);
        $sec->setNome_secretaria($_POST["nome_secretaria"]);
        $resultado = $sec_controle->InserirAtualizar($sec);
        break;
    case "excluir":
          
        $sec = $sec_controle->BuscarPor_Cod($id);
        $resultado = $sec_controle->Excluir($sec);
        
        break;
}


//print_r($resultado);

$param = BuscarResultado($resultado);

function BuscarResultado($param) {
    if ($param != null) {
        @header('location:../visao/gerenciar_secretaria.php?result=0');
    } else {
        @header('location:../visao/gerenciar_secretaria.php?result=1');
    }
}

?>
