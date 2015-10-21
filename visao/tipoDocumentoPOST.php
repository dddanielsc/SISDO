<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../Entidade/usuario.php';
require_once '../Entidade/tipoDocumento.php';
require_once '../Controle/tipoDocumento_controle.php';



session_start();

if ((!isset($_SESSION['usuario']) == true)) {
    unset($_SESSION['usuario']);
    header('location:../index.php');
}
$user = new usuario();
$user = $_SESSION['usuario'];

$tpd = new tipoDocumento();
$tpd_controle = new tipoDocumento_controle();

$id = $_GET["id"];

switch ($_GET["acao"]) {
    case "inserir":
        
        $tpd->setNome_tipo($_POST["nome_titulo"]);
        $resultado = $tpd_controle->InserirAtualizar($tpd);
        break;
    case "editar":
        
        $tpd->setCod_tipo_documento($id);
        $tpd->setNome_tipo($_POST["nome_titulo"]);
        $resultado = $tpd_controle->InserirAtualizar($tpd);
        break;
    case "excluir":
        
        $tpd = $tpd_controle->BuscarPor_Cod($id);
        $resultado = $tpd_controle->Excluir($tpd);
        break;
}


//print_r($resultado);

$param = BuscarResultado($resultado);

function BuscarResultado($param) {
    if ($param != null) {
        @header('location:../visao/gerenciar_tiposDocumento.php?result=0');
    } else {
        @header('location:../visao/gerenciar_tiposDocumento.php?result=1');
    }
}

?>
