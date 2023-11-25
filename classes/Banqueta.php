<?php
require_once 'Conexao.php';
require_once 'EstradaFicha.php';

class Banqueta extends EstradaFicha {
   private $id_banqueta;
   private $id_talude;
   private $banqueta;
   private $dstpetal;
   private $compt;
   private $largura;
   private $drcrista;
   private $material;
   private $lrgdrcrista;
   private $cptdrcrista;
   private $profund;
  
   public function __construct($id_banqueta=0,$alt="",$reg="",$id_talude="", $id_estrada="", $data="", $hora="", $banqueta="", $dstpetal="", $compt="", $largura="", 
                               $drcrista="", $material="", $lrgdrcrista="", $cptdrcrista="", $profund="", $ass="",$arq="",$data_arq="") {
           
       $this->setId_banqueta($id_banqueta);
       $this->setAlt($alt);
       $this->setReg($reg);
       $this->setId_talude($id_talude);
       $this->setId_estrada($id_estrada);   
       $this->setData($data);
       $this->setHora($hora);
       $this->setBanqueta($banqueta);
       $this->setDstpetal($dstpetal);
       $this->setCompt($compt);
       $this->setLargura($largura);
       $this->setDrcrista($drcrista);
       $this->setMaterial($material);
       $this->setLrgdrcrista($lrgdrcrista);
       $this->setCptdrcrista($cptdrcrista);
       $this->setProfund($profund);
       $this->setAss($ass);
       $this->setArq($arq);
       $this->setData_arq($data_arq);
   }
   public function getId_banqueta() {
       return $this->id_banqueta;
   }

   public function setId_banqueta($valor) {
       $this->id_banqueta = $valor;
   }

      public function getId_talude() {
       return $this->id_talude;
   }

   public function getBanqueta() {
       return $this->banqueta;
   }

   public function getDstpetal() {
       return $this->dstpetal;
   }

   public function getCompt() {
       return $this->compt;
   }

   public function getLargura() {
       return $this->largura;
   }

   public function getDrcrista() {
       return $this->drcrista;
   }

   public function getMaterial() {
       return $this->material;
   }

   public function getLrgdrcrista() {
       return $this->lrgdrcrista;
   }

   public function getCptdrcrista() {
       return $this->cptdrcrista;
   }

   public function getProfund() {
       return $this->profund;
   }

   public function setId_talude($valor) {
       $this->id_talude = $valor;
   }

   public function setBanqueta($valor) {
       $this->banqueta = $valor;
   }

   public function setDstpetal($valor) {
       $this->dstpetal = $valor;
   }

   public function setCompt($valor) {
       $this->compt = $valor;
   }

   public function setLargura($valor) {
       $this->largura = $valor;
   }

   public function setDrcrista($valor) {
       $this->drcrista = $valor;
   }

   public function setMaterial($valor) {
       $this->material = $valor;
   }

   public function setLrgdrcrista($valor) {
       $this->lrgdrcrista = $valor;
   }

   public function setCptdrcrista($valor) {
       $this->cptdrcrista = $valor;
   }

   public function setProfund($valor) {
       $this->profund = $valor;
   }



}