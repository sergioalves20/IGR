<?php

include_once 'conexao.php';
include_once 'NivelAcesso.php';

class DALNivelAcesso {
   private $conexao;
   
   
   function __construct($conexao) {
        $this->conexao = $conexao;
        $this->conexao = new Conexao();
    }

   
   public function getConexao() {
       return $this->conexao;
   }

   public function setConexao($conexao) {
       $this->conexao = $conexao;
   }


}
