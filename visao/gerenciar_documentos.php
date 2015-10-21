<!DOCTYPE html>


<?php
require_once 'config_visao.php';
include '../Entidade/usuario.php';
require_once '../Entidade/documento.php';
require_once '../Controle/documento_controle.php';
require_once '../Entidade/tipoDocumento.php';
require_once '../Controle/tipoDocumento_controle.php';

$tp_doc = new tipoDocumento_controle();
$doc_controle=new documento_controle();


session_start();

if ((!isset($_SESSION['usuario']) == true)) {
    unset($_SESSION['usuario']);
    header('location:../index.php');
}
$user = new usuario();
$user = $_SESSION['usuario'];
?>
<html>
    <?php CriarCabecalho(); ?>

    <body class="fundo-base">
        <?php echo CriarBarraNavegacao(); ?>

        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Gerenciamento de Documentos</div>
                <div class="panel-body">
                    <a href="../visao/novoDocumento.php">
                        <button type="button" class="btn btn-primary btn-default" >
                            Novo documento
                        </button>
                    </a>
                    <a href="../visao/gerenciar_tiposDocumento.php">
                        <button type="button" class="btn btn-primary btn-default" >
                            Tipos de Documento
                        </button>
                    </a>
                    



                </div>
                <div class="panel-footer">

                    <div class="col-md-offset-8">
                        <button type="button" class="btn btn-warning btn-sm">editar</button>
                        <button type="button" class="btn btn-danger btn-sm">excluir</button>
                    </div>
                    <a href="../visao/area_administrativa.php" class="btn btn-default" role="button">
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
                    <th>Titulo do Documento</th>
                    <th>Tipo</th>
                    <th>Ação</th>

                    <!--                    EDITAR ESSA TABELA AINDA -->

                    <?php
                    $lista = array();
                    
                    if($user->getCod_tipo_usuário()==1){
                        $lista = $doc_controle->Listar();
                    }else{
                        $lista = $doc_controle->ListaPorSecretaria($user->getCod_secretaria());
                    }
                    
                    $i = 0;
                    $laco = count($lista);
                    while ($i < $laco) {
                        $doc = new documento();
                        $doc = $lista[$i];
                        $tpdoc = new tipoDocumento();
                        
                        $tpdoc= $tp_doc->BuscarPor_Cod($doc->getTipo_documento_cod());
                        echo ' <tr>
                                        <td>' . $doc->getCod_documento() . '</td> 
                                        <td>' . $doc->getTitulo() . '</td>
                                        <td>' . $tpdoc->getNome_tipo() . '</td>
                                        <td>
                                            <a href="../visao/editarDocumento.php?id=' . $doc->getCod_documento() . '" class="btn btn-warning btn-sm" role="button">
                                                 <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            </a>
                                            
                                            
                                            <a href="../visao/documentoPOST.php?id=' . $doc->getCod_documento() . '&acao=excluir" class="btn btn-danger btn-sm" role="button">
                                                 <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                            </a>
                                            <a href="../visao/documentoPOST.php?id=' . $doc->getCod_documento() . '&acao=download" class="btn btn-info btn-sm" role="button">
                                                 <span class="glyphicon glyphicon-cloud-download" aria-hidden="true"></span>
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
