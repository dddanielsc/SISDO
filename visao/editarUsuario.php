<?php
require_once '../visao/config_visao.php';
require_once '../Entidade/usuario.php';
require_once '../Controle/usuario_controle.php';
require_once '../Entidade/pessoa.php';
require_once '../Controle/pessoa_controle.php';
require_once '../Entidade/secretaria.php';
require_once '../Controle/secretaria_controle.php';
require_once '../Entidade/TipoUsuario.php';
require_once '../Controle/tipoUsuario_controle.php';

session_start();

if ((!isset($_SESSION['usuario']) == true)) {
    unset($_SESSION['usuario']);
    header('location:../index.php');
}
$user = new usuario();
$user = $_SESSION['usuario'];

$id = $_GET["id"];

$usuario_controle = new usuario_controle();

$pessoa_controle = new pessoa_controle();
$listapessoas = array();
$listapessoas = $pessoa_controle->Listar();

$secretaria_controle = new secretaria_controle();
$listapessoasSecretaria = array();
$listapessoasSecretaria = $secretaria_controle->Listar();

$tipoUsuario_controle = new tipoUsuario_controle();
$listaTipoUsuario = array();
$listaTipoUsuario = $tipoUsuario_controle->Listar();

$usuarioEditar = new usuario();
$usuarioEditar = $usuario_controle->BuscarPor_Cod($id);

?>




<!DOCTYPE html>
<html>
    <?php CriarCabecalho(); ?>

    <body class="fundo-base">
        <link rel="stylesheet" type="text/css" href="../select1/dist/css/bootstrap-select.css">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script type="text/javascript" src="../select1/dist/js/bootstrap-select.js"></script>

        <?php echo CriarBarraNavegacao(); ?>

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
                
                $('#post').submit(function(){
                    $("#hdbasic2").val(basic2);
                    $("#hdbasic3").val(basic3); 
                    $("#hdbasic4").val(basic4); 
                    return true;
                });        
            });
        </script>
        

     


        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cadastramento de Usuários</div>
                <div class="panel-body">



                    <!--FORMULÁRIO DE CADASTRO-->
                    <form class = "form-horizontal" role = "form" action ="usuarioPOST.php?id=<?php echo $usuarioEditar->getCod_usuario(); ?>&acao=editar" method = "POST" id="post">
                        <div class = "form-group">
                            <label for = "inputUsuario" class = "col-sm-2 control-label">Usuário</label>
                            <div class = "col-sm-6">
                                <input type = "text" class = "form-control" id = "input_nome_usuario" name = "usuario" placeholder = "user" value = "<?php echo $usuarioEditar->getNome_usuario(); ?>">
                            </div>
                        </div>
                        <div class = "form-group">
                            <label for = "inputUsuario" class = "col-sm-2 control-label">E-mail</label>
                            <div class = "col-sm-3">
                                <input type = "email" class = "form-control" id = "input_email" name = "email" placeholder = "@mail.com" value = "<?php echo $usuarioEditar->getEmail_usuario(); ?>">
                            </div>
                        </div>
                        <div class = "form-group">
                            <label for = "inputUsuario" class = "col-sm-2 control-label">Senha</label>
                            <div class = "col-sm-3">
                                <input type = "password" class = "form-control" id = "input_senha" name = "senha" placeholder = "Mín. 6 dígitos" value = "<?php echo $usuarioEditar->getSenha_usuario(); ?>">
                            </div>
                        </div>
                        <div class = "form-group">
                            <label for = "inputUsuario" class = "col-sm-2 control-label">Pessoa</label>
                            <div class = "col-sm-3">

                                <select id = "basic2" name="basic2" class = "show-tick form-control" >

                                    <?php
                                    $i = 0;
                                    $laco = count($listapessoas);
                                    echo $laco;
                                    while ($i < $laco) {
                                        $p = new pessoa();
                                        $p = $listapessoas[$i];
                                        
                                        $selected = "";
                                        if($usuarioEditar->getCod_pessoa == $p->getCod_pessoa()){
                                            $selected = "selected";
                                        } 
                                       
                                        echo '<option value="'.$p->getCod_pessoa(). '" '.$selected.'>' . $p->getNome_pessoa() . '</option>';
                                      
                                        $i++;
                                    }
                                    ?>
                                </select>
                                <!--                                INPUT HIDDEN-->
                                <input type="hidden" value="" id="hdbasic2" name="hdbasic2" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUsuario" class="col-sm-2 control-label">Secretaria</label>
                            <div class="col-sm-3">
                                <select id="basic3" name="basic3" class="show-tick form-control" >

                                    <?php
                                    $i = 0;
                                    $laco = count($listapessoasSecretaria);
                                    echo $laco;
                                    while ($i < $laco) {
                                        $sec = new secretaria();
                                        $sec = $listapessoasSecretaria[$i];
                                        
                                        $selected = "";
                                        if($usuarioEditar->getCod_secretaria() == $sec->getCod_secretaria()){
                                            $selected = "selected";
                                        } 

                                        echo '<option value="'.$sec->getCod_secretaria().'" '.$selected.'>' . $sec->getNome_secretaria() . '</option>';

                                        $i++;
                                    }
                                    ?>
                                </select>
                                <!--                                INPUT HIDDEN-->
                                <input type="hidden" value="" id="hdbasic3" name="hdbasic3" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUsuario" class="col-sm-2 control-label">Tipo Usuário</label>
                            <div class="col-sm-3">
                                <select id="basic4" name="basic4" class="show-tick form-control" >

                                    <?php
                                    $i = 0;
                                    $laco = count($listaTipoUsuario);
                                    echo $laco;
                                    while ($i < $laco) {
                                        $tipo_usuario = new TipoUsuario();
                                        $tipo_usuario = $listaTipoUsuario[$i];
                                        
                                        $selected = "";
                                        if($usuarioEditar->getCod_tipo_usuário() == $tipo_usuario->getCod_TipoUsuario()){
                                            $selected = "selected";
                                        } 
                                        
                                        
                                        echo '<option value="'.$tipo_usuario->getCod_TipoUsuario().'" '.$selected.'>' . $tipo_usuario->getTipoUsuario() . '</option>';

                                        $i++;
                                    }
                                    ?>
                                </select>
                                <!--                                INPUT HIDDEN-->
                                <input type="hidden" value="" id="hdbasic4" name="hdbasic4" />
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" id="btnCadastra">Atualizar</button>
                    </form> 
                    <!--                                    FORMULÁRIO DE CADASTRO-->

                </div>
                <div class="panel-footer">
                    <a href="../visao/gerenciar_usuarios.php" class="btn btn-default" role="button">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"><abbr title="Voltar"></abbr></span>
                    </a>
                </div>
            </div>
        </div>

    </body >
</html>