<?php
include "config_visao.php";
include '../Entidade/usuario.php';
require_once '../Controle/secretaria_controle.php';
require_once '../Entidade/secretaria.php';


session_start();

if ((!isset($_SESSION['usuario']) == true)) {
    unset($_SESSION['usuario']);
    header('location:../index.php');
}
$user = new usuario();
$user = $_SESSION['usuario'];

$id = $_GET["id"];
$s = new secretaria();
$c = new secretaria_controle();

$s = $c->BuscarPor_Cod($id);
?>

<html>
<?php CriarCabecalho(); ?>

    <body class="fundo-base">
<?php CriarBarraNavegacao();
?>

        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Editar Pessoa
                </div>
                <div class="panel-body">

                    <!--                                    FORMULÁRIO DE CADASTRO-->
                    <form class="form-horizontal" role="form" action="SecretariaPOST.php?id= <?php echo $s->getCod_secretaria(); ?>&acao=editar" method="POST">
                        <div class="form-group">
                            <label for="inputUsuario" class="col-sm-2 control-label">Nome da Pasta</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="input_nome_secretaria"  name="nome_secretaria" placeholder="Ex: Fazenda" value="<?php echo $s->getNome_secretaria(); ?>">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form> 
                    <!--                                    FORMULÁRIO DE CADASTRO-->


                    <div class="panel-footer">
                        <a href="../visao/gerenciar_secretaria.php" class="btn btn-default" role="button">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"><abbr title="Voltar"></abbr></span>
                        </a>
                    </div>
                </div>
            </div>    
        </div>
<?php
CriarRodape();
?>