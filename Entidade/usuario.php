<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuario
 *
 * @author DanielSantos
 */
class usuario {
    
    private $cod_usuario;
    private $nome_usuario;
    private $email_usuario;
    private $senha_usuario;
    private $cod_pessoa;
    private $cod_secretaria;
    private $cod_tipo_usuário;
   

    function getCod_secretaria() {
        return $this->cod_secretaria;
    }

    function getCod_tipo_usuário() {
        return $this->cod_tipo_usuário;
    }

    function setCod_secretaria($cod_secretaria) {
        $this->cod_secretaria = $cod_secretaria;
    }

    function setCod_tipo_usuário($cod_tipo_usuário) {
        $this->cod_tipo_usuário = $cod_tipo_usuário;
    }

        
    function getCod_usuario() {
        return $this->cod_usuario;
    }

    function getNome_usuario() {
        return $this->nome_usuario;
    }

    function getEmail_usuario() {
        return $this->email_usuario;
    }

    function getSenha_usuario() {
        return $this->senha_usuario;
    }

    function getCod_pessoa() {
        return $this->cod_pessoa;
    }

    function setCod_usuario($cod_usuario) {
        $this->cod_usuario = $cod_usuario;
    }

    function setNome_usuario($nome_usuario) {
        $this->nome_usuario = $nome_usuario;
    }

    function setEmail_usuario($email_usuario) {
        $this->email_usuario = $email_usuario;
    }

    function setSenha_usuario($senha_usuario) {
        $this->senha_usuario = $senha_usuario;
    }

    function setCod_pessoa($cod_pessoa) {
        $this->cod_pessoa = $cod_pessoa;
    }

}
