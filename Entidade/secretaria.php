<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of secretaria
 *
 * @author DanielSantos
 */
class secretaria {
    
    private $cod_secretaria;
    private $nome_secretaria;
    
    
    function getCod_secretaria() {
        return $this->cod_secretaria;
    }

    function getNome_secretaria() {
        return $this->nome_secretaria;
    }

    
    function setCod_secretaria($cod_secretaria) {
        $this->cod_secretaria = $cod_secretaria;
    }

    function setNome_secretaria($nome_secretaria) {
        $this->nome_secretaria = $nome_secretaria;
    }

    

}
