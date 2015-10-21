<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pessoa
 *
 * @author DanielSantos
 */
class pessoa {
    
     private $cod_pessoa;
     private $cpf;
     private $matricula;
     private $nome_pessoa;
     
     function getCod_pessoa() {
         return $this->cod_pessoa;
     }

     function getCpf() {
         return $this->cpf;
     }

     function getMatricula() {
         return $this->matricula;
     }

     function getNome_pessoa() {
         return $this->nome_pessoa;
     }

     function setCod_pessoa($cod_pessoa) {
         $this->cod_pessoa = $cod_pessoa;
     }

     function setCpf($cpf) {
         $this->cpf = $cpf;
     }

     function setMatricula($matricula) {
         $this->matricula = $matricula;
     }

     function setNome_pessoa($nome_pessoa) {
         $this->nome_pessoa = $nome_pessoa;
     }


}
