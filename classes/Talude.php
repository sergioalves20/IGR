<?php

require_once 'Conexao.php';
require_once 'EstradaFicha.php';

class Talude extends EstradaFicha {

    private $id_talude;
    private $nat;
    private $altura;
    private $inclin;
    private $tipo;
    private $nbanq;

    public function __construct($id_talude=0,$alt="",$reg="", $id_estrada="", $data="", $hora="", $pkinicio="", $altitd_pki="", $lat_ci="", $lat_ni="", $long_ci="", $long_ni="", $pkfim="", $altitd_pkf="", $lat_cf="", $lat_nf="", $long_cf="", $long_nf="", $nat="", $altura="", $inclin="", $tipo="", $sentido="", $nbanq="", $ass="",$arq="",$data_arq="") {
        $this->setId_talude($id_talude);
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
        $this->setInclin($inclin);
        $this->setTipo($tipo);
        $this->setSentido($sentido);
        $this->setNbanq($nbanq);
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

    public function getInclin() {
        return $this->inclin;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getNbanq() {
        return $this->nbanq;
    }

    public function setNat($valor) {
        $this->nat = $valor;
    }

    public function setAltura($valor) {
        $this->altura = $valor;
    }

    public function setInclin($valor) {
        $this->inclin = $valor;
    }

    public function setTipo($valor) {
        $this->tipo = $valor;
    }

    public function setNbanq($valor) {
        $this->nbanq = $valor;
    }
    public function getId_talude() {
        return $this->id_talude;
    }

    public function setId_talude($valor) {
        $this->id_talude = $valor;
    }


}
