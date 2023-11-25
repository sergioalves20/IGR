<?php

require_once 'Conexao.php';
require_once 'EstradaFicha.php';

class BermasFund extends EstradaFicha{
   private $id_bermafund;
   private $id_berma;
   private $natgeo;
   private $cbr;
   
   public function __construct($id_bermafund=0,$alt="",$reg="",$id_berma="", $id_estrada="", $data="",$hora="",$pkinicio="",$pkfim="", $natgeo="", $cbr="",$sentido="",$ass="") {
       $this->setid_bermafund($id_bermafund);
       $this->setAlt($alt);
       $this->setReg($reg);
       $this->setId_berma($id_berma);
       $this->setId_estrada($id_estrada);
       $this->setData($data);
       $this->setHora($hora);
       $this->setPkinicio($pkinicio);
       $this->setPkfim($pkfim);
       $this->setNatgeo($natgeo);
       $this->setCbr($cbr);
       $this->setSentido($sentido);
       $this->setAss($ass);
   }
   public function getId_bermafund() {
       return $this->id_bermafund;
   }
   public function getId_berma() {
       return $this->id_berma;
   }

   public function getNatgeo() {
       return $this->natgeo;
   }

   public function getCbr() {
       return $this->cbr;
   }
   public function setId_bermafund($id_bermafund) {
       $this->id_bermafund = $id_bermafund;
   }
   public function setId_berma($id_berma) {
       $this->id_berma = $id_berma;
   }

   public function setNatgeo($natgeo) {
       $this->natgeo = $natgeo;
   }

   public function setCbr($cbr) {
       $this->cbr = $cbr;
   }


}
