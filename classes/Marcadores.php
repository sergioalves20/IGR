<?php

require_once 'Conexao.php';
require_once 'EstradaFicha.php';

class Marcadores extends EstradaFicha {
    private $id_marc;
    private $marc;

    public function __construct($id_marc=0,$alt="", $reg="", $id_estrada="", $data="", $hora="", $pkinicio="", $altitd_pki="",$lat_ci="",$lat_ni="",$long_ci="",$long_ni="", $pkfim="",$altitd_pkf="",$lat_cf="",$lat_nf="",$long_cf="",$long_nf="", $marc="", $sentido="", $ass="",$data_arq="",$arq="") {
        $this->setId_marc($id_marc);
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
        $this->setMarc($marc);
        $this->setSentido($sentido);
        $this->setAss($ass);
        $this->setData_arq($data_arq);
        $this->setArq($arq);
    }
    public function getId_marc() {
        return $this->id_marc;
    }

    public function setId_marc($valor) {
        $this->id_marc = $valor;
    }
  
    public function getMarc() {
        return $this->marc;
    }

    public function setMarc($valor) {
        $this->marc = $valor;
    }

}
