<?php

require_once 'Conexao.php';
require_once 'EstradaFicha.php';

class Delineadores extends EstradaFicha {

    private $id_delind;
    private $delin;

    public function __construct($id_delind=0,$alt="", $reg="",$id_estrada="", $data="", $hora="", $pkinicio="", $altitd_pki="",$lat_ci="",$lat_ni="",$long_ci="",$long_ni="", $pkfim="",$altitd_pkf="",$lat_cf="",$lat_nf="",$long_cf="",$long_nf="", $delin="", $sentido="", $ass="",$data_arq="",$arq="") {
        $this->setId_delind($id_delind);
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
        $this->setDelin($delin);
        $this->setSentido($sentido);
        $this->setAss($ass);
        $this->setData_arq($data_arq);
        $this->setArq($arq);
    }
    public function getId_delind() {
        return $this->id_delind;
    }

    public function setId_delind($valor) {
        $this->id_delind = $valor;
    }

        public function getDelin() {
        return $this->delin;
    }

    public function setDelin($valor) {
        $this->delin = $valor;
    }

}
