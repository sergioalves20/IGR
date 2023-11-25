<?php

require_once 'Conexao.php';
require_once 'EstradaFicha.php';

class Fxrodbbdsg extends EstradaFicha {
    private $id_fxrodbbdsg;
    private $id_fxrod;   
    private $via;
    private $granul;
    private $espess;
    private $betume;

    public function __construct($id_fxrodbbdsg=0,$alt="",$reg="", $id_fxrod="", $id_estrada="", $data="", $hora="", $pkinicio="", $pkfim="", $via="", $granul="", $espess="", $betume="", $ass="") {
        $this->setId_fxrodbbdsg($id_fxrodbbdsg);
        $this->setAlt($alt);
        $this->setReg($reg);
        $this->setId_fxrod($id_fxrod);
        $this->setId_estrada($id_estrada);
        $this->setData($data);
        $this->setHora($hora);
        $this->setPkinicio($pkinicio);
        $this->setPkfim($pkfim);
        $this->setVia($via);
        $this->setGranul($granul);
        $this->setEspess($espess);
        $this->setBetume($betume);
        $this->setAss($ass);
    }
     public function getId_fxrodbbdsg() {
        return $this->id_fxrodbbdsg;
    }
    public function getId_fxrod() {
        return $this->id_fxrod;
    }

    public function getVia() {
        return $this->via;
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
     public function setId_fxrodbbdsg($id_fxrodbbdsg) {
        $this->id_fxrodbbdsg = $id_fxrodbbdsg;
    }
    public function setId_fxrod($id_fxrod) {
        $this->id_fxrod = $id_fxrod;
    }

    public function setVia($via) {
        $this->via = $via;
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
