<?php

require_once 'Conexao.php';
require_once 'EstradaFicha.php';

class Drensupf extends EstradaFicha {

    private $id_drensupf;
    private $tipo;
    private $material;

    public function __construct($id_drensupf = 0, $alt = "", $reg = "", $id_estrada = "", $data = "", $hora = "", $pkinicio = "", $altitd_pki = "", $lat_ci = "", $lat_ni = "", $long_ci = "", $long_ni = "", $pkfim = "", $altitd_pkf = "", $lat_cf = "", $lat_nf = "", $long_cf = "", $long_nf = "", $tipo = "", $material = "", $sentido = "", $ass = "", $data_arq = "", $arq = "") {
        $this->setId_drensupf($id_drensupf);
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
        $this->setTipo($tipo);
        $this->setMaterial($material);
        $this->setSentido($sentido);
        $this->setAss($ass);
        $this->setData_arq($data_arq);
        $this->setArq($arq);
    }

    public function getId_drensupf() {
        return $this->id_drensupf;
    }

    public function setId_drensupf($valor) {
        $this->id_drensupf = $valor;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getMaterial() {
        return $this->material;
    }

    public function setTipo($valor) {
        $this->tipo = $valor;
    }

    public function setMaterial($valor) {
        $this->material = $valor;
    }

}
