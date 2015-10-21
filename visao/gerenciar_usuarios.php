<!DOCTYPE html>


<?php
require_once 'config_visao.php';
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

$controle = new usuario_controle();




?>
<html>
    <?php CriarCabecalho(); ?>

    <body class="fundo-base">
        <?php echo CriarBarraNavegacao(); ?>

        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Gerenciamento de Usuários</div>
                <div class="panel-body">
                    <a href="../visao/cadastrar_usuario.php"><button type="button" class="btn btn-primary btn-lg" >Cadastrar Usuários</button></a>

                </div>
                <div class="panel-footer">
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
                <table class="table table-striped table-bordered">
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>Pessoa</th>
                    <th>Secretaria</th>
                    <th>Tipo de Usuário</th>
                    <th>Ação</th>

                    <?php
                    $lista = array();
                    
                    if($user->getCod_tipo_usuário()==1){
                        $lista = $controle->Listar();
                    }else{
                        $lista = $controle->ListarPorSecretaria($user->getCod_secretaria());
                    }
                  
                    $i = 0;
                    $laco = count($lista);
                    
                    
                    while ($i < $laco) {
                        $u = new usuario();
                        $u = $lista[$i];

                        $pTemp = new pessoa();
                        $pControle = new pessoa_controle();
                        $pTemp = $pControle->BuscarPor_Cod($u->getCod_pessoa());

                        $sec = new secretaria();
                        $sec_controle = new secretaria_controle();
                        $sec = $sec_controle->BuscarPor_Cod($u->getCod_secretaria());

                        $tpUsuario = new TipoUsuario();
                        $tpUsuario_Controle = new tipoUsuario_controle();
                        $tpUsuario = $tpUsuario_Controle->BuscarPor_Cod($u->getCod_tipo_usuário());

                        echo ' <tr>
                                        <td>' . $u->getCod_usuario() . '</td> 
                                        <td>' . $u->getNome_usuario() . '</td>
                                        <td>' . $u->getEmail_usuario() . '</td> 
                                        <td>' . $pTemp->getNome_pessoa() . '</td>
                                        <td>' . $sec->getNome_secretaria() . '</td> 
                                        <td>' . $tpUsuario->getTipoUsuario() . '</td>    
                                        
                                        <td>
                                            <a href="../visao/editarUsuario.php?id=' . $u->getCod_usuario() . '" class="btn btn-warning btn-sm" role="button">
                                                 <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            </a>
                                            
                                            
                                            <a href="../visao/usuarioPOST.php?id=' . $u->getCod_usuario() . '&acao=excluir" class="btn btn-danger btn-sm" role="button">
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