<?php


/**
 * Description of tipoDocumento_dao
 *
 * @author DanielSantos
 */

require_once '../Entidade/tipoDocumento.php';
require_once '../Configuracao/conexao.php';

class tipoDocumento_dao {
    
    function InserirAtualizar($param) {
        
        $tipo_doc = new tipoDocumento();
        $tipo_doc = $param;
        ConectarBanco();
        $resultado;
        
        if($tipo_doc->getCod_tipo_documento() == null){
            $query = "INSERT INTO `tipo_documento`(`nome_tipo`) "
                    . "VALUES ('".$tipo_doc->getNome_tipo()."')";
            
            //print_r($query);
            $sql= mysql_query($query);
            $resultado = mysql_insert_id();
        }else{
            $query = "UPDATE `tipo_documento` "
                    . "SET `nome_tipo`= '" . $tipo_doc->getNome_tipo() . "' "
                    . "WHERE `cod_tipo_documento` =" . $tipo_doc->getCod_tipo_documento() . "";
            
            //print_r($query);
            
            $sql= mysql_query($query);
            $resultado = mysql_insert_id();
        }
        return $resultado;
    }
    
    function Excluir($param) {
        
        
        $tipo_doc = new tipoDocumento();
        $tipo_doc = $param;
        ConectarBanco();
        
        $query = "DELETE FROM `tipo_documento` "
                . "WHERE `cod_tipo_documento` = " . $tipo_doc->getCod_tipo_documento() . "";
        
        
        $sql = mysql_query($query);
        $resultado = mysql_affected_rows();
        
        return $resultado;
    }
    
    function Listar() {
        ConectarBanco();
        $listaTipoDoc = array();
        $query = "SELECT * FROM `tipo_documento`";
        $sql =  mysql_query($query);
        
        $i=0;
        while($resultado = mysql_fetch_array($sql)){
            $tipo_doc = new tipoDocumento();
            $tipo_doc->setCod_tipo_documento($resultado["cod_tipo_documento"]);
            $tipo_doc->setNome_tipo($resultado["nome_tipo"]);
            
            $listaTipoDoc[$i] = $tipo_doc;
            $i++;
        }
        return $listaTipoDoc;
    }
    
    function BuscarPor_Cod($param) {
       
        ConectarBanco();
        $query = "SELECT `cod_tipo_documento`, `nome_tipo`"
                . " FROM `tipo_documento` "
                . "WHERE `cod_tipo_documento` = '" . $param . "'";
        
        $sql =  mysql_query($query);
        $resultado = mysql_fetch_array($sql);    
        
        $tipo_doc = new tipoDocumento();
        $tipo_doc->setCod_tipo_documento($resultado["cod_tipo_documento"]);
        $tipo_doc->setNome_tipo($resultado["nome_tipo"]);
        
        
        return $tipo_doc;
    }
}
