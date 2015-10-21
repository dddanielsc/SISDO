<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuario_controle
 *
 * @author DanielSantos
 */
require_once '../AcessoDados/usuario_dao.php';
require_once '../Entidade/usuario.php';

class usuario_controle {
    
    function InserirAtualizar($param) {
        $dao = new usuario_dao();
        
        try {
            $dao->InserirAtualizar($param);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    function Excluir($param) {
        $dao = new usuario_dao();
        
        try {
            $dao->Exluir($param);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    function Listar() {
        $dao = new usuario_dao();
        
        try {
            $listaDao=array();
            $listaDao = $dao->Listar();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $listaDao;
        
    }
    
    function ListarPorSecretaria($index) {
       $dao = new usuario_dao();
        
        try {
            $listaDao=array();
            $listaDao = $dao->ListarPorSecretaria($index);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $listaDao;
    }
    
    function BuscarPor_Cod($param) {
        $dao = new usuario_dao();
        $usuario = new usuario();
        try {
            $usuario = $dao->BuscarPor_Cod($param);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $usuario;
        
    }
    
        
    function VerficaLogin($user) {
        $dao = new usuario_dao();
        try {
            $result= $dao->VerificaUsuario($user);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        
        return $result;
        }
}
