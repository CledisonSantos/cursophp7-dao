<?php

/*
classe extende da classe PDO para utilizar 
dos metodos ja existentes com excute,bindParam,prepare... etc
*/

class Sql extends PDO
{

  private $conn;

  //metodo de conexão do banco de dados
  public function __construct()
  {

    $this->conn = new PDO("mysql:host=localhost;dbname=dbphp7","root","");
  }
  //metodo  recebe os parametros 
  private function setParams($statement, $parameters = array())
  {

    foreach ($parameters as $key => $value) {
      
      $this->setParam($statement, $key, $value);
    }
  }

  private function setParam($statement, $key, $value)
  {

    $statement->bindParam($key, $value);

  }

  //metodo que executa  querys no banco de dados
  public function run($rawQuery, $params = array())
  {

    $stmt = $this->conn->prepare($rawQuery);

    $this->setParams($stmt, $params);
    $stmt->execute();
    return $stmt;
  }

  //metodo seclect
  public function select($rawQuery, $params = array()):array
  {

    $stmt = $this->run($rawQuery,$params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
