<!DOCTYPE html>


<?php
require_once 'config_visao.php';
require_once '../Entidade/usuario.php';
require_once '../Controle/pessoa_controle.php';

session_start();

if ((!isset($_SESSION['usuario']) == true)) {
    unset($_SESSION['usuario']);
    header('location:../index.php');
}
$user = new usuario();
$user = $_SESSION['usuario'];

$controle = new pessoa_controle();
?>
<html>
    <?php CriarCabecalho(); ?>

    <body class="fundo-base">
        <?php echo CriarBarraNavegacao(); ?>
        
        
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Gerenciamento de Pessoas</div>
                <div class="panel-body">
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ModalCadastrar">
                        Cadastrar Pessoas
                    </button>



                    <!--                    MODAL CADASTRAR -->
                    <div class="modal fade" id="ModalCadastrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Insira os dados</h4>
                                </div>
                                <div class="modal-body">

                                    <!--                                    FORMULÁRIO DE CADASTRO-->
                                    <form class="form-horizontal" role="form" action="pessoaPOST.php?id=&acao=inserir" method="POST">
                                        <div class="form-group">
                                            <label for="inputUsuario" class="col-sm-2 control-label">Nome Completo</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="input_nome_pessoa"  name="nome" placeholder="Nome Completo" value="x2">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputUsuario" class="col-sm-2 control-label">CPF</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="input_cpf" name="cpf" placeholder="Somente Números" value="1140423725">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputUsuario" class="col-sm-2 control-label">Matricula</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="input_matricula" name="matricula" placeholder="Sua matricula" value="12345">
                                            </div>
                                        </div>
                                        <div class="form-group">

                                        </div>
                                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                                    </form> 
                                    <!--                                    FORMULÁRIO DE CADASTRO-->

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--                    MODAL CADASTRAR -->


                </div>
                <div class="panel-footer">
                  
                    <div class="col-md-offset-8">
                        <button type="button" class="btn btn-warning btn-sm">editar</button>
                        <button type="button" class="btn btn-danger btn-sm">excluir</button>
                        <button type="button" class="btn btn-primary btn-sm">add usuario</button>
                    </div>
                     <a href="../visao/gerenciar_pessoas.php" class="btn btn-default" role="button">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"><abbr title="Voltar"></abbr></span>
                    </a>
                </div>
                

            </div>
            <?php
            if (@$_GET["result"] == 0) {
                echo ' <br><div class="alert alert-success" role="alert">Operação executada com Sucesso !</div>';
                
            } elseif (@$_GET["result"] != null && @$_GET["result"] == 0) {
                //
            } else {
                echo ' <br><div class="alert alert-warning" role="alert">ERRO na Operação !</div>';
            }
            ?>   
            <!--            INICIA TABELA -->
            <div>
                <table class="table table-striped table-bordered" id="tabela">
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Matricula</th>
                    <th>Ação</th>

                    <?php
                    $lista = array();
                    $lista = $controle->Listar();
                    $i = 0;
                    $laco = count($lista);
                    while ($i < $laco) {
                        $p = new pessoa();
                        $p = $lista[$i];

                        echo ' <tr>
                                        <td>' . $p->getCod_pessoa() . '</td> 
                                        <td>' . $p->getNome_pessoa() . '</td>
                                        <td>' . $p->getCpf() . '</td> 
                                        <td>' . $p->getMatricula() . '</td> 
                                        <td>
                                            <a href="../visao/editarPessoa.php?id=' . $p->getCod_pessoa() . '" class="btn btn-warning btn-sm" role="button">
                                                 <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            </a>
                                            
                                            
                                            <a href="../visao/pessoaPOST.php?id=' . $p->getCod_pessoa() . '&acao=excluir" class="btn btn-danger btn-sm" role="button">
                                                 <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                            </a>
                                            
                                            <a href="../visao/cadastrar_usuario?id=' . $p->getCod_pessoa() . '" class="btn btn-primary btn-sm" role="button">
                                                 <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                            </a>
                                        </td>
                                  </tr>';
                        $i++;
                    }
                    ?>
                </table>
            </div>
        </div>



    </body >
</html>
