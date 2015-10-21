<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of secretaria_controle
 *
 * @author DanielSantos
 */
require_once '../AcessoDados/secretaria_dao.php';
require_once '../Entidade/secretaria.php';

class secretaria_controle {

    function InserirAtualizar($param) {
        $dao = new secretaria_dao();

        try {
            $dao->InserirAtualizar($param);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function Excluir($param) {
        $dao = new secretaria_dao();

        try {
            $dao->Excluir($param);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function Listar() {
        $dao = new secretaria_dao();

        try {
            $listaDao = array();
            $listaDao = $dao->Listar();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $listaDao;
    }

    function BuscarPor_Cod($param) {
        $dao = new secretaria_dao();
        $sec = new secretaria();

        try {
            $sec = $dao->BuscarPor_Cod($param);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        
        return $sec;
    }
    
    function BuscarPor_Nome($param) {
        $dao = new secretaria_dao();
        $sec = new secretaria();

        try {
            $sec = $dao->BuscarPor_Nome($param);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        
        return $sec;
    }

}
