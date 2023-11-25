<?php

require_once 'Conexao.php';
require_once 'EstradaFicha.php';

class Bermasbbdsg extends EstradaFicha{
    private $id_bermabbdsg;
    private $id_berma;
    private $granul;
    private $espess;
    private $betume;
    
    public function __construct($id_bermabbdsg=0,$alt="",$reg="", $id_berma="", $id_estrada="",$data="",$hora="",$pkinicio="",$pkfim="", $granul="", $espess="", $betume="",$sentido="",$ass="") {
        $this->setId_bermabbdsg($id_bermabbdsg);
        $this->setAlt($alt);
        $this->setReg($reg);
        $this->setId_berma($id_berma);
        $this->setId_estrada($id_estrada);
        $this->setData($data);
        $this->setHora($hora);
        $this->setPkinicio($pkinicio);
        $this->setPkfim($pkfim);
        $this->setGranul($granul);
        $this->setEspess($espess);
        $this->setBetume($betume);
        $this->setSentido($sentido);
        $this->setAss($ass);
    }
    public function getId_bermabbdsg() {
        return $this->id_bermabbdsg;
    }
    public function getId_berma() {
        return $this->id_berma;
    }

    public function getGranul() {
        return $this->granul;
    }

    public function getEspess() {
        return $this->espess;
    }

    public function getBetume() {
        return $this->betume;
    }
    public function setId_bermabbdsg($id_bermabbdsg) {
        $this->id_bermabbdsg = $id_bermabbdsg;
    }
    public function setId_berma($id_berma) {
        $this->id_berma = $id_berma;
    }

    public function setGranul($granul) {
        $this->granul = $granul;
    }

    public function setEspess($espess) {
        $this->espess = $espess;
    }

    public function setBetume($betume) {
        $this->betume = $betume;
    }


}
