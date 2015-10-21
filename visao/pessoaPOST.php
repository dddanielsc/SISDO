<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../Controle/pessoa_controle.php';
require_once '../Entidade/pessoa.php';
require_once '../Entidade/usuario.php';

session_start();

if ((!isset($_SESSION['usuario']) == true)) {
    unset($_SESSION['usuario']);
    header('location:../index.php');
}
$user = new usuario();
$user = $_SESSION['usuario'];

$id = $_GET[$id];


$pessoa = new pessoa();
$controle = new pessoa_controle();
//echo $_POST["nome"];

switch ($_GET["acao"]) {
    case "inserir":
        $pessoa->setNome_pessoa($_POST["nome"]);
        $pessoa->setCpf($_POST["cpf"]);
        $pessoa->setMatricula($_POST["matricula"]);
        $resultado = $controle->InserirAtualizar($pessoa);
        break;
    
    case "editar":

        $pessoa->setCod_pessoa($_GET["id"]);
        $pessoa->setNome_pessoa($_POST["nome"]);
        $pessoa->setCpf($_POST["cpf"]);
        $pessoa->setMatricula($_POST["matricula"]);
        $resultado = $controle->InserirAtualizar($pessoa);
        break;
    
    case "excluir":

        $pessoa = $pessoaCotrole->BuscarPor_Cod($id);
        $resultado = $pessoaCotrole->Excluir($pessoa);
        break;
}

$param = BuscarResultado($resultado);

function BuscarResultado($param) {
    if ($param != null) {
        @header('location:../visao/cadastrar_pessoas.php?result=0');
    } else {
        @header('location:../visao/cadastrar_pessoas.php?result=1');
    }
}

?>
