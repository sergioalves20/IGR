<?php

require_once 'Conexao.php';
require_once 'EstradaFicha.php';

class PHidraulica extends EstradaFicha {

    private $id_ph;
    private $material;
    private $forma;
    private $largura_ph;
    private $altura_ph;
    private $diametro;
    private $septos;
    private $altura_sp;
    private $largura_sp;

    public function __construct($id_ph=0,$alt="",$reg="", $id_estrada="", $data="", $hora="", $pkinicio="", $pkfim="", $lat_c="", $lat_n="", $long_c="", $long_n="", $altitude="", $material="", $forma="", $largura_ph="", $altura_ph="", $diametro="", $septos="", $altura_sp="", $largura_sp="", $ass="",$arq="",$data_arq="") {
        $this->setId_ph($id_ph);
        $this->setAlt($alt);
        $this->setReg($reg);
        $this->setId_estrada($id_estrada);
        $this->setData($data);
        $this->setHora($hora);
        $this->setPkinicio($pkinicio);
        $this->setPkfim($pkfim);
        $this->setLat_c($lat_c);
        $this->setLat_n($lat_n);
        $this->setLong_c($long_c);
        $this->setLong_n($long_n);
        $this->setAltitude($altitude);
        $this->setMaterial($material);
        $this->setForma($forma);
        $this->setLargura_ph($largura_ph);
        $this->setAltura_ph($altura_ph);
        $this->setDiametro($diametro);
        $this->setSeptos($septos);
        $this->setAltura_sp($altura_sp);
        $this->setLargura_sp($largura_sp);
        $this->setAss($ass);
        $this->setArq($arq);
        $this->setData_arq($data_arq);
    }
    public function getId_ph() {
        return $this->id_ph;
    }

    public function setId_ph($valor) {
        $this->id_ph = $valor;
    }

        public function getMaterial() {
        return $this->material;
    }

    public function getForma() {
        return $this->forma;
    }

    public function getLargura_ph() {
        return $this->largura_ph;
    }

    public function getAltura_ph() {
        return $this->altura_ph;
    }

    public function getDiametro() {
        return $this->diametro;
    }

    public function getSeptos() {
        return $this->septos;
    }

    public function getAltura_sp() {
        return $this->altura_sp;
    }

    public function getLargura_sp() {
        return $this->largura_sp;
    }

    public function setMaterial($valor) {
        $this->material = $valor;
    }

    public function setForma($valor) {
        $this->forma = $valor;
    }

    public function setLargura_ph($valor) {
        $this->largura_ph = $valor;
    }

    public function setAltura_ph($valor) {
        $this->altura_ph = $valor;
    }

    public function setDiametro($valor) {
        $this->diametro = $valor;
    }

    public function setSeptos($valor) {
        $this->septos = $valor;
    }

    public function setAltura_sp($valor) {
        $this->altura_sp = $valor;
    }

    public function setLargura_sp($valor) {
        $this->largura_sp = $valor;
    }

}
