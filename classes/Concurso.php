<?php

require_once 'Conexao.php';

class Concurso {

private $id_concurso;
private $id_empreitada;
private $data_publicacao;
private $data_entra_prop;
private $data_relat_prop;
private $data_homolog;
private $data_consignacao;
private $data_ordem_inicio;
private $anulado;
private $data_anulacao;
private $id_motivo;
private $ass;

    public function __construct($id_concurso=0,$id_empreitada="",$data_publicacao="",$data_entra_prop="",$data_relat_prop="",$data_homolog="",$data_consignacao="",$data_ordem_inicio="",$anulado="",$data_anulacao="",$id_motivo="",$ass="") {
        $this->setId_concurso($id_concurso);
        $this->setId_empreitada($id_empreitada);
        $this->setData_publicacao($data_publicacao);
        $this->setData_entra_prop($data_entra_prop);
        $this->setData_relat_prop($data_relat_prop);
        $this->setData_homolog($data_homolog);
        $this->setData_consignacao($data_consignacao);
        $this->setData_ordem_inicio($data_ordem_inicio);
        $this->setAnulado($anulado);
        $this->setData_anulacao($data_anulacao);
        $this->setId_motivo($id_motivo);
        $this->setAss($ass);
              
    }

    public function getId_concurso() {
        return $this->id_concurso;
    }

    public function getId_empreitada() {
        return $this->id_empreitada;
    }

    public function getData_publicacao() {
        return $this->data_publicacao;
    }

    public function getData_entra_prop() {
        return $this->data_entra_prop;
    }

    public function getData_relat_prop() {
        return $this->data_relat_prop;
    }

    public function getData_homolog() {
        return $this->data_homolog;
    }

    public function getData_consignacao() {
        return $this->data_consignacao;
    }

    public function getData_ordem_inicio() {
        return $this->data_ordem_inicio;
    }

    public function getAnulado() {
        return $this->anulado;
    }

    public function getData_anulacao() {
        return $this->data_anulacao;
    }

    public function getId_motivo() {
        return $this->id_motivo;
    }

    public function setId_concurso($id_concurso) {
        $this->id_concurso = $id_concurso;
    }

    public function setId_empreitada($id_empreitada) {
        $this->id_empreitada = $id_empreitada;
    }

    public function setData_publicacao($data_publicacao) {
        $this->data_publicacao = $data_publicacao;
    }

    public function setData_entra_prop($data_entra_prop) {
        $this->data_entra_prop = $data_entra_prop;
    }

    public function setData_relat_prop($data_relat_prop) {
        $this->data_relat_prop = $data_relat_prop;
    }

    public function setData_homolog($data_homolog) {
        $this->data_homolog = $data_homolog;
    }

    public function setData_consignacao($data_consignacao) {
        $this->data_consignacao = $data_consignacao;
    }

    public function setData_ordem_inicio($data_ordem_inicio) {
        $this->data_ordem_inicio = $data_ordem_inicio;
    }

    public function setAnulado($anulado) {
        $this->anulado = $anulado;
    }

    public function setData_anulacao($data_anulacao) {
        $this->data_anulacao = $data_anulacao;
    }

    public function setId_motivo($id_motivo) {
        $this->id_motivo = $id_motivo;
    }
    public function getAss() {
        return $this->ass;
    }

    public function setAss($ass) {
        $this->ass = $ass;
    }
}