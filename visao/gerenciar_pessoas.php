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

?>

<html>
    <?php CriarCabecalho(); ?>

    <body class="fundo-base">
        <?php echo CriarBarraNavegacao();?>

        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Painel de Menu
                </div>

                <!--                DIV DE CONTROLES - BOTÕES-->
                <div class="panel-body">
                    <div class="panel panel-default col-xs-3">
                        <a href="../visao/cadastrar_pessoas.php"><img src="../img/iconmonstr-user-11-icon-64.png" class="div-img"></img></a>
                        <div class="panel panel-footer panel-success text-center"><small>Cadastro de Pessoas</small></div>
                    </div>
                    <div class="panel panel-default col-xs-3 div-menu-painel">
                        <a href="../visao/gerenciar_usuarios.php"><img src="../img/iconmonstr-user-4-icon-64.png" class="div-img"></img></a>
                        <div class="panel panel-footer panel-success text-center"><small>Cadastro de Usuários</small></div>
                    </div>
                </div>
                <!--                DIV DE CONTROLES - BOTÕES-->


                <div class="panel-footer">
                    <a href="../visao/area_administrativa.php" class="btn btn-default" role="button">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"><abbr title="Voltar"></abbr></span>
                    </a>
                </div>
            </div>
        </div>
   

<?php 
CriarRodape();
?>
