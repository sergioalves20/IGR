<?php
require_once 'Conexao.php';
require_once 'EstradaFicha.php';

class SobraTipo extends EstradaFicha {
    private $id_sobratipo; 
    private $id_sobra;
    private $terrabat;
    private $pedra;
    private $revsuperf;
    private $bb;
    private $bclas;
    public function __construct($id_sobratipo=0,$alt="",$reg="", $id_sobra="", $id_estrada="", $data="", $hora="", $pkinicio="",$altitd_pki="",$lat_ci="",$lat_ni="",$long_ci="",$long_ni="", $pkfim="",$altitd_pkf="",$lat_cf="",$lat_nf="",$long_cf="",$long_nf="", $terrabat="", $pedra="", $revsuperf="", $bb="", $bclas="", $sentido="", $ass="",$data_arq="",$arq="") {
       
        $this->setId_sobratipo($id_sobratipo);
        $this->setAlt($alt);
        $this->setReg($reg);
        $this->setId_sobra($id_sobra);
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
        $this->setTerrabat($terrabat);
        $this->setPedra($pedra);
        $this->setRevsuperf($revsuperf);
        $this->setBb($bb);
        $this->setBclas($bclas);
        $this->setSentido($sentido);
        $this->setAss($ass);
        $this->setData_arq($data_arq);
        $this->setArq($arq);
    }
    public function getId_sobratipo() {
        return $this->id_sobratipo;
    }

    public function setId_sobratipo($valor) {
        $this->id_sobratipo = $valor;
    }

        public function getId_sobra() {
        return $this->id_sobra;
    }

    public function getTerrabat() {
        return $this->terrabat;
    }

    public function getPedra() {
        return $this->pedra;
    }

    public function getRevsuperf() {
        return $this->revsuperf;
    }

    public function getBb() {
        return $this->bb;
    }

    public function getBclas() {
        return $this->bclas;
    }
    public function setId_sobra($valor) {
        $this->id_sobra = $valor;
    }

    public function setTerrabat($valor) {
        $this->terrabat = $valor;
    }

    public function setPedra($valor) {
        $this->pedra = $valor;
    }

    public function setRevsuperf($valor) {
        $this->revsuperf = $valor;
    }

    public function setBb($valor) {
        $this->bb = $valor;
    }

    public function setBclas($valor) {
        $this->bclas = $valor;
    }

}
