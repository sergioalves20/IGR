<meta charset=utf-8" />
<?php
require_once 'Conexao.php';
class Usuario {
    private $id_usuario;
    private $nome;
    private $login;
    private $email;
    private $senha;
    private $nivel;
    private $data;
    private $ativo;
    

        public function __construct($id_usuario=0, $nome="", $email="",$login="",$senha="",$nivel="",$data="",$ativo="") {
        $this->setId_usuario($id_usuario);
        $this->setNome($nome);
        $this->setEmail($email);
        $this->setLogin($login);
        $this->setSenha($senha);
        $this->setNivel($nivel);
        $this->setData($data);
        $this->setAtivo($ativo);
    }
    public function getAtivo() {
        return $this->ativo;
    }

    public function setAtivo($ativo) {
        $this->ativo = $ativo;
    }

    public function getId_usuario() {
        return $this->id_usuario;
    }
   public function getNome() {
        return $this->nome;
    }

    public function setNome($valor) {
        $this->nome = $valor;
    }
    public function setId_usuario($valor) {
        $this->id_usuario = $valor;
    }
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($valor) {
        $this->email = $valor;
    }
    function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
    }

    function setLogin($valor) {
        $this->login = $valor;
    }

    function setSenha($valor) {
        $this->senha = $valor;
    }
    public function getData() {
        return $this->data;
    }

    public function setData($valor) {
        $this->data = $valor;
    }

    public function getNivel() {
        return $this->nivel;
    }

    public function setNivel($valor) {
        $this->nivel = $valor;
    }



}
