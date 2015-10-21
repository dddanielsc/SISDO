<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of documento
 *
 * @author DanielSantos
 */
require_once '../Entidade/documento.php';
require_once '../Configuracao/conexao.php';

// FALTA FAZER 

class documento_dao {

    function InserirAtualizar($temp) {
        $documento = new documento();
        $documento = $temp;
        ConectarBanco();


        if ($documento->getCod_documento() == null) {
            $query = "INSERT INTO `documento`(`titulo`, `assunto`, `redacao`, `data_documento`, `tipo_documento_cod_tipo_documento`, `usuario_cod_usuario`, `secretaria_cod_secretaria`) "
                    . "VALUES ('" . $documento->getTitulo() . "',"
                    . "'" . $documento->getAssunto() . "',"
                    . "'" . $documento->getRedacao() . "',"
                    . "'" . $documento->getData_documento() . "',"
                    . "'" . $documento->getTipo_documento_cod() . "',"
                    . "'" . $documento->getUsuario_cod() . "',"
                    . "'" . $documento->getSecretaria_cod() . "')";

             
            echo ' | QUERY: '. $query;

            $sql = mysql_query($query);
            $resultado = mysql_insert_id();



            return $resultado;
        } else {
            $query = "UPDATE `documento` SET "
                    . "`titulo`='" . $documento->getTitulo() . "',"
                    . "`assunto`='" . $documento->getAssunto() . "',"
                    . "`redacao`='" . $documento->getRedacao() . "',"
                    . "`data_documento`='" . $documento->getData_documento() . "',"
                    . "`tipo_documento_cod_tipo_documento`='" . $documento->getTipo_documento_cod() . "',"
                    . "`usuario_cod_usuario`='" . $documento->getUsuario_cod() . "',"
                    . "`secretaria_cod_secretaria`='" . $documento->getSecretaria_cod() . "'"
                    . "WHERE `cod_documento` = '" . $documento->getCod_documento() . "'";
            $sql = mysql_query($query);
            $resultado = mysql_affected_rows();

            return $resultado;
        }
    }

    function Excluir($temp) {
        $documento = new documento();
        $documento = $temp;
        ConectarBanco();

        $query = "DELETE FROM `documento`  WHERE  `cod_documento` = " . $documento->getCod_documento() . "";
        try {
            $sql = mysql_query($query);
            $resultado = mysql_affected_rows();
        } catch (Exception $exc) {
            mysql_close();
            echo $exc->getTraceAsString();
        }
        return $resultado;
    }

    function Listar() {
        ConectarBanco();
        $listaDocumento = array();

        $i = 0;
        try {
            $query = "SELECT * FROM `documento`";
            $sql = mysql_query($query);
            
            while ($resultado = mysql_fetch_array($sql)) {
                $doc = new documento();
                $doc->setAssunto($resultado["assunto"]);
                $doc->setCod_documento($resultado["cod_documento"]);
                $doc->setData_documento($resultado["data_documento"]);
                $doc->setRedacao($resultado["redacao"]);
                $doc->setSecretaria_cod($resultado["secretaria_cod_secretaria"]);
                $doc->setTipo_documento_cod($resultado["tipo_documento_cod_tipo_documento"]);
                $doc->setTitulo($resultado["titulo"]);
                $doc->setUsuario_cod($resultado["usuario_cod_usuario"]);

                $listaDocumento[$i] = $doc;
                $i++;
            }

            mysql_close();
        } catch (Exception $exc) {
            mysql_close();
            echo $exc->getTraceAsString();
        }


        return $listaDocumento;
    }
    
    function ListarPorSecretaria($index) {
        ConectarBanco();
        $listaDocumento = array();

        $i = 0;
         try {
            $query = "SELECT * FROM `documento` WHERE `secretaria_cod_secretaria` = '".$index."'";
            $sql = mysql_query($query);
            
            while ($resultado = mysql_fetch_array($sql)) {
                $doc = new documento();
                $doc->setAssunto($resultado["assunto"]);
                $doc->setCod_documento($resultado["cod_documento"]);
                $doc->setData_documento($resultado["data_documento"]);
                $doc->setRedacao($resultado["redacao"]);
                $doc->setSecretaria_cod($resultado["secretaria_cod_secretaria"]);
                $doc->setTipo_documento_cod($resultado["tipo_documento_cod_tipo_documento"]);
                $doc->setTitulo($resultado["titulo"]);
                $doc->setUsuario_cod($resultado["usuario_cod_usuario"]);

                $listaDocumento[$i] = $doc;
                $i++;
            }

            mysql_close();
        } catch (Exception $exc) {
            mysql_close();
            echo $exc->getTraceAsString();
        }


        return $listaDocumento;
    }

   
    function BuscarPor_Cod($temp) {
        $doc = new documento();
        ConectarBanco();
        
        $query = "SELECT  * FROM `documento` "
                . "WHERE `cod_documento` = " . $temp . "";
        $sql = mysql_query($query);
        
        $resultado = mysql_fetch_array($sql);

        
        $doc->setAssunto($resultado["assunto"]);
        $doc->setCod_documento($resultado["cod_documento"]);
        $doc->setData_documento($resultado["data_documento"]);
        $doc->setRedacao($resultado["redacao"]);
        $doc->setSecretaria_cod($resultado["secretaria_cod_secretaria"]);
        $doc->setTipo_documento_cod($resultado["tipo_documento_cod_tipo_documento"]);
        $doc->setTitulo($resultado["titulo"]);
        $doc->setUsuario_cod($resultado["usuario_cod_usuario"]);


        return $doc;
    }

}
