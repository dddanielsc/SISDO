<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pessoa_controle
 *
 * @author DanielSantos
 */
require_once '../AcessoDados/pessoa_dao.php';
require_once '../Entidade/pessoa.php';

class pessoa_controle {

    function InserirAtualizar($param) {
        $dao = new pessoa_dao();
        $retorno;

        try {
            $retorno = $dao->InserirAtualizar($param);
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            $retorno = -1;
        }
        
        return  $retorno;
    }

    function Excluir($param) {
        $dao = new pessoa_dao();

        try {
            $retorno = $dao->Excluir($param);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            $retorno = -1;
        }
        
        return $retorno;
    }

    function Listar() {
        $dao = new pessoa_dao();

        try {
            $listaDao = array();
            $listaDao = $dao->Listar();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $listaDao;
    }

    function BuscarPor_Cod($param) {
        $dao = new pessoa_dao();

        try {

            $pessoa = new pessoa();
            $pessoa = $dao->BuscarPor_Cod($param);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $pessoa;
    }
    
    function BuscarPor_Nome($param) {
        $dao = new pessoa_dao();

        try {

            $pessoa = new pessoa();
            $pessoa = $dao->BuscarPor_Nome($param);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $pessoa;
    }
}
