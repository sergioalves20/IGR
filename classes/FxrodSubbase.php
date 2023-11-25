<?php

require_once 'Conexao.php';
require_once 'EstradaFicha.php';

class FxrodSubbase extends EstradaFicha {
    private $id_fxrodsubbase;
    private $id_fxrod;
    private $via;
    private $natgeo;
    private $granul;
    private $espess;

    public function __construct($id_fxrodsubbase=0,$alt="",$reg="", $id_fxrod="", $id_estrada="", $data="", $hora="", $pkinicio="", $pkfim="", $via="", $natgeo="", $granul="", $espess="", $ass="") {
        $this->setId_fxrodsubbase($id_fxrodsubbase);
        $this->setAlt($alt);
        $this->setReg($reg);
        $this->setId_fxrod($id_fxrod);
        $this->setId_estrada($id_estrada);
        $this->setData($data);
        $this->setHora($hora);
        $this->setPkinicio($pkinicio);
        $this->setPkfim($pkfim);
        $this->setVia($via);
        $this->setNatgeo($natgeo);
        $this->setGranul($granul);
        $this->setEspess($espess);
        $this->setAss($ass);
    }
    public function getId_fxrodsubbase() {
        return $this->id_fxrodsubbase;
    }
    public function getId_fxrod() {
        return $this->id_fxrod;
    }

    public function getVia() {
        return $this->via;
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
    public function setId_fxrodsubbase($id_fxrodsubbase) {
        $this->id_fxrodsubbase = $id_fxrodsubbase;
    }
    public function setId_fxrod($id_fxrod) {
        $this->id_fxrod = $id_fxrod;
    }

    public function setVia($via) {
        $this->via = $via;
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
