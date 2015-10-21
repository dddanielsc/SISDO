<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of documento_controle
 *
 * @author DanielSantos
 */
require_once '../AcessoDados/documeto_dao.php';
require_once '../Entidade/documento.php';

class documento_controle {

    function InserirAtualizar($param) {
        $dao = new documento_dao();
        try {
            
            echo 'PASSEI NO CONTROLE';
            $resultado = $dao->InserirAtualizar($param);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        
        return $resultado;
    }

    function Excluir($param) {
        $dao = new documento_dao();

        try {
            $dao->Excluir($param);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function Listar() {
        $dao = new documento_dao();
        $listaDao = array();

        try {
            $listaDao = $dao->Listar();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $listaDao;
    }
    
    function ListaPorSecretaria($index) {
         $dao = new documento_dao();
         
         try {
            $listaDao = $dao->ListarPorSecretaria($index);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $listaDao;
    }

    function BuscaPor_Cod($param) {
        $dao = new documento_dao();
        $doc = new documento();

        try {
            $doc = $dao->BuscarPor_Cod($param);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        
        return $doc;
    }

}
