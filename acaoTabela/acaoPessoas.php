<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../Entidade/pessoa.php';
require_once '../Controle/pessoa_controle.php';

function AcaoBotaoEditar($param) {
    $pessoa = new pessoa();
    $pessoa = $param;
    
    echo '<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ModalAtualizar">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
         </button>
            <div class="modal fade" id="ModalAtualizar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Insira os dados</h4>
                                </div>
                                <div class="modal-body">

                                    <!--                                    FORMULÁRIO DE CADASTRO-->
                                    <form class="form-horizontal" role="form" action="atualizaPessoaPost.php?id='.$pessoa->getCod_pessoa().'" method="POST">
                                        <div class="form-group">
                                            <label for="inputUsuario" class="col-sm-2 control-label">Nome Completo</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="input_nome_pessoa"  name="nome" placeholder="Nome Completo" value="'.$pessoa->getNome_pessoa().'">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputUsuario" class="col-sm-2 control-label">CPF</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="input_cpf" name="cpf" placeholder="Somente Números" value="'.$pessoa->getCpf().'">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputUsuario" class="col-sm-2 control-label">Matricula</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="input_matricula" name="matricula" placeholder="Sua matricula" value="'.$pessoa->getMatricula().'">
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
                    </div>';
}

function CriarTabela($listagem) {
    
    
    
}

?>
