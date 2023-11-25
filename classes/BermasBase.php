<?php

require_once 'Conexao.php';
require_once 'EstradaFicha.php';

class BermasBase extends EstradaFicha {
    private $id_bermabase;
    private $id_berma;
    private $natgeo;
    private $granul;
    private $espess;

    public function __construct($id_bermabase=0,$alt="",$reg="", $id_berma="", $id_estrada="", $data="", $hora="", $pkinicio="", $pkfim="", $natgeo="", $granul="", $espess="", $sentido="", $ass="") {
        $this->setId_bermabase($id_bermabase);
        $this->setAlt($alt);
        $this->setReg($reg); 
        $this->setId_berma($id_berma);      
        $this->setId_estrada($id_estrada);
        $this->setData($data);
        $this->setHora($hora);
        $this->setPkinicio($pkinicio);
        $this->setPkfim($pkfim);
        $this->setNatgeo($natgeo);
        $this->setGranul($granul);
        $this->setEspess($espess);
        $this->setSentido($sentido);
        $this->setAss($ass);
    }
    public function getId_bermabase() {
        return $this->id_bermabase;
    }
    public function getId_berma() {
        return $this->id_berma;
    }

    public function getNatgeo() {
        return $this->natgeo;
    }

    public function getGranul() {
        return $this->granul;
    }

    public function getEspess() {
        return $this->espess;
    }
    public function setId_bermabase($id_bermabase) {
        $this->id_bermabase = $id_bermabase;
    }
    public function setId_berma($id_berma) {
        $this->id_berma = $id_berma;
    }

    public function setNatgeo($natgeo) {
        $this->natgeo = $natgeo;
    }

    public function setGranul($granul) {
        $this->granul = $granul;
    }

    public function setEspess($espess) {
        $this->espess = $espess;
    }

}
