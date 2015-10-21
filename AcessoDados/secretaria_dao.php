<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of secretaria_dao
 *
 * @author DanielSantos
 */
require_once '../Configuracao/conexao.php';
require_once '../Entidade/secretaria.php';

class secretaria_dao {
    
    function InserirAtualizar($param) {
        $secretaria = new secretaria();
        $secretaria = $param;
        ConectarBanco();
        $resultado;
        
        if ($secretaria->getCod_secretaria()== null) {
            $query = "INSERT INTO `secretaria`(`nome_secretaria`) "
                    . "VALUES ('".$secretaria->getNome_secretaria()."')";

           $sql = mysql_query($query);
           $resultado = mysql_insert_id();
        } else {
            $query = "UPDATE `secretaria` SET `nome_secretaria`= '".$secretaria->getNome_secretaria()."' "
                    . "WHERE  cod_secretaria = '".$secretaria->getCod_secretaria()."'";

           $sql = mysql_query($query);
           $resultado = mysql_affected_rows();
        }
        
        return $resultado;
    }
    
    function Excluir($param) {
        $secretaria = new secretaria();
        $secretaria = $param;
        ConectarBanco();
        
        $query="DELETE FROM `secretaria` "
                . "WHERE cod_secretaria = '".$secretaria->getCod_secretaria()."'";
        
        $sql = mysql_query($query);
        $resultado = mysql_affected_rows();
        
        return $resultado;
    }
    
    function Listar() {
        
        ConectarBanco();
        $listaSecretaria=array();
        $query="SELECT * FROM `secretaria`";
        $sql =  mysql_query($query);
        
        
        
        $i=0;
        while($resultado = mysql_fetch_array($sql)){
            $sec=new secretaria();
            $sec->setCod_secretaria($resultado["cod_secretaria"]);
            $sec->setNome_secretaria($resultado["nome_secretaria"]);
            
            $listaSecretaria[$i] = $sec;
            $i++;
        }
        
        return $listaSecretaria;
    }

    function BuscarPor_Cod($param) {
        $sec = new secretaria();
        ConectarBanco();
        $query = "SELECT * FROM `secretaria`"
               . " WHERE `cod_secretaria` = '".$param ."'";
        $sql =  mysql_query($query);
        $resultado = mysql_fetch_array($sql);
        
        
        
        $sec->setCod_secretaria($resultado["cod_secretaria"]);
        $sec->setNome_secretaria($resultado["nome_secretaria"]);
        
       
        
        return $sec;
    }
    
    function BuscarPor_Nome($param) {
        $sec = new secretaria();
        ConectarBanco();
        $query = "SELECT * FROM `secretaria`"
               . " WHERE `nome_secretaria` = '".$param ."'";
        $sql =  mysql_query($query);
        $resultado = mysql_fetch_array($sql);
        
        $sec->setCod_secretaria($resultado["cod_secretaria"]);
        $sec->setCod_secretaria($resultado["nome_secretaria"]);
        
        return $sec;
    }
}
