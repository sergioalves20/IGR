<?php
class Conexao {
   private $servidor;
   private $usuario;
   private $senha;
   private $nomeBanco;
   private $banco;
   
   function __construct($servidor="localhost", $usuario="root", $senha="", $nomeBanco ="igr") {
       $this->servidor = $servidor;
       $this->usuario = $usuario;
       $this->senha = $senha;
       $this->nomeBanco = $nomeBanco; 
       $this->conectar();
   }
  
   public function conectar() {
        $this->banco = new mysqli(
        $this->getServidor(),
        $this->getUsuario(),
        $this->getSenha(),
        $this->getNomeBanco());
        if($this->banco->connect_error){
            die('Erro de conexão('.$this->banco->connect_errno.'):'
                    .$this->banco->connect_error);  
            
        }
   }
   function getServidor() {
       return $this->servidor;
   }

   function getUsuario() {
       return $this->usuario;
   }

   function getSenha() {
       return $this->senha;
   }

   function getNomeBanco() {
       return $this->nomeBanco;
   }

   function getBanco() {
       return $this->banco;
   }

   function setServidor($servidor) {
       $this->servidor = $servidor;
   }

   function setUsuario($usuario) {
       $this->usuario = $usuario;
   }

   function setSenha($senha) {
       $this->senha = $senha;
   }

   function setNomeBanco($nomeBanco) {
       $this->nomeBanco = $nomeBanco;
   }

   function setBanco($banco) {
       $this->banco = $banco;
   }

   public function desconectar() {
       $this->banco->close();
   }  
     
}
