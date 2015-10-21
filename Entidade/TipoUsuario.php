<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TipoUsuario
 *
 * @author DanielSantos
 */
class TipoUsuario {
    
    private $cod_TipoUsuario;
    private $nome_tipoUsuario;
    
    
    
    
    function getCod_TipoUsuario() {
        return $this->cod_TipoUsuario;
    }

    function getTipoUsuario() {
        return $this->tipoUsuario;
    }

    function setCod_TipoUsuario($cod_TipoUsuario) {
        $this->cod_TipoUsuario = $cod_TipoUsuario;
    }

    function setTipoUsuario($tipoUsuario) {
        $this->tipoUsuario = $tipoUsuario;
    }


}
