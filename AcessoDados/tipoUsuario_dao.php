<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipoUsuario_dao
 *
 * @author DanielSantos
 */

require_once '../Configuracao/conexao.php';
require_once '../Entidade/TipoUsuario.php';

class tipoUsuario_dao {
    
    function InserirAtualizar($param) {
        $tipoUsuario = new TipoUsuario();
        ConectarBanco();
        $tipoUsuario = $param;
        
        if ( $tipoUsuario->getCod_TipoUsuario()== null) {
            $query = "INSERT INTO `tipo_usuario`(`tipoUsuario`) VALUES ('". $tipoUsuario->getTipoUsuario()."')";
            

            $sql = mysql_query($query);
            $resultado = mysql_insert_id();
        } else {
            $query = "UPDATE `tipo_usuario` SET `tipoUsuario`= '". $tipoUsuario->getTipoUsuario()."' WHERE '". $tipoUsuario->getCod_TipoUsuario()."'";
            
            echo $query;
            $sql = mysql_query($query);
            $resultado = mysql_affected_rows();
        } 
        
        return $resultado;
    }
    
    function Excluir($param) {
        $tipoUsuario = new TipoUsuario();
        ConectarBanco();
        $tipoUsuario = $param;
        
        $query = "DELETE FROM `tipo_usuario` WHERE `cod_tipoUsuario`= '". $tipoUsuario->getCod_TipoUsuario()."'";
        
        $sql = mysql_query($query);
        $resultado = mysql_affected_rows();
        
        return $resultado;
    }
    
    function Listar() {
        ConectarBanco();
        $listaTipoUsuario = array();
        
        $query = "SELECT * FROM `tipo_usuario`";
        $sql = mysql_query($query);
        
        $i=0;
        while($resultado = mysql_fetch_array($sql)){
            $tipoUsuario = new TipoUsuario();
            $tipoUsuario->setCod_TipoUsuario($resultado["cod_tipoUsuario"]);
            $tipoUsuario->setTipoUsuario($resultado["tipoUsuario"]);
            
            $listaTipoUsuario[$i] = $tipoUsuario;
            $i++;
        }
        return $listaTipoUsuario;       
    }
    
    function BuscarPor_Cod($param) {
       $tipoUsuario = new TipoUsuario();
       ConectarBanco();
       
       $query = "SELECT * FROM `tipo_usuario` WHERE cod_tipoUsuario = '". $param."'";
        $sql =  mysql_query($query);
        $resultado = mysql_fetch_array($sql);
        
         $tipoUsuario->setCod_TipoUsuario($resultado["cod_tipoUsuario"]);
         $tipoUsuario->setTipoUsuario($resultado["tipoUsuario"]);
         
         return $tipoUsuario;
    }
    
    function BuscarPor_Nome($param) {
       $tipoUsuario = new TipoUsuario();
       ConectarBanco();
       
       $query = "SELECT * FROM `tipo_usuario` WHERE tipoUsuario = '". $param."'";
        $sql =  mysql_query($query);
        $resultado = mysql_fetch_array($sql);
        
         $tipoUsuario->setCod_TipoUsuario($resultado["cod_tipoUsuario"]);
         $tipoUsuario->setTipoUsuario($resultado["tipoUsuario"]);
         
         return $tipoUsuario;
    }
}
