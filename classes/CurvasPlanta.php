<?php

require_once 'Conexao.php';
require_once 'EstradaFicha.php';

class CurvasPlanta extends EstradaFicha {

    private $id_curvap;
    private $raioplanta;

    public function __construct($id_curvap = 0, $alt = "", $reg = "", $id_estrada = "", $data = "", $hora = "", $pkinicio = "", $pkfim = "", $lat_c = "", $lat_n = "", $long_c = "", $long_n = "", $altitude = "", $sentido = "", $raioplanta = "", $ass = "", $data_arq = "", $arq = "") {
        $this->setId_curvap($id_curvap);
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
        $this->setSentido($sentido);
        $this->setRaioplanta($raioplanta);
        $this->setAss($ass);
        $this->setData_arq($data_arq);
        $this->setArq($arq);
    }

    public function getId_curvap() {
        return $this->id_curvap;
    }

    public function setId_curvap($valor) {
        $this->id_curvap = $valor;
    }

    public function getRaioplanta() {
        return $this->raioplanta;
    }

    public function setRaioplanta($valor) {
        $this->raioplanta = $valor;
    }

}
