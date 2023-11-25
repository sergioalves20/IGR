<?php

require_once 'Conexao.php';
require_once 'EstradaFicha.php';

class Muros extends EstradaFicha {
    private $id_muro;
    private $nat;
    private $altura;
    private $espess;

    public function __construct($id_muro=0,$alt="",$reg="", $id_estrada="", $data="", $hora="", $pkinicio="", $altitd_pki="", $lat_ci="", $lat_ni="", $long_ci="", $long_ni="", $pkfim="", $altitd_pkf="", $lat_cf="", $lat_nf="", $long_cf="", $long_nf="", $nat="", $altura="", $espess="", $sentido="", $ass="",$arq="",$data_arq="") {
        $this->setId_muro($id_muro);
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
        $this->setNat($nat);
        $this->setAltura($altura);
        $this->setEspess($espess);
        $this->setSentido($sentido);
        $this->setAss($ass);
        $this->setArq($arq);
        $this->setData_arq($data_arq);
    }

    public function getNat() {
        return $this->nat;
    }

    public function getAltura() {
        return $this->altura;
    }

    public function getEspess() {
        return $this->espess;
    }

    public function setNat($valor) {
        $this->nat = $valor;
    }

    public function setAltura($valor) {
        $this->altura = $valor;
    }

    public function setEspess($valor) {
        $this->espess = $valor;
    }
    public function getId_muro() {
        return $this->id_muro;
    }

    public function setId_muro($valor) {
        $this->id_muro = $valor;
    }


}
