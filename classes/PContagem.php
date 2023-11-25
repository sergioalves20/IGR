<?php

require_once 'Conexao.php';
require_once 'EstradaFicha.php';

class PContagem extends EstradaFicha {
    private $id_pcontagem;
    private $pk;
    private $sitio;

    public function __construct($id_pcontagem = 0, $alt="",$reg="",$data="", $hora="", $id_estrada="", $pk="",$sentido="", $sitio="", $lat_c="", $lat_n="", $long_c="", $long_n="", $altitude="", $ass="", $arq="",$data_arq="") {
        $this->setId_pcontagem($id_pcontagem);
        $this->setReg($reg);
        $this->setAlt($alt);
        $this->setData($data);
        $this->setHora($hora);
        $this->setId_estrada($id_estrada);
        $this->setPk($pk);
        $this->setSentido($sentido);
        $this->setSitio($sitio);
        $this->setLat_c($lat_c);
        $this->setLat_n($lat_n);
        $this->setLat_n($lat_n);
        $this->setLong_c($long_c);
        $this->setLong_n($long_n);
        $this->setAltitude($altitude);
        $this->setAss($ass);
        $this->setArq($arq);
        $this->setData_arq($data_arq);
    }
    public function getId_pcontagem() {
        return $this->id_pcontagem;
    }
    public function getPk() {
        return $this->pk;
    }

    public function getSitio() {
        return $this->sitio;
    }

    public function setPk($pk) {
        $this->pk = $pk;
    }

    public function setSitio($sitio) {
        $this->sitio = $sitio;
    }
     public function setId_pcontagem($id_pcontagem) {
        $this->id_pcontagem = $id_pcontagem;
    }
}
