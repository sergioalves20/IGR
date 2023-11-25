<?php

require_once 'Conexao.php';
require_once 'EstradaFicha.php';

class Fxrod extends EstradaFicha {
    private $id_fxrod;
    private $nvias;
    private $larg1;
    private $larg2;
    private $larg3;
    private $larg4;
    private $larg5;
    private $larg6;

    public function __construct($id_fxrod=0,$alt="",$reg="", $id_estrada="", $data="", $hora="", $pkinicio="", $altitd_pki="",$lat_ci="",$lat_ni="",$long_ci="",$long_ni="", $pkfim="",$altitd_pkf="",$lat_cf="",$lat_nf="",$long_cf="",$long_nf="", $nvias="", $larg1="", $larg2="", $larg3="", $larg4="", $larg5="", $larg6="", $ass="",$data_arq="",$arq="") {
        $this->setId_fxrod($id_fxrod);
        $this->setAlt($alt);
        $this->setReg($reg);
        $this->setId_estrada($id_estrada);
        $this->setData($data);
        $this->setHora($hora);
        $this->setPkinicio($pkinicio);
        $this->setAltitd_pki($altitd_pki);
        $this->setLat_ci($lat_ci);
        $this->setLat_ni($lat_ni);
        $this->setLong_ci($long_ci);
        $this->setLong_ni($long_ni);
        $this->setPkfim($pkfim);
        $this->setAltitd_pkf($altitd_pkf);
        $this->setLat_cf($lat_cf);
        $this->setLat_nf($lat_nf);
        $this->setLong_cf($long_cf);
        $this->setLong_nf($long_nf);
        $this->setNvias($nvias);
        $this->setLarg1($larg1);
        $this->setLarg2($larg2);
        $this->setLarg3($larg3);
        $this->setLarg4($larg4);
        $this->setLarg5($larg5);
        $this->setLarg6($larg6);
        $this->setAss($ass);
        $this->setData_arq($data_arq);
        $this->setArq($arq);
    }
    public function getId_fxrod() {
        return $this->id_fxrod;
    }

    public function setId_fxrod($valor) {
        $this->id_fxrod = $valor;
    }

        public function getNvias() {
        return $this->nvias;
    }

    public function getLarg1() {
        return $this->larg1;
    }

    public function getLarg2() {
        return $this->larg2;
    }

    public function getLarg3() {
        return $this->larg3;
    }

    public function getLarg4() {
        return $this->larg4;
    }

    public function getLarg5() {
        return $this->larg5;
    }

    public function getLarg6() {
        return $this->larg6;
    }

    public function setNvias($valor) {
        $this->nvias = $valor;
    }

    public function setLarg1($valor) {
        $this->larg1 = $valor;
    }

    public function setLarg2($valor) {
        $this->larg2 = $valor;
    }

    public function setLarg3($valor) {
        $this->larg3 = $valor;
    }

    public function setLarg4($valor) {
        $this->larg4 = $valor;
    }

    public function setLarg5($valor) {
        $this->larg5 = $valor;
    }

    public function setLarg6($valor) {
        $this->larg6 = $valor;
    }

}
