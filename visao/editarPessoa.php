<?php
include "config_visao.php";
include '../Entidade/usuario.php';
require_once '../Entidade/pessoa.php';
require_once '../Controle/pessoa_controle.php';

session_start();

if ((!isset($_SESSION['usuario']) == true)) {
    unset($_SESSION['usuario']);
    header('location:../index.php');
}
$user = new usuario();
$user = $_SESSION['usuario'];

$id=$_GET["id"];


$pessoa = new pessoa();
$pessoaCotrole= new pessoa_controle();

$pessoa = $pessoaCotrole->BuscarPor_Cod($id);

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
                <div class="well">
                    <!--                                    FORMULÁRIO DE CADASTRO-->
                    <form class="form-horizontal" role="form" action="pessoaPOST.php?id=<?php echo $id; ?>&acao=editar" method="POST">
                        <div class="form-group">
                            <label for="inputUsuario" class="col-sm-2 control-label">Nome Completo</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="input_nome_pessoa"  name="nome" placeholder="Nome Completo" value="<?php echo $pessoa->getNome_pessoa(); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUsuario" class="col-sm-2 control-label">CPF</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="input_cpf" name="cpf" placeholder="Somente Números" value="<?php echo $pessoa->getCpf(); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUsuario" class="col-sm-2 control-label">Matricula</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="input_matricula" name="matricula" placeholder="Sua matricula" value="<?php echo $pessoa->getMatricula(); ?>">
                            </div>
                        </div>
                        <div class="form-group">

                        </div>
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                        <a href="../visao/cadastrar_pessoas.php?result=1" class="btn btn-default" role="button">Cancelar</a>
                    </form> 
                    <!--                                    FORMULÁRIO DE CADASTRO-->

                </div>

            </div>
        </div>
        <?php
        CriarRodape();
        ?>