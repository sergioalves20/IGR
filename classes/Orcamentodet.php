<?php
require_once 'Conexao.php';
require_once 'EstradaFicha.php';

class Orcamentodet extends EstradaFicha {
    
        private $id_orcdet;
        private $id_orc;
        private $trabalhos;
        private $cod;
        private $quant;
        private $preco;
        
        public function __construct($id_orcdet=0, $id_orc="", $trabalhos="",$pkinicio="",$pkfim="", $cod="", $quant="", $preco="",$ass="") {
            $this->setId_orcdet($id_orcdet);
            $this->setId_orc($id_orc);
            $this->setTrabalhos($trabalhos);
            $this->setPkinicio($pkinicio);
            $this->setPkfim($pkfim);
            $this->setCod($cod);
            $this->setQuant($quant);
            $this->setPreco($preco);
            $this->setAss($ass);
            
        }
         public function getId_orcdet() {
            return $this->id_orcdet;
        }

        public function getId_orc() {
            return $this->id_orc;
        }

        public function getTrabalhos() {
            return $this->trabalhos;
        }

        public function getCod() {
            return $this->cod;
        }

        public function getQuant() {
            return $this->quant;
        }

        public function getPreco() {
            return $this->preco;
        }

        public function setId_orcdet($id_orcdet) {
            $this->id_orcdet = $id_orcdet;
        }

        public function setId_orc($id_orc) {
            $this->id_orc = $id_orc;
        }

        public function setTrabalhos($trabalhos) {
            $this->trabalhos = $trabalhos;
        }

        public function setCod($cod) {
            $this->cod = $cod;
        }

        public function setQuant($quant) {
            $this->quant = $quant;
        }

        public function setPreco($preco) {
            $this->preco = $preco;
        }
        
}
