<?php

require_once 'Conexao.php';
require_once 'EstradaFicha.php';

class Patologia extends EstradaFicha {
    private $id_patolog;
    private $id_item;
    private $grupo;
    private $id_talude;
    private $banq;
    private $via;
    private $brm;
    private $sobra;
    private $pass;
    private $foto1;
    private $foto2;
    
    

        
            public function __construct($id_patolog=0,$alt="",$reg="", $id_estrada="", $data="", $hora="", $pkinicio="", $altitd_pki="",$lat_ci="",$lat_ni="",$long_ci="",$long_ni="", $pkfim="",$altitd_pkf="",$lat_cf="",$lat_nf="",$long_cf="",$long_nf="",$grupo="",$id_talude="",$banq="", $via="", $brm="", $sobra="",$pass="",$sentido="", $id_item="",$foto1="",$foto2="", $ass="",$data_arq="",$arq="") {
        $this->setId_patolog($id_patolog);
        $this->setReg($reg);
        $this->setAlt($alt);
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
        $this->setGrupo($grupo);
        $this->setId_talude($id_talude);
        $this->setBanq($banq);
        $this->setVia($via);
        $this->setBrm($brm);
        $this->setSobra($sobra);
        $this->setPass($pass);
        $this->setSentido($sentido);
        $this->setId_item($id_item);
        $this->setFoto1($foto1);
        $this->setFoto2($foto2);
        $this->setAss($ass);
        $this->setData_arq($data_arq);
        $this->setArq($arq);
    }

    public function getId_patolog() {
        return $this->id_patolog;
    }

    public function setId_patolog($valor) {
        $this->id_patolog = $valor;
    }

        public function getId_item() {
        return $this->id_item;
    }
   public function getGrupo() {
        return $this->grupo;
    }
    public function getId_talude() {
        return $this->id_talude;
    }

    public function getBanq() {
        return $this->banq;
    }

    public function getSobra() {
        return $this->sobra;
    }

    public function getPass() {
        return $this->pass;
    }
    public function getVia() {
        return $this->via;
    }

    public function getBrm() {
        return $this->brm;
    }

    public function setId_item($valor) {
        $this->id_item = $valor;
    }
    public function getFoto1() {
        return $this->foto1;
    }
    public function getFoto2() {
        return $this->foto2;
    }
    public function setGrupo($valor) {
        $this->grupo = $valor;
    }
    
    public function setId_talude($valor) {
        $this->id_talude = $valor;
    }

    public function setBanq($valor) {
        $this->banq = $valor;
    }
    public function setSobra($valor) {
        $this->sobra = $valor;
    }

    public function setPass($valor) {
        $this->pass = $valor;
    }
    public function setVia($valor) {
        $this->via = $valor;
    }

    public function setBrm($valor) {
        $this->brm = $valor;
    }
  
    public function setFoto1($valor) {
        $this->foto1 = $valor;
    }

    public function setFoto2($valor) {
        $this->foto2 = $valor;
    }
}
    