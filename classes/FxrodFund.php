<?php

require_once 'Conexao.php';
require_once 'EstradaFicha.php';

class Fxrodfund extends EstradaFicha {
    private $id_fxrodfund;
    private $id_fxrod;
    private $via;
    private $natgeo;
    private $cbr;

    public function __construct($id_fxrodfund=0, $alt="",$reg="", $id_estrada="", $id_fxrod="", $data="", $hora="", $pkinicio="", $pkfim="", $via="", $natgeo="", $cbr="", $ass="") {
        $this->setId_fxrodfund($id_fxrodfund);
        $this->setAlt($alt);
        $this->setReg($reg);
        $this->setId_estrada($id_estrada);
        $this->setId_fxrod($id_fxrod);
        $this->setData($data);
        $this->setHora($hora);
        $this->setPkinicio($pkinicio);
        $this->setPkfim($pkfim);
        $this->setVia($via);
        $this->setNatgeo($natgeo);
        $this->setCbr($cbr);
        $this->setAss($ass);
    }
    public function getId_fxrodfund(){
        return $this->id_fxrodfund;
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

    public function getCbr() {
        return $this->cbr;
    }
    public function setId_fxrodfund($id_fxrodfund) {
        $this->id_fxrodfund = $id_fxrodfund;
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

    public function setCbr($cbr) {
        $this->cbr = $cbr;
    }

}
