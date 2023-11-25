<?php

require_once 'Conexao.php';
require_once 'EstradaFicha.php';

class CurvasVerticais extends EstradaFicha {

    private $id_curvav;
    private $raiovertical;

    public function __construct($id_curvav=0,$alt="",$reg="", $id_estrada="", $data="", $hora="", $pkinicio="", $pkfim="", $lat_c="", $lat_n="", $long_c="", $long_n="", $altitude="", $sentido="", $raiovertical="", $ass="",$data_arq="",$arq="") {
        $this->setId_curvav($id_curvav);
        $this->setReg($reg);
        $this->setAlt($alt);
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
        $this->setSentido($sentido);
        $this->setRaiovertical($raiovertical);
        $this->setAss($ass);
        $this->setData_arq($data_arq);
        $this->setArq($arq);
       
    }
    public function getId_curvav() {
        return $this->id_curvav;
    }

    public function setId_curvav($valor) {
        $this->id_curvav = $valor;
    }

        public function getRaiovertical() {
        return $this->raiovertical;
    }

    public function setRaiovertical($valor) {
        $this->raiovertical = $valor;
    }

}
