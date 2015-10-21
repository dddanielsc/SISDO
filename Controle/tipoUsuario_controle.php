<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipoUsuario_controle
 *
 * @author DanielSantos
 */
require_once '../AcessoDados/tipoUsuario_dao.php';
require_once '../Entidade/TipoUsuario.php';

class tipoUsuario_controle {

    function InserirAtualizar($param) {
        $dao = new tipoUsuario_dao();

        try {
            $dao->InserirAtualizar($param);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function Excluir($param) {
        $dao = new tipoUsuario_dao();

        try {
            $dao->Excluir($param);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function Listar() {
        $dao = new tipoUsuario_dao();

        try {
            $listaDao;
            $listaDao = $dao->Listar();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return $listaDao;
    }
    
    function BuscarPor_Cod($param) {
        $dao = new tipoUsuario_dao();
        $tipoUsuario = new TipoUsuario();

        try {
            $tipoUsuario = $dao->BuscarPor_Cod($param);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        
        return $tipoUsuario;
    }
    
    function BuscarPor_Nome($param) {
        $dao = new tipoUsuario_dao();
        $tipoUsuario = new TipoUsuario();

        try {
            $tipoUsuario = $dao->BuscarPor_Nome($param);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        
        return $tipoUsuario;
    }

}
