<?php
require_once 'Conexao.php';

class Visitobra {
   private $id_visitobra;
   private $data;
   private $hora;
   private $id_intervencao;
   private $executada;
   private $pkinicio;
   private $pkfim;
   private $quant;
   private $obsrv;
   private $foto1;
   private $foto2;
   private $ass;
   
   public function __construct($id_visitobra=0, $data="",$hora="", $id_intervencao="", $executada="", $pkinicio="", $pkfim="", $quant="", $obsrv="", $foto1="", $foto2="", $ass="") {
       $this->setId_visitobra($id_visitobra);
       $this->setData($data);
       $this->setHora($hora);
       $this->setId_intervencao($id_intervencao);
       $this->setExecutada($executada);
       $this->setPkinicio($pkinicio);
       $this->setPkfim($pkfim);
       $this->setQuant($quant);
       $this->setObsrv($obsrv);
       $this->setFoto1($foto1);
       $this->setFoto2($foto2);
       $this->setAss($ass);
   }
   public function getId_visitobra() {
       return $this->id_visitobra;
   }

   public function getData() {
       return $this->data;
   }

   public function getHora() {
       return $this->hora;
   }

   public function getId_intervencao() {
       return $this->id_intervencao;
   }

   public function getExecutada() {
       return $this->executada;
   }

   public function getPkinicio() {
       return $this->pkinicio;
   }

   public function getPkfim() {
       return $this->pkfim;
   }

   public function getQuant() {
       return $this->quant;
   }

   public function getObsrv() {
       return $this->obsrv;
   }

   public function getFoto1() {
       return $this->foto1;
   }

   public function getFoto2() {
       return $this->foto2;
   }

   public function getAss() {
       return $this->ass;
   }

   public function setId_visitobra($id_visitobra) {
       $this->id_visitobra = $id_visitobra;
   }

   public function setData($data) {
       $this->data = $data;
   }

   public function setHora($hora) {
       $this->hora = $hora;
   }

   public function setId_intervencao($id_intervencao) {
       $this->id_intervencao = $id_intervencao;
   }

   public function setExecutada($executada) {
       $this->executada = $executada;
   }

   public function setPkinicio($pkinicio) {
       $this->pkinicio = $pkinicio;
   }

   public function setPkfim($pkfim) {
       $this->pkfim = $pkfim;
   }

   public function setQuant($quant) {
       $this->quant = $quant;
   }

   public function setObsrv($obsrv) {
       $this->obsrv = $obsrv;
   }

   public function setFoto1($foto1) {
       $this->foto1 = $foto1;
   }

   public function setFoto2($foto2) {
       $this->foto2 = $foto2;
   }

   public function setAss($ass) {
       $this->ass = $ass;
   }


}
