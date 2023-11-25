<?php

require_once 'Conexao.php';
require_once 'EstradaFicha.php';

class Trecho extends EstradaFicha {
    private $id_trecho;
    private $sitioi;
    private $sitiof;

    public function __construct($id_trecho=0,$alt="",$reg="", $id_estrada="", $data="", $hora="",$pkinicio="", $altitd_pki="", $sitioi="", $lat_ci="", $lat_ni="", $long_ci="", $long_ni="", $pkfim="", $altitd_pkf="",$sitiof="", $lat_cf="", $lat_nf="", $long_cf="", $long_nf="", $ass="",$arq="",$data_arq="") {
        $this->setId_trecho($id_trecho);
        $this->setAlt($alt);
        $this->setReg($reg);
        $this->setId_estrada($id_estrada);
        $this->setData($data);
        $this->setHora($hora);
        $this->setPkinicio($pkinicio);
        $this->setAltitd_pki($altitd_pki);   
        $this->setSitioi($sitioi);
        $this->setLat_ci($lat_ci);
        $this->setLat_ni($lat_ni);
        $this->setLong_ci($long_ci);
        $this->setLong_ni($long_ni);
        $this->setPkfim($pkfim);
        $this->setAltitd_pkf($altitd_pkf);    
        $this->setSitiof($sitiof);
        $this->setLat_cf($lat_cf);
        $this->setLat_nf($lat_nf);
        $this->setLong_cf($long_cf);
        $this->setLong_nf($long_nf);
        $this->setAss($ass);
        $this->setArq($arq);
        $this->setData_arq($data_arq);
    }
     public function getId_trecho() {
        return $this->id_trecho;
    }
    public function getSitioi() {
        return $this->sitioi;
    }

    public function getSitiof() {
        return $this->sitiof;
    }
     public function setId_trecho($id_trecho) {
        $this->id_trecho = $id_trecho;
    }
    public function setSitioi($sitioi) {
        $this->sitioi = $sitioi;
    }

    public function setSitiof($sitiof) {
        $this->sitiof = $sitiof;
    }

}
