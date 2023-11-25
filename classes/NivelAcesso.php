<?php

include_once 'conexao.php';

class NivelAcesso {
   private $id_nivel;
   private $nome_nivel;
   private $created;
   private $modified;
   
   public function __construct($id_nivel=0,$nome_nivel="",$created="",$modified="") {
       $this->setId_nivel($id_nivel);
       $this->setNome_nivel($nome_nivel);
       $this->setCreated($created);
       $this->setModified($modified);
   }

      public function getId_nivel() {
       return $this->id_nivel;
   }

   public function getNome_nivel() {
       return $this->nome_nivel;
   }

   public function getCreated() {
       return $this->created;
   }

   public function getModified() {
       return $this->modified;
   }

   public function setId_nivel($id_nivel) {
       $this->id_nivel = $id_nivel;
   }

   public function setNome_nivel($nome_nivel) {
       $this->nome_nivel = $nome_nivel;
   }

   public function setCreated($created) {
       $this->created = $created;
   }

   public function setModified($modified) {
       $this->modified = $modified;
   }


           
}
