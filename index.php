<?php
require_once("config.php");
/*
*trecho trás todas as informações da table selecionada 
$sql = new Sql();

$usuarios = $sql->select("SELECT*FROM tb_usuarios");

echo json_encode($usuarios);
*/
/*
    *metodo retorna um usuario
    $user = new Usuario();

$user->loadById(4);

echo $user;
    */
/*
    *retorna uma lista de usuarios
     $lista = Usuario::getList();

  echo json_encode($lista);
    */
/*
    *carrega uma lista de usuarios buscando pelo login
    $busca = Usuario::search('td');

echo json_encode($busca);
    */
    /*
    *retorna um usuario pelo login e senha
     $usuario = new Usuario();
    $usuario->login("obarabo","00000");
    echo $usuario;
    */
    /*
    *inserir um usuario no banco de dados
     $user = new Usuario("cledison","12345");
   $user->insert();

   echo $user;
    */
    /*
    *alterar um usuario
    $usuario = new Usuario();

    $usuario->loadById(4);    

    $usuario->update("programaDOR", "4566778");

    echo $usuario;
    */
    /*
    *deletar um usuario
    $usuario = new Usuario();
    $usuario->loadById(11);
    $usuario->delete();
    echo $usuario;

    */
    
