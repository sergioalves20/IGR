<?php

require_once 'Conexao.php';
require_once 'EstradaFicha.php';

class Intersecao extends EstradaFicha {
    private $id_intrs;
    private $desniv;
    private $denivel;

    public function __construct($id_intrs=0,$alt="",$reg="", $id_estrada="", $data="", $hora="", $pkinicio="", $pkfim="", $lat_c="", $lat_n="", $long_c="", $long_n="", $altitude="", $desniv="", $denivel="", $sentido="", $ass="",$arq="",$data_arq="") {
        $this->setId_intrs($id_intrs);
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
        $this->setDesniv($desniv);
        $this->setDenivel($denivel);
        $this->setSentido($sentido);
        $this->setAss($ass);
        $this->setArq($arq);
        $this->setData_arq($data_arq);
    }

    public function getDesniv() {
        return $this->desniv;
    }

    public function getDenivel() {
        return $this->denivel;
    }

    public function setDesniv($valor) {
        $this->desniv = $valor;
    }

    public function setDenivel($valor) {
        $this->denivel = $valor;
    }
    public function getId_intrs() {
        return $this->id_intrs;
    }

    public function setId_intrs($valor) {
        $this->id_intrs = $valor;
    }


}
