<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipoDocumento
 *
 * @author DanielSantos
 */
class tipoDocumento {
    private $cod_tipo_documento;
    private $nome_tipo;
    
    function getCod_tipo_documento() {
        return $this->cod_tipo_documento;
    }

    function getNome_tipo() {
        return $this->nome_tipo;
    }

    function setCod_tipo_documento($cod_tipo_documento) {
        $this->cod_tipo_documento = $cod_tipo_documento;
    }

    function setNome_tipo($nome_tipo) {
        $this->nome_tipo = $nome_tipo;
    }


}
