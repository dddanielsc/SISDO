<!DOCTYPE html>


<?php
require_once 'config_visao.php';
include '../Entidade/usuario.php';
require_once '../Controle/tipoDocumento_controle.php';
require_once '../Entidade/tipoDocumento.php';

$controle = new tipoDocumento_controle();


session_start();

if ((!isset($_SESSION['usuario']) == true)) {
    unset($_SESSION['usuario']);
    header('location:../index.php');
}
$user = new usuario();
$user = $_SESSION['usuario'];

if(@$_GET["id"] != null){
    $tipodoc = new tipoDocumento();
    $tipodoc = $controle->BuscarPor_Cod($_GET["id"]);
    
    $botaoCancelar='<a href="../visao/gerenciar_tiposDocumento.php" role="button">
                            <button type="submit" class="btn btn-default">Cancelar</button>
                        </a>';
    $valueNomeTipo = $tipodoc->getNome_tipo();
    $action = "tipoDocumentoPOST.php?id=".$tipodoc->getCod_tipo_documento()."&acao=editar";
}else{
    $valueNomeTipo="";
    $action = "tipoDocumentoPOST.php?id=&acao=inserir";
}



?>
<html>
    <?php CriarCabecalho(); ?>

    <body class="fundo-base">
        <?php echo CriarBarraNavegacao(); ?>

        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Gerenciamento de Secretarias</div>
                <div class="panel-body">
                    <!--                                    FORMULÁRIO DE CADASTRO-->
                    <form class="form-horizontal" role="form" action="<?php echo $action; ?>" method="POST">
                        <div class="form-group">
                            <label for="inputUsuario" class="col-sm-2 control-label">Tipo de Documento</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="input_nome_secretaria"  name="nome_titulo" placeholder="Título do Tipo" value="<?php echo $valueNomeTipo ?>">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                        <?php echo @$botaoCancelar ?>
                    </form> 
                    <!--                                    FORMULÁRIO DE CADASTRO-->

                </div>
                <div class="panel-footer">

                    
                    <a href="../visao/gerenciar_documentos.php" class="btn btn-default" role="button">
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
                <table class="table table-striped table-bordered">
                    <th>ID</th>
                    <th>Tipo de Documento</th>
                    <th>Ação</th>

                    <?php
                    $lista = array();
                    $lista = $controle->Listar();
                    $i = 0;
                    $laco = count($lista);
                    while ($i < $laco) {
                        $tpd = new tipoDocumento();
                        $tpd = $lista[$i];

                        echo ' <tr>
                                        <td>' . $tpd->getCod_tipo_documento() . '</td> 
                                        <td>' . $tpd->getNome_tipo() . '</td>
                                      
                                        <td>
                                            <a href="../visao/gerenciar_tiposDocumento.php?id=' . $tpd->getCod_tipo_documento() . '" class="btn btn-warning btn-sm" role="button">
                                                 <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            </a>
                                            
                                            
                                            <a href="../visao/tipoDocumentoPOST.php?id=' . $tpd->getCod_tipo_documento() . '&acao=excluir" class="btn btn-danger btn-sm" role="button">
                                                 <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
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
