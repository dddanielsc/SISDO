<?php



/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pessoa_dao
 *
 * @author DanielSantos
 */

require_once '../Configuracao/conexao.php';
require_once '../Entidade/pessoa.php';

class pessoa_dao {
    
    
    function InserirAtualizar($param) {
        
        $pessoa = new pessoa();
        ConectarBanco();
        $pessoa = $param;
        $resultado;
        
         if ($pessoa->getCod_pessoa() == null) {
            $query = "INSERT INTO `pessoa`(`nome_pessoa`, `cpf`, `matricula`) "
                    . "VALUES ('". $pessoa->getNome_pessoa()."','". $pessoa->getCpf()."','". $pessoa->getMatricula()."')";
            

            $sql = mysql_query($query);
            $resultado = mysql_insert_id();
        } else {
            $query = "UPDATE `pessoa` SET "
                    . "`nome_pessoa`='". $pessoa->getNome_pessoa()."',"
                    . "`cpf`='". $pessoa->getCpf()."',"
                    . "`matricula`='". $pessoa->getMatricula()."' "
                    . "WHERE `cod_pessoa` = '". $pessoa->getCod_pessoa()."'";
            
            echo $query;
            $sql = mysql_query($query);
            $resultado = mysql_affected_rows();
        }       
        
        return $resultado;
    }
    
    function Excluir($param) {
         $pessoa = new pessoa();
         ConectarBanco();
         $pessoa = $param;
         
         $query = "DELETE FROM `pessoa` WHERE `cod_pessoa` = '". $pessoa->getCod_pessoa()."'";
         
        // echo $pessoa->getCod_pessoa();
         
        $sql = mysql_query($query);
        $resultado = mysql_affected_rows();
        
        return $resultado;
    }
    
    function Listar () {
        
        $link = ConectarBanco();
        $listaPessoa = array();
        $query = "SELECT * FROM `pessoa`";
        $sql = mysql_query( $query);
        
        $i=0;
        while($resultado = mysql_fetch_array($sql)){
            $pessoa = new pessoa();
            $pessoa->setCod_pessoa($resultado["cod_pessoa"]);
            $pessoa->setCpf($resultado["cpf"]);
            $pessoa->setMatricula($resultado["matricula"]);
            $pessoa->setNome_pessoa($resultado["nome_pessoa"]);
                    
            $listaPessoa[$i] = $pessoa;
            $i++;
        }
        
        return $listaPessoa;         
    }
    
    function BuscarPor_Cod($param) {
        $pessoa = new pessoa();
        ConectarBanco();
        $query = "SELECT * FROM `pessoa` "
                . "WHERE `cod_pessoa` = '".$param ."'";
        $sql =  mysql_query($query);
        $resultado = mysql_fetch_array($sql);
        
        $pessoa->setCod_pessoa($resultado["cod_pessoa"]);
        $pessoa->setCpf($resultado["cpf"]);
        $pessoa->setMatricula($resultado["matricula"]);
        $pessoa->setNome_pessoa($resultado["nome_pessoa"]);
        
        return $pessoa;
    }
    
    function BuscarPor_Nome($param) {
        $pessoa = new pessoa();
        ConectarBanco();
        $query = "SELECT * FROM `pessoa` "
                . "WHERE `nome_pessoa` = '".$param ."'";
        $sql =  mysql_query($query);
        $resultado = mysql_fetch_array($sql);
        
        $pessoa->setCod_pessoa($resultado["cod_pessoa"]);
        $pessoa->setCpf($resultado["cpf"]);
        $pessoa->setMatricula($resultado["matricula"]);
        $pessoa->setNome_pessoa($resultado["nome_pessoa"]);
        
        return $pessoa;
    }
    
}
