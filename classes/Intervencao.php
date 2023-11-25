<?php

require_once 'Conexao.php';
require_once 'EstradaFicha.php';

class Intervencao extends EstradaFicha {

    private $id_intervencao;
    private $id_proposta;
    private $id_objconcurso;
    private $valor_global;
    private $trabalhos;
    private $cod;
    private $pkinicio;
    private $pkfim;
    private $sentido;
    private $und;
    private $quant;
    private $preco;
    private $ass;
    public function __construct($id_intervencao=0,$id_proposta="", $id_objconcurso="", $valor_global="", $trabalhos="", $cod="", $pkinicio="", $pkfim="",$sentido="", $und="", $quant="", $preco="",$ass="") {
        $this->setId_intervencao($id_intervencao);
        $this->setId_proposta($id_proposta);
        $this->setId_objconcurso($id_objconcurso);       
        $this->setValor_global($valor_global);
        $this->setTrabalhos($trabalhos);
        $this->setCod($cod);
        $this->setPkinicio($pkinicio);
        $this->setPkfim($pkfim);
        $this->setSentido($sentido);
        $this->setUnd($und);
        $this->setQuant($quant);
        $this->setPreco($preco);
        $this->setAss($ass);
    }
    public function getId_intervencao() {
        return $this->id_intervencao;
    }

    public function getId_proposta() {
        return $this->id_proposta;
    }

    public function getId_objconcurso() {
        return $this->id_objconcurso;
    }

    public function getValor_global() {
        return $this->valor_global;
    }

    public function getTrabalhos() {
        return $this->trabalhos;
    }

    public function getCod() {
        return $this->cod;
    }

    public function getUnd() {
        return $this->und;
    }

    public function getQuant() {
        return $this->quant;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function setId_intervencao($id_intervencao) {
        $this->id_intervencao = $id_intervencao;
    }

    public function setId_proposta($id_proposta) {
        $this->id_proposta = $id_proposta;
    }

    public function setId_objconcurso($id_objconcurso) {
        $this->id_objconcurso = $id_objconcurso;
    }

    public function setValor_global($valor_global) {
        $this->valor_global = $valor_global;
    }

    public function setTrabalhos($trabalhos) {
        $this->trabalhos = $trabalhos;
    }

    public function setCod($cod) {
        $this->cod = $cod;
    }

    public function setUnd($und) {
        $this->und = $und;
    }

    public function setQuant($quant) {
        $this->quant = $quant;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function setAss($ass) {
        $this->ass = $ass;
    }

}
