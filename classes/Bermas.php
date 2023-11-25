<?php

require_once 'Conectar.php';
require_once 'EstradaFicha.php';

class Bermas extends EstradaFicha {

    private $id_berma;
    private $larg;
    
    public function __construct($id_berma=0,$alt="",$reg="", $id_estrada="", $data="", $hora="", $pkinicio="", $altitd_pki="",$lat_ci="",$lat_ni="",$long_ci="",$long_ni="", $pkfim="",$altitd_pkf="",$lat_cf="",$lat_nf="",$long_cf="",$long_nf="", $larg="",$sentido="", $ass="",$data_arq="",$arq="") {
        $this->setId_berma($id_berma);
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
        $this->setLarg($larg);
        $this->setSentido($sentido);
        $this->setAss($ass);
        $this->setData_arq($data_arq);
        $this->setArq($arq);
    }
        
    public function getId_berma() {
        return $this->id_berma;
    }

    public function getLarg() {
        return $this->larg;
    }

    public function setId_berma($valor) {
        $this->id_berma = $valor;
    }

    public function setLarg($valor) {
        $this->larg = $valor;
    }
}
