<?php
require_once 'Conexao.php';
require_once 'EstradaFicha.php';

class Sinalvt extends EstradaFicha {
    private $id_sinalvt;
    private $sinalvt;

    public function __construct($id_sinalvt=0,$alt="",$reg="", $id_estrada="", $data="", $hora="", $pkinicio="", $pkfim="", $lat_c="", $lat_n="", $long_c="", $long_n="", $altitude="", $sinalvt="", $sentido="", $ass="") {
        $this->setId_sinalvt($id_sinalvt);
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
        $this->setSinalvt($sinalvt);
        $this->setSentido($sentido);
        $this->setAss($ass);
    }
    public function getId_sinalvt() {
        return $this->id_sinalvt;
    }

    public function setId_sinalvt($valor) {
        $this->id_sinalvt = $valor;
    }

        public function getSinalvt() {
        return $this->sinalvt;
    }

    public function setSinalvt($valor) {
        $this->sinalvt = $valor;
    }

}
