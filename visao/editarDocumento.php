<!DOCTYPE html>


<?php
require_once 'config_visao.php';
require_once '../Entidade/usuario.php';
require_once '../Controle/secretaria_controle.php';
require_once '../Entidade/secretaria.php';
require_once '../Controle/tipoDocumento_controle.php';
require_once '../Entidade/tipoDocumento.php';
require_once '../Controle/documento_controle.php';
require_once '../Entidade/documento.php';

session_start();

if ((!isset($_SESSION['usuario']) == true)) {
    unset($_SESSION['usuario']);
    header('location:../index.php');
}
$user = new usuario();
$user = $_SESSION['usuario'];

// PARA LISTAR NO SELECT A LISTA DE SECRETARIAS

$tipoDocumento_controle = new tipoDocumento_controle();
$listaTipoDocumento = array();
$listaTipoDocumento = $tipoDocumento_controle->Listar();

// PARA LISTAR NO SELECT A LISTA DE SECRETARIAS
$secretaria_controle = new secretaria_controle();
$listapessoasSecretaria = array();
$listapessoasSecretaria = $secretaria_controle->Listar();

// 
$doc = new documento();
$controle = new documento_controle();

$doc= $controle->BuscaPor_Cod($_GET["id"]);


?>
<html>
    <?php CriarCabecalho(); 
        
    
    ?>
    




    <body class="fundo-base">

        <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script type="text/javascript" src="../select1/dist/js/bootstrap-select.js"></script>

        <link rel="stylesheet" type="text/css" href="../select1/dist/css/bootstrap-select.css">
        <link href="../css/datepicker.css" rel="stylesheet">
        <script src="../js/bootstrap-datepicker.js"></script>
        
        <script type="text/javascript">
            window.onload = function () {
                CKEDITOR.replace('area_Redacao');

            };
        </script>
        <script>
            $(document).ready(function () {
                $('#input_data_documento').datepicker({
                    format: "yyyy-mm-dd",
                    language: "pt-BR"
                });
            });
        </script>
        <script>
            $(document).ready(function () {
                var mySelect = $('#first-disabled2');

                $('#special').on('click', function () {
                    mySelect.find('option:selected').attr('disabled', 'disabled');
                    mySelect.selectpicker('refresh');
                });

                basic2 = $('#basic2').selectpicker({
                    liveSearch: true,
                    maxOptions: 1
                });

                basic3 = $('#basic3').selectpicker({
                    liveSearch: true,
                    maxOptions: 1
                });

                basic4 = $('#basic4').selectpicker({
                    liveSearch: true,
                    maxOptions: 1
                });

                $('#post').submit(function () {
                    $("#hdbasic2").val(basic2);
                    $("#hdbasic3").val(basic3);
                    $("#hdbasic4").val(basic4);
                    return true;
                });
            });
        </script>
        <?php echo CriarBarraNavegacao(); ?>

        <div class="col-xs-12 col-md-9 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Insira os dados</div>

                <div class="panel-body">

                    <!--                                    FORMULÁRIO DE CADASTRO-->
                    <form class="form-horizontal" role="form" action="documentoPOST.php?id=<?php echo $doc->getCod_documento() ?>&acao=editar" method="POST">
                        <div class = "form-group">
                            <label for = "inputTipoDocumento" class = "col-sm-2 control-label">Tipo Documento</label>
                            <div class = "col-sm-3">
                                <select id = "basic2" name="basic2" class = "show-tick form-control" multiple>
                                   <?php
                                    $i = 0;
                                    $laco = count($listaTipoDocumento);
                                    echo $laco;
                                    while ($i < $laco) {
                                        $tp_doc = new tipoDocumento();
                                        $tp_doc = $listaTipoDocumento[$i];
                                        
                                        $selected="";
                                        if($doc->getTipo_documento_cod() == $tp_doc->getCod_tipo_documento() ){
                                            $selected = "selected";
                                        }

                                        echo '<option value="'.$tp_doc->getCod_tipo_documento() .'" '.$selected.'>' . $tp_doc->getNome_tipo() . '</option>';

                                        $i++;
                                    }
                                    ?>
                                </select>
                                <!--                                INPUT HIDDEN-->
                                <input type="hidden" value="" id="hdbasic2" name="hdbasic2" />
                            </div>
                        </div>

                        <div class = "form-group">
                            <label for = "inputTipoDocumento" class = "col-sm-2 control-label">Secretaria</label>
                            <div class = "col-sm-3">
                                <select id = "basic3" name="basic3" class = "show-tick form-control" multiple >
                                   <?php
                                    $i = 0;
                                    $laco = count($listapessoasSecretaria);
                                    echo $laco;
                                    while ($i < $laco) {
                                        $sec = new secretaria();
                                        $sec = $listapessoasSecretaria[$i];
                                        
                                        $selected="";
                                        if($doc->getSecretaria_cod() == $sec->getCod_secretaria() ){
                                            $selected = "selected";
                                        }

                                        echo '<option value="'.$sec->getCod_secretaria().'" '.$selected.'>' . $sec->getNome_secretaria() . '</option>';

                                        $i++;
                                    }
                                    ?>
                                </select>
                                <!--                                INPUT HIDDEN-->
                                <input type="hidden" value="" id="hdbasic3" name="hdbasic2" />
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="inputTitulo" class="col-sm-2 control-label">Titulo Documento</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="input_titulo_documento"  name="titulo_documento" value="<?php echo $doc->getTitulo() ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="txt_area_Assunto" class="col-sm-2 control-label">Assunto</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" id="txt_area_Assunto" name="assunto_documento" rows="3"  ><?php echo $doc->getAssunto() ?> </textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="input_data" class="col-sm-2 control-label">Data</label>
                            <div class="col-sm-2">
                                <input type="text" id="input_data_documento" name="data_documento" class="form-control" value="<?php echo $doc->getData_documento() ?>">
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="txt_area_Assunto" class="col-sm-2 control-label">Redação</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="area_Redacao" name="area_Redacao" rows="3" ><?php echo $doc->getRedacao() ?></textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info">Salvar</button>
                        <a href="../visao/gerenciar_documentos.php"  role="button">
                            <button class="btn btn-default"> Cancelar</button>
                        </a>
                    </form> 
                    <!--                    FIM FORMULÁRIO-->


                </div>
                <div class="panel-footer">
                    <a href="../visao/gerenciar_documentos.php" class="btn btn-default" role="button">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"><abbr title="Voltar"></abbr></span>
                    </a>
                </div>
            </div>
        </div>
    </body >
</html>
