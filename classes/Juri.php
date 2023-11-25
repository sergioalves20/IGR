<?php

require_once 'Conexao.php';

class Juri {

    private $id_juri;
    private $data;
    private $id_concurso;
    private $nome;
    private $instituicao;
    private $ass;

    public function __construct($id_juri=0,$data="", $id_concurso="",  $nome="", $instituicao="", $ass="") {
        $this->setId_juri($id_juri);
        $this->setData($data);
        $this->setId_concurso($id_concurso);      
        $this->setNome($nome);
        $this->setInstituicao($instituicao);
        $this->setAss($ass);
    }
    public function getAss() {
        return $this->ass;
    }

    public function setAss($ass) {
        $this->ass = $ass;
    }

        public function getId_juri() {
        return $this->id_juri;
    }

    public function getId_concurso() {
        return $this->id_concurso;
    }

    public function getData() {
        return $this->data;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getInstituicao() {
        return $this->instituicao;
    }

    public function setId_juri($id_juri) {
        $this->id_juri = $id_juri;
    }

    public function setId_concurso($id_concurso) {
        $this->id_concurso = $id_concurso;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setInstituicao($instituicao) {
        $this->instituicao = $instituicao;
    }

}
