<?php

require_once 'Conexao.php';
require_once 'EstradaFicha.php';

class Singularidade extends EstradaFicha {

    private $id_sing;
    private $singularidade;

    public function __construct($id_sing=0, $alt="",$reg="", $id_estrada="", $data="", $hora="", $pkinicio="", $pkfim="", $lat_c="", $lat_n="", $long_c="", $long_n="", $altitude="", $singularidade="", $ass="",$arq="",$data_arq="") {
        $this->setId_sing($id_sing);
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
        $this->setSingularidade($singularidade);
        $this->setAss($ass);
        $this->setArq($arq);
        $this->setData_arq($data_arq);
    }

    function getSingularidade() {
        return $this->singularidade;
    }

    function setSingularidade($valor) {
        $this->singularidade = $valor;
    }
    public function getId_sing() {
        return $this->id_sing;
    }

    public function setId_sing($valor) {
        $this->id_sing = $valor;
    }


}
