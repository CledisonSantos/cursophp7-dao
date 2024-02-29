<?php

class Usuario
{

    private $idusuario;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;

    public function getIdusario()
    {

        return $this->idusuario;
    }
    public function setIdusuario($value)
    {

        $this->idusuario = $value;
    }
    public function getDeslogin()
    {

        return $this->deslogin;
    }
    public function setDeslogin($value)
    {

        $this->deslogin = $value;
    }
    public function getDessenha()
    {

        return $this->dessenha;
    }
    public function setDessenha($value)
    {

        $this->dessenha = $value;
    }
    public function getDtcadastro()
    {

        return $this->dtcadastro;
    }
    public function setDtcadastro($value)
    {

        $this->dtcadastro = $value;
    }

    /*
    *metodo retorna uma lista dos elementos da tabela
    */
    public static function getList()
    {

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");
    }
    public static function search($login)
    {
        $sql = new sql();
        return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER  BY deslogin", array(
            ':SEARCH' => "%" . $login . "%"
        ));
    }
    /*
    *metodo retorna apenas o elemento da tabela que foi selecionado 
    */
    public function loadById($id)
    {

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
            ":ID" => $id
        ));

        if (count($results) > 0) {

            $this->setData($results[0]);
        }
    }
    //metodo seleciona um usuario por login e senha
    public function login($login, $password)
    {

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(
            ":LOGIN" => $login,
            ":PASSWORD" => $password
        ));
        if (count($results) > 0) {

            $this->setData($results[0]);
        } else {

            throw new exception("login ou senha invalidos");
        }
    }
    //seta os dados obtidos atraves dos getrs
    public function setData($data)
    {

        $this->setIdusuario($data['idusuario']);
        $this->setDeslogin($data['deslogin']);
        $this->setDessenha($data['dessenha']);
        $this->setDtcadastro(new DateTime($data['dtcadastro']));
    }
    //metodo faz um insert no banco de dados 
    public function insert()
    {

        $sql = new Sql();
        $results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(

            ':LOGIN' =>$this->getDeslogin(),
            ':PASSWORD' =>$this->getDessenha()

        ));
        if (count($results) > 0) {

            $this->setData($results[0]);
        }
    }
    //metodo faz um updat no banco de dados
    public function update($login, $password)
    {
        $this->setDeslogin($login);
        $this->setDessenha($password);

     $sql = new Sql();
     $sql->run("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idusuario = :ID", array(
      'LOGIN' =>$this->getDeslogin(),
      'PASSWORD' =>$this->getDessenha(),
      'ID' =>$this->getIdusario()
     ));

    }
    //metodo construtor seta as informações para a incerção do login e senha
    public function __construct($login = "" ,$password= "")
    {
        $this->setDeslogin($login);
        $this->setDessenha($password);
    }
    public function __toString()
    {
        return json_encode(array(
            "idusuario" => $this->getIdusario(),
            "deslogin" => $this->getDeslogin(),
            "desseenha" => $this->getDessenha(),
            "detcadastro" => $this->getDtcadastro()->format("d/m/y h:i:s"),

        ));
    }
}
