<?php
require_once("config.php");
/*
*trecho trás todas as informações da table selecionada 
$sql = new Sql();

$usuarios = $sql->select("SELECT*FROM tb_usuarios");

echo json_encode($usuarios);
*/
$user = new Usuario();

$user->loadById(4);

echo $user;
?>