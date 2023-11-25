<?php

require_once 'Conexao.php';

class Empreitada {

    private $id_empreitada;
    private $data;
    private $nome;
    private $tipos_proced;
    private $concurso;
    private $ass;
    
    public function __construct($id_empreitada=0, $data="", $nome="", $tipos_proced="", $concurso="",$ass="") {
        $this->setId_empreitada($id_empreitada);
        $this->setData($data);
        $this->setNome($nome);
        $this->setTipos_proced($tipos_proced);
        $this->setConcurso($concurso);
        $this->setAss($ass);
        
    }
    public function getAss() {
        return $this->ass;
    }

    public function setAss($ass) {
        $this->ass = $ass;
    }

        public function getId_empreitada() {
        return $this->id_empreitada;
    }

    public function getData() {
        return $this->data;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getTipos_proced() {
        return $this->tipos_proced;
    }

    public function getConcurso() {
        return $this->concurso;
    }

    public function setId_empreitada($id_empreitada) {
        $this->id_empreitada = $id_empreitada;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setTipos_proced($tipos_proced) {
        $this->tipos_proced = $tipos_proced;
    }

    public function setConcurso($concurso) {
        $this->concurso = $concurso;
    }

}