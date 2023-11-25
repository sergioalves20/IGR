<?php

require_once 'Conexao.php';
require_once 'EstradaFicha.php';

class FxrodTipo extends EstradaFicha {
    private $id_fxrodtipo; 
    private $id_fxrod;
    private $terrabt;
    private $pedra;
    private $revsuperf;
    private $bb;
    private $bclas;
    private $via;

    public function __construct($id_fxrodtipo=0,$alt="",$reg="", $id_fxrod="", $id_estrada="", $data="", $hora="", $pkinicio="", $altitd_pki="",$lat_ci="",$lat_ni="",$long_ci="",$long_ni="", $pkfim="",$altitd_pkf="",$lat_cf="",$lat_nf="",$long_cf="",$long_nf="",  $terrabt="", $pedra="", $revsuperf="", $bb="", $bclas="", $via="", $ass="",$data_arq="",$arq="") {
       
        $this->setId_fxrodtipo($id_fxrodtipo);
        $this->setAlt($alt);
        $this->setReg($reg);
        $this->setId_fxrod($id_fxrod);
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
        $this->setTerrabt($terrabt);
        $this->setPedra($pedra);
        $this->setRevsuperf($revsuperf);
        $this->setBb($bb);
        $this->setBclas($bclas);
        $this->setVia($via);
        $this->setAss($ass);
        $this->setData_arq($data_arq);
        $this->setArq($arq);
    }
    public function getId_fxrodtipo() {
        return $this->id_fxrodtipo;
    }

    public function setId_fxrodtipo($valor) {
        $this->id_fxrodtipo = $valor;
    }

        public function getId_fxrod() {
        return $this->id_fxrod;
    }

    public function getTerrabt() {
        return $this->terrabt;
    }

    public function getPedra() {
        return $this->pedra;
    }

    public function getRevsuperf() {
        return $this->revsuperf;
    }

    public function getBb() {
        return $this->bb;
    }

    public function getBclas() {
        return $this->bclas;
    }

    public function getVia() {
        return $this->via;
    }

    public function setId_fxrod($valor) {
        $this->id_fxrod = $valor;
    }

    public function setTerrabt($valor) {
        $this->terrabt = $valor;
    }

    public function setPedra($valor) {
        $this->pedra = $valor;
    }

    public function setRevsuperf($valor) {
        $this->revsuperf = $valor;
    }

    public function setBb($valor) {
        $this->bb = $valor;
    }

    public function setBclas($valor) {
        $this->bclas = $valor;
    }

    public function setVia($valor) {
        $this->via = $valor;
    }

}
