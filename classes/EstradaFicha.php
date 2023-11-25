<?php

abstract class  EstradaFicha {

    private $alt;
    private $reg;
    private $id_estrada;
    private $codigo;
    private $nseq;
    private $estatuto;
    private $ilha;
    private $concelho;
    private $freguesia;
    private $tutela;
    private $classifica;
    private $classe;
    private $extensao;
    private $atribut;
    private $data;
    private $pontosext;
    private $toponimo;
    private $despacho;
    private $hora;
    private $pkinicio;
    private $pkfim;
    private $altitude;
    private $lat_c;
    private $lat_n;
    private $long_c;
    private $long_n;
    private $lat_ci;
    private $lat_ni;
    private $lat_cf;
    private $lat_nf;
    private $long_ci;
    private $long_ni;
    private $long_cf;
    private $long_nf;
    private $altitd_pki;
    private $altitd_pkf;
    private $sentido;
    private $orient;
    private $ass;
    private $arq;
    private $data_arq;
    public function getEstatuto() {
        return $this->estatuto;
    }

    public function setEstatuto($valor) {
        $this->estatuto = $valor;
    }

        public function getTutela() {
        return $this->tutela;
    }

    public function setTutela($valor) {
        $this->tutela = $valor;
    }

        public function getOrient() {
        return $this->orient;
    }

    public function setOrient($valor) {
        $this->orient = $valor;
    }

        public function getIlha() {
        return $this->ilha;
    }

    public function getConcelho() {
        return $this->concelho;
    }

    public function setIlha($valor) {
        $this->ilha = $valor;
    }

    public function setConcelho($valor) {
        $this->concelho = $valor;
    }
   
    public function getNseq() {
        return $this->nseq;
    }

    public function setNseq($valor) {
        $this->nseq = $valor;
    }

        public function getDespacho() {
        return $this->despacho;
    }

    public function setDespacho($valor) {
        $this->despacho = $valor;
    }

    
    public function getAtribut() {
        return $this->atribut;
    }

    public function setAtribut($valor) {
        $this->atribut = $valor;
    }
    public function getClassifica() {
        return $this->classifica;
    }

    public function getExtensao() {
        return $this->extensao;
    }

    public function getPontosext() {
        return $this->pontosext;
    }

    public function getToponimo() {
        return $this->toponimo;
    }

    public function setClassifica($valor) {
        $this->classifica = $valor;
    }

    public function setExtensao($valor) {
        $this->extensao = $valor;
    }

    public function setPontosext($valor) {
        $this->pontosext = $valor;
    }

    public function setToponimo($valor) {
        $this->toponimo = $valor;
    }

        public function getFreguesia() {
        return $this->freguesia;
    }

    public function setFreguesia($valor) {
        $this->freguesia = $valor;
    }
    
    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($valor) {
        $this->codigo = $valor;
    }

    public function getAlt() {
        return $this->alt;
    }
    public function getReg() {
        return $this->reg;
    }

    public function setReg($valor) {
        $this->reg = $valor;
    }

    function getId_estrada() {
        return $this->id_estrada;
    }

    function getData() {
        return $this->data;
    }

    function getHora() {
        return $this->hora;
    }

    function getPkinicio() {
        return $this->pkinicio;
    }

    function getPkfim() {
        return $this->pkfim;
    }

    function getAltitude() {
        return $this->altitude;
    }

    function getLat_c() {
        return $this->lat_c;
    }

    function getLat_n() {
        return $this->lat_n;
    }

    function getLong_c() {
        return $this->long_c;
    }

    function getLong_n() {
        return $this->long_n;
    }

    function getLat_ci() {
        return $this->lat_ci;
    }

    function getLat_ni() {
        return $this->lat_ni;
    }

    function getLat_cf() {
        return $this->lat_cf;
    }

    function getLat_nf() {
        return $this->lat_nf;
    }

    function getLong_ci() {
        return $this->long_ci;
    }

    function getLong_ni() {
        return $this->long_ni;
    }

    function getLong_cf() {
        return $this->long_cf;
    }

    function getLong_nf() {
        return $this->long_nf;
    }

    function getAltitd_pki() {
        return $this->altitd_pki;
    }

    function getAltitd_pkf() {
        return $this->altitd_pkf;
    }

    function getSentido() {
        return $this->sentido;
    }

    function getAss() {
        return $this->ass;
    }

    function setAlt($valor) {
        $this->alt = $valor;
    }

    function setId_estrada($valor) {
        $this->id_estrada = $valor;
    }

    function setData($valor) {
        $this->data = $valor;
    }

    function setHora($valor) {
        $this->hora = $valor;
    }

    function setPkinicio($valor) {
        $this->pkinicio = $valor;
    }

    function setPkfim($pkfim) {
        $this->pkfim = $pkfim;
    }

    function setAltitude($valor) {
        $this->altitude = $valor;
    }

    function setLat_c($valor) {
        $this->lat_c = $valor;
    }

    function setLat_n($valor) {
        $this->lat_n = $valor;
    }

    function setLong_c($valor) {
        $this->long_c = $valor;
    }

    function setLong_n($valor) {
        $this->long_n = $valor;
    }

    function setLat_ci($valor) {
        $this->lat_ci = $valor;
    }

    function setLat_ni($valor) {
        $this->lat_ni = $valor;
    }

    function setLat_cf($valor) {
        $this->lat_cf = $valor;
    }

    function setLat_nf($valor) {
        $this->lat_nf = $valor;
    }

    function setLong_ci($valor) {
        $this->long_ci = $valor;
    }

    function setLong_ni($valor) {
        $this->long_ni = $valor;
    }

    function setLong_cf($valor) {
        $this->long_cf = $valor;
    }

    function setLong_nf($valor) {
        $this->long_nf = $valor;
    }

    function setAltitd_pki($valor) {
        $this->altitd_pki = $valor;
    }

    function setAltitd_pkf($valor) {
        $this->altitd_pkf = $valor;
    }

    function setSentido($valor) {
        $this->sentido = $valor;
    }

    function setAss($valor) {
        $this->ass = $valor;
    }
    public function getArq() {
        return $this->arq;
    }

    public function getData_arq() {
        return $this->data_arq;
    }

    public function setArq($valor) {
        $this->arq = $valor;
    }

    public function setData_arq($valor) {
        $this->data_arq = $valor;
    }

     public function getClasse() {
        return $this->classe;
    }

    public function setClasse($valor) {
        $this->classe = $valor;
    }
}