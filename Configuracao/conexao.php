<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$host = '127.0.0.1';
$bdUsuario = 'root';
$bdSenha = '';
$bdBanco = 'docoficial';



function ConectarBanco() {
    
    
    $conexao = mysql_connect('127.0.0.1','root','');
    $db = mysql_select_db('docoficial', $conexao);
    
    if ($conexao && $db) {
       // echo " Método Conectar Banco: " . $conexao;
    } else {
        echo "Problemas para conectar: ". mysql_error();
    }
    
    return $conexao;
}

function selecionarBanco($link) {
    mysql_select_db('docoficial', $link);
}

function FecharConexao($con) {
    mysql_close($con);
}
