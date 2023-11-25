<?php
require_once 'Conexao.php';

class Precos {
   private $ilha;
   private $data;
   private $tipobra;
   private $trabalhos;
   private $cod;
   private $preco;
   private $descr;
   
   public function __construct($ilha="",$data="", $tipobra="",$trabalhos="",$cod="",$descr="",$preco="") {
       $this->ilha = $ilha;
       $this->data = $data;
       $this->tipobra = $tipobra;
       $this->trabalhos = $trabalhos;
       $this->cod = $cod;
       $this->descr = $descr;
       $this->preco = $preco;
       
   }
   public function getData() {
       return $this->data;
   }

   public function setData($data) {
       $this->data = $data;
   }

      public function getTrabalhos() {
       return $this->trabalhos;
   }

   public function setTrabalhos($trabalhos) {
       $this->trabalhos = $trabalhos;
   }

      public function getDescr() {
       return $this->descr;
   }

   public function setDescr($descr) {
       $this->descr = $descr;
   }

   
      public function getIlha() {
       return $this->ilha;
   }

   public function getTipobra() {
       return $this->tipobra;
   }

   public function getCod() {
       return $this->cod;
   }

   public function getPreco() {
       return $this->preco;
   }

   public function setIlha($ilha) {
       $this->ilha = $ilha;
   }

   public function setTipobra($tipobra) {
       $this->tipobra = $tipobra;
   }

   public function setCod($cod) {
       $this->item = $cod;
   }

   public function setPreco($preco) {
       $this->preco = $preco;
   }

}
