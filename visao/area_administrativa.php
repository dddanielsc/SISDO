<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include "config_visao.php";
include '../Entidade/usuario.php';

session_start();



if((!isset ($_SESSION['usuario']) == true) ) {
    unset($_SESSION['usuario']);
    header('location:../index.php'); 
} 
$user = new usuario();
$user = $_SESSION['usuario'];

 
if($user->getCod_tipo_usuário() == 1){ //SE É ADMINISTRADOR ACESSA TUDO 
    $menus = '<div class="panel-body">
                    <div class="panel panel-default col-xs-3">
                        <a href="../visao/gerenciar_pessoas.php"><img src="../img/iconmonstr-user-14-icon-64.png" class="div-img"></img></a>
                        <div class="panel panel-footer panel-success text-center"><small>Gerenciar Pessoas</small></div>
                    </div>
                    <div class="panel panel-default col-xs-3 div-menu-painel">
                        <a href="../visao/gerenciar_secretaria.php"><img src="../img/iconmonstr-bookmark-15-icon-64.png" class="div-img"></img></a>
                        <div class="panel panel-footer panel-success text-center"><small>Gerenciar Secretarias</small></div>
                    </div>
                    <div class="panel panel-default col-xs-3 div-menu-painel">
                        <a href="../visao/gerenciar_documentos.php"><img src="../img/iconmonstr-note-27-icon-64.png" class="div-img"></img></a>
                        <div class="panel panel-footer panel-success text-center"><small>Gerenciar Documentos</small></div>
                    </div>
                </div>';
}else if($user->getCod_tipo_usuário() == 2){  //SE É GESTOR 
    $menus = '<div class="panel-body">
                    <div class="panel panel-default col-xs-3">
                        <a href="../visao/gerenciar_pessoas.php"><img src="../img/iconmonstr-user-14-icon-64.png" class="div-img"></img></a>
                        <div class="panel panel-footer panel-success text-center"><small>Gerenciar Pessoas</small></div>
                    </div>
                    <div class="panel panel-default col-xs-3 div-menu-painel">
                        <a href="../visao/gerenciar_documentos.php"><img src="../img/iconmonstr-note-27-icon-64.png" class="div-img"></img></a>
                        <div class="panel panel-footer panel-success text-center"><small>Gerenciar Documentos</small></div>
                    </div>
                </div>';
}else if($user->getCod_tipo_usuário() == 3){  //SE É REDATOR 
    $menus = '<div class="panel-body">
                    <div class="panel panel-default col-xs-3 div-menu-painel">
                        <a href="../visao/gerenciar_documentos.php"><img src="../img/iconmonstr-note-27-icon-64.png" class="div-img"></img></a>
                        <div class="panel panel-footer panel-success text-center"><small>Gerenciar Documentos</small></div>
                    </div>
                </div>';
}else{
     header('location:../index.php');
}
?>

<html>
    <?php CriarCabecalho(); ?>

    <body class="fundo-base">
        <?php CriarBarraNavegacao(); ?>

        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Painel de Menu
                </div>

                <!--                DIV DE CONTROLES - BOTÕES-->
                <?php echo $menus ?>
                <!--                DIV DE CONTROLES - BOTÕES-->


                <div class="panel-footer"><small>Usuário: <?php echo $user->getNome_usuario(); ?>.</small></div>
            </div>
        </div>
<?php
        CriarRodape();
?>
