<?php
require_once 'EstradaFicha.php';

class Ocorrencias extends EstradaFicha {
   
    private $id_ocor;
    private $ocor;
    private $foto1;
    private $foto2;
    
    public function __construct($id_ocor=0,$alt="",$reg="",$data="",$hora="",$id_estrada="",$pkinicio="",$altitd_pki="",$lat_ci="",$lat_ni="",$long_ci="",$long_ni="",$pkfim="",$altitd_pkf="",$lat_cf="",$lat_nf="",$long_cf="",$long_nf="",$sentido="",$ocor="", $foto1="", $foto2="",$ass="") {
        $this->setId_ocor($id_ocor);
        $this->setAlt($alt);
        $this->setReg($reg);
        $this->setData($data);
        $this->setHora($hora);
        $this->setId_estrada($id_estrada);
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
        $this->setSentido($sentido);
        $this->setOcor($ocor);
        $this->setFoto1($foto1);
        $this->setFoto2($foto2);
        $this->setAss($ass);
    }

    public function getId_ocor() {
        return $this->id_ocor;
    }
    
    public function getOcor() {
        return $this->ocor;
    }
    public function getFoto1() {
        return $this->foto1;
    }

    public function getFoto2() {
        return $this->foto2;
    }
     public function setId_ocor($id_ocor) {
        $this->id_ocor = $id_ocor;
    }

    public function setOcor($ocor) {
        $this->ocor = $ocor;
    }

    public function setFoto1($foto1) {
        $this->foto1 = $foto1;
    }

    public function setFoto2($foto2) {
        $this->foto2 = $foto2;
    }

}
