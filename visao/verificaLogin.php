<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../Entidade/usuario.php';
require_once '../Controle/usuario_controle.php';


$usuario = $_POST["usuario"];
$senha = $_POST["senha"];

print_r($_POST);

//echo $_POST["senha"].' - '.$_POST["usuario"];

$user = new usuario();
$user->setNome_usuario($usuario);
$user->setSenha_usuario(base64_encode($senha));

$user_c = new usuario_controle();


$user_resul = new usuario();
$user_resul = $user_c->VerficaLogin($user);

echo $user_resul->getCod_tipo_usuário();

if ($user->getCod_tipo_usuário() == 1) {
    // 1 - ADMINISTRADOR DO SISTEMA
    session_start();
    
    $_SESSION["usuario"] = $user;
    header('location:../visao/area_administrativa.php');
}elseif ($user->getCod_tipo_usuário() == 2){
    
    // 2 - GESTOR DO SISTEMA
    session_start();
    
    $_SESSION["usuario"] = $user;
    header('location:../visao/area_administrativa.php');
    
}elseif ($user->getCod_tipo_usuário() == 3) {
   
    // 1 - ADMINISTRADOR DO SISTEMA
   session_start();
    
    $_SESSION["usuario"] = $user;
    header('location:../visao/area_administrativa.php');
}else{
   
  header('location:../index.php');
 
   
}

?>