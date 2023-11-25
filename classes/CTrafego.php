<?php

require_once 'Conexao.php';
require_once 'EstradaFicha.php';

class CTrafego extends EstradaFicha {

    private $id_ctrafego;
    private $id_trecho;
    private $maquina;
    private $id_posto;
    private $altsolo;
    private $disteixo;
    private $horai;
    private $horaf;
    private $datai;
    private $dataf;
    private $ndias;
    private $vmedia;
    private $lig;
    private $pes;
    private $tmda;

    public function __construct($id_ctrafego=0,$alt="",$reg="", $id_estrada="", $id_trecho="", $data="", $hora="", $maquina="", $id_posto="", $altsolo="", $disteixo="", $sentido="", $horai="", $horaf="", $datai="", $dataf="", $ndias="", $vmedia="", $lig="", $pes="", $tmda="", $ass="",$arq="",$data_arq="") {
        $this->setId_ctrafego($id_ctrafego);
        $this->setAlt($alt);
        $this->setReg($reg);
        $this->setId_estrada($id_estrada);
        $this->setId_trecho($id_trecho);
        $this->setData($data);
        $this->setHora($hora);
        $this->setMaquina($maquina);
        $this->setId_posto($id_posto);
        $this->setAltsolo($altsolo);
        $this->setDisteixo($disteixo);
        $this->setSentido($sentido);
        $this->setHorai($horai);
        $this->setHoraf($horaf);
        $this->setDatai($datai);
        $this->setDataf($dataf);
        $this->setNdias($ndias);
        $this->setVmedia($vmedia);
        $this->setLig($lig);
        $this->setPes($pes);
        $this->setTmda($tmda);
        $this->setAss($ass);
        $this->setArq($arq);
        $this->setData_arq($data_arq);
    }

    public function getId_ctrafego() {
        return $this->id_ctrafego;
    }

    public function getId_trecho() {
        return $this->id_trecho;
    }

    public function getMaquina() {
        return $this->maquina;
    }

    public function getId_posto() {
        return $this->id_posto;
    }

    public function getAltsolo() {
        return $this->altsolo;
    }

    public function getDisteixo() {
        return $this->disteixo;
    }

    public function getHorai() {
        return $this->horai;
    }

    public function getHoraf() {
        return $this->horaf;
    }

    public function getDatai() {
        return $this->datai;
    }

    public function getDataf() {
        return $this->dataf;
    }

    public function getNdias() {
        return $this->ndias;
    }

    public function getVmedia() {
        return $this->vmedia;
    }

    public function getLig() {
        return $this->lig;
    }

    public function getPes() {
        return $this->pes;
    }

    public function getTmda() {
        return $this->tmda;
    }

    public function setId_ctrafego($id_ctrafego) {
        $this->id_ctrafego = $id_ctrafego;
    }

    public function setId_trecho($id_trecho) {
        $this->id_trecho = $id_trecho;
    }

    public function setMaquina($maquina) {
        $this->maquina = $maquina;
    }

    public function setId_posto($id_posto) {
        $this->id_posto = $id_posto;
    }

    public function setAltsolo($altsolo) {
        $this->altsolo = $altsolo;
    }

    public function setDisteixo($disteixo) {
        $this->disteixo = $disteixo;
    }

    public function setHorai($horai) {
        $this->horai = $horai;
    }

    public function setHoraf($horaf) {
        $this->horaf = $horaf;
    }

    public function setDatai($datai) {
        $this->datai = $datai;
    }

    public function setDataf($dataf) {
        $this->dataf = $dataf;
    }

    public function setNdias($ndias) {
        $this->ndias = $ndias;
    }

    public function setVmedia($vmedia) {
        $this->vmedia = $vmedia;
    }

    public function setLig($lig) {
        $this->lig = $lig;
    }

    public function setPes($pes) {
        $this->pes = $pes;
    }

    public function setTmda($tmda) {
        $this->tmda = $tmda;
    }

}
