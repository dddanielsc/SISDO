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
class documento {
    private $cod_documento;
    private $titulo;
    private $assunto;
    private $redacao;
    private $data_documento;
    private $tipo_documento_cod;
    private $usuario_cod;
    private $secretaria_cod;
    
    function getCod_documento() {
        return $this->cod_documento;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getAssunto() {
        return $this->assunto;
    }

    function getRedacao() {
        return $this->redacao;
    }

    function getData_documento() {
        return $this->data_documento;
    }

    function getTipo_documento_cod() {
        return $this->tipo_documento_cod;
    }

    function getUsuario_cod() {
        return $this->usuario_cod;
    }

    function getSecretaria_cod() {
        return $this->secretaria_cod;
    }

    function setCod_documento($cod_documento) {
        $this->cod_documento = $cod_documento;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setAssunto($assunto) {
        $this->assunto = $assunto;
    }

    function setRedacao($redacao) {
        $this->redacao = $redacao;
    }

    function setData_documento($data_documento) {
        $this->data_documento = $data_documento;
    }

    function setTipo_documento_cod($tipo_documento_cod) {
        $this->tipo_documento_cod = $tipo_documento_cod;
    }

    function setUsuario_cod($usuario_cod) {
        $this->usuario_cod = $usuario_cod;
    }

    function setSecretaria_cod($secretaria_cod) {
        $this->secretaria_cod = $secretaria_cod;
    }


    
}
