<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuario_dao
 *
 * @author DanielSantos
 */
require_once '../Configuracao/conexao.php';
require_once '../Entidade/usuario.php';

class usuario_dao {

    function InserirAtualizar($param) {
        $usuario = new usuario();
        $usuario = $param;
        ConectarBanco();

        $usuario->setSenha_usuario(base64_encode($usuario->getSenha_usuario()));

        if ($usuario->getCod_usuario() == null) {

            $query = "INSERT INTO `usuario`(`nome_usuario`, `email_usuario`, `senha_usuario`, `pessoa_cod_pessoa`, `secretaria_cod_secretaria`, `tipo_usuario_cod_tipoUsuario`)"
                    . "VALUES ('" . $usuario->getNome_usuario() . "','" . $usuario->getEmail_usuario() . "','" . $usuario->getSenha_usuario() . "','" . $usuario->getCod_pessoa() . "','" . $usuario->getCod_secretaria() . "','" . $usuario->getCod_tipo_usuário() . "')";


            $sql = mysql_query($query);
            $resultado = mysql_insert_id();
        } else {
            $query = "UPDATE `usuario` SET "
                    . "`nome_usuario`='" . $usuario->getNome_usuario() . "',"
                    . "`email_usuario`='" . $usuario->getEmail_usuario() . "',"
                    . "`senha_usuario`='" . $usuario->getSenha_usuario() . "',"
                    . "`pessoa_cod_pessoa`='" . $usuario->getCod_pessoa() . "',"
                    . "`secretaria_cod_secretaria`='" . $usuario->getCod_secretaria() . "',"
                    . "`tipo_usuario_cod_tipoUsuario`='" . $usuario->getCod_tipo_usuário() . "' WHERE `cod_usuario` = '" . $usuario->getCod_usuario() . "'";

            $sql = mysql_query($query);
            $resultado = mysql_affected_rows();
        }
    }

    function Exluir($param) {
        $usuario = new usuario();
        $usuario = $param;
        ConectarBanco();

        $query = "DELETE FROM `usuario` WHERE `cod_usuario` = '" . $usuario->getCod_usuario() . "'";

        $sql = mysql_query($query);
        $resultado = mysql_affected_rows();
    }

    function Listar() {
        ConectarBanco();
        $listaUsuarios = array();
        $query = "SELECT * FROM `usuario`";
        $sql = mysql_query($query);

        $i = 0;
        while ($resultado = mysql_fetch_array($sql)) {
            $usuario = new usuario();
            $usuario->setCod_pessoa($resultado["pessoa_cod_pessoa"]);
            $usuario->setCod_secretaria($resultado["secretaria_cod_secretaria"]);
            $usuario->setCod_tipo_usuário($resultado["tipo_usuario_cod_tipoUsuario"]);
            $usuario->setCod_usuario($resultado["cod_usuario"]);
            $usuario->setEmail_usuario($resultado["email_usuario"]);
            $usuario->setNome_usuario($resultado["nome_usuario"]);
            $usuario->setSenha_usuario($resultado["senha_usuario"]);
            $usuario->setSenha_usuario(base64_decode($usuario->getSenha_usuario()));

            $listaUsuarios[$i] = $usuario;
            $i++;
        }
        return $listaUsuarios;
    }

    function ListarPorSecretaria($index) {
        ConectarBanco();
        $listaUsuarios = array();
        $query = "SELECT * FROM `usuario` WHERE `secretaria_cod_secretaria` = " . $index . "";
        $sql = mysql_query($query);
        
        //echo $query;

        $i = 0;
        while ($resultado = mysql_fetch_array($sql)) {
           
            $usuario = new usuario();
            $usuario->setCod_pessoa($resultado["pessoa_cod_pessoa"]);
            $usuario->setCod_secretaria($resultado["secretaria_cod_secretaria"]);
            $usuario->setCod_tipo_usuário($resultado["tipo_usuario_cod_tipoUsuario"]);
            $usuario->setCod_usuario($resultado["cod_usuario"]);
            $usuario->setEmail_usuario($resultado["email_usuario"]);
            $usuario->setNome_usuario($resultado["nome_usuario"]);
            $usuario->setSenha_usuario($resultado["senha_usuario"]);
            $usuario->setSenha_usuario(base64_decode($usuario->getSenha_usuario()));

            $listaUsuarios[$i] = $usuario;
            $i++;
        }
        
        return $listaUsuarios;
    }

        function BuscarPor_Cod($param) {
            $usuario = new usuario();
            ConectarBanco();
            $query = "SELECT * FROM `usuario` WHERE `cod_usuario` = '" . $param . "'";

            $sql = mysql_query($query);
            $resultado = mysql_fetch_array($sql);

            $usuario->setCod_pessoa($resultado["pessoa_cod_pessoa"]);
            $usuario->setCod_secretaria($resultado["secretaria_cod_secretaria"]);
            $usuario->setCod_tipo_usuário($resultado["tipo_usuario_cod_tipoUsuario"]);
            $usuario->setCod_usuario($resultado["cod_usuario"]);
            $usuario->setEmail_usuario($resultado["email_usuario"]);
            $usuario->setNome_usuario($resultado["nome_usuario"]);
            $usuario->setSenha_usuario($resultado["senha_usuario"]);
            $usuario->setSenha_usuario(base64_decode($usuario->getSenha_usuario()));


            return $usuario;
        }

        function BuscarPor_Nome($param) {
            $usuario = new usuario();
            ConectarBanco();
            $query = "SELECT * FROM `usuario` WHERE `nome_usuario` = '" . $param . "'";

            $sql = mysql_query($query);
            $resultado = mysql_fetch_array($sql);

            $usuario->setCod_pessoa($resultado["pessoa_cod_pessoa"]);
            $usuario->setCod_secretaria($resultado["secretaria_cod_secretaria"]);
            $usuario->setCod_tipo_usuário($resultado["tipo_usuario_cod_tipoUsuario"]);
            $usuario->setCod_usuario($resultado["cod_usuario"]);
            $usuario->setEmail_usuario($resultado["email_usuario"]);
            $usuario->setNome_usuario($resultado["nome_usuario"]);
            $usuario->setSenha_usuario($resultado["senha_usuario"]);
            $usuario->setSenha_usuario(base64_decode($usuario->getSenha_usuario()));


            return $usuario;
        }

        function VerificaUsuario($u) {

            $user = new usuario();
            $user = $u;
            ConectarBanco();

            $query = "SELECT * FROM `usuario` WHERE nome_usuario = '" . $user->getNome_usuario() . "' && senha_usuario = '" . $user->getSenha_usuario() . "'";

            echo ' QUERY: ' . $query;

            $sql = mysql_query($query);

            $resultado = mysql_fetch_array($sql);

            $user->setCod_pessoa($resultado["pessoa_cod_pessoa"]);
            $user->setCod_secretaria($resultado["secretaria_cod_secretaria"]);
            $user->setCod_tipo_usuário($resultado["tipo_usuario_cod_tipoUsuario"]);
            $user->setCod_usuario($resultado["cod_usuario"]);
            $user->setEmail_usuario($resultado["email_usuario"]);
            $user->setNome_usuario($resultado["nome_usuario"]);
            $user->setSenha_usuario(base64_decode($resultado["senha_usuario"]));




            return $user;
        }

    }

