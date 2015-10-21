<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../Entidade/usuario.php';
require_once '../Entidade/documento.php';
require_once '../Controle/documento_controle.php';



session_start();

if ((!isset($_SESSION['usuario']) == true)) {
    unset($_SESSION['usuario']);
    header('location:../index.php');
}
$user = new usuario();
$user = $_SESSION['usuario'];

$id = $_GET["id"];
$documento = new documento();
$documento_controle = new documento_controle();

print_r($id);

switch ($_GET["acao"]) {
    case "inserir":
        
        
        $documento->setAssunto($_POST["assunto_documento"]);
        $documento->setData_documento($_POST["data_documento"]);
        $documento->setRedacao($_POST["area_Redacao"]);
        $documento->setSecretaria_cod($_POST["basic3"]);
        $documento->setTipo_documento_cod($_POST["basic2"]);
        $documento->setTitulo($_POST["titulo_documento"]);
        $documento->setUsuario_cod($user->getCod_usuario());
        
      $resultado = $documento_controle->InserirAtualizar($documento);
        break;
    
    case "editar":
        
        $documento->setCod_documento($id);
        $documento->setAssunto($_POST["assunto_documento"]);
        $documento->setData_documento($_POST["data_documento"]);
        $documento->setRedacao($_POST["area_Redacao"]);
        $documento->setSecretaria_cod($_POST["basic3"]);
        $documento->setTipo_documento_cod($_POST["basic2"]);
        $documento->setTitulo($_POST["titulo_documento"]);
        $documento->setUsuario_cod($user->getCod_usuario());
        
        $resultado = $documento_controle->InserirAtualizar($documento);
        break;
    
    case "excluir":
          
        $documento = $documento_controle->BuscaPor_Cod($id);
        $resultado = $documento_controle->Excluir($documento);
        
        break;
}
    //echo ' resultado: '.$resultado;
    BuscarResultado($resultado);

function BuscarResultado($param) {
    if ($param != null) {
        @header('location:../visao/gerenciar_documentos.php?result=0');
    } else {
        @header('location:../visao/gerenciar_documentos.php?result=1');
    }
}

?>
