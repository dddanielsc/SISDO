<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipoDocumento_controle
 *
 * @author DanielSantos
 */
require_once '../AcessoDados/tipoDocumento_dao.php';
require_once '../Entidade/tipoDocumento.php';

class tipoDocumento_controle {

    function InserirAtualizar($param) {
        $dao = new tipoDocumento_dao();
        //echo  " -> DENTRO DO CONTROLE ";
        try {
            $resultado = $dao->InserirAtualizar($param);
            return $resultado;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function Excluir($param) {
        $dao = new tipoDocumento_dao();

        try {
            $resultado=$dao->Excluir($param);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $resultado;
    }

    function Listar() {
        $dao = new tipoDocumento_dao();

        try {
            $listarDao = array();
            $listarDao = $dao->Listar();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $listarDao;
    }

    function BuscarPor_Cod($param) {
        $dao = new tipoDocumento_dao();

        try {
            $tdoc = new tipoDocumento();
            $tdoc = $dao->BuscarPor_Cod($param);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $tdoc;
    }

}
