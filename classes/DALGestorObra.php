<?php

require_once 'Conexao.php';
require_once 'GestorObra.php';

class DALGestorObra {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function Inserir($gestobra) {

        $sql = "INSERT INTO tbl_gestorobra (id_gestor,data,id_objconcurso,nomeado,substituto,interino,datai,dataf,just,ass,ativo)VALUES('";
        $sql = $sql . $gestobra->getId_gestor() . "','";
        $sql = $sql . $gestobra->getData() . "','";
        $sql = $sql . $gestobra->getId_objconcurso() . "','";
        $sql = $sql . $gestobra->getNomeado() . "','";
        $sql = $sql . $gestobra->getSubstituto() . "','";
        $sql = $sql . $gestobra->getInterino() . "','";
        $sql = $sql . $gestobra->getDatai() . "','";
        $sql = $sql . $gestobra->getDataf() . "','";
        $sql = $sql . $gestobra->getJust() . "','";
        $sql = $sql . $gestobra->getAss() . "','";
        $sql = $sql . $gestobra->getAtivo() . "')";       
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar ($gestobra) {

        $sql = "UPDATE tbl_gestorobra SET id_gestor = '" . $gestobra->getId_gestor() .
                "',data = '" . $gestobra->getData() .
                "',id_objconcurso = '" . $gestobra->getId_objconcurso() .
                "',nomeado = '" . $gestobra->getNomeado() .
                "',substituto = '" . $gestobra->getSubstituto() .
                "',interino = '" . $gestobra->getInterino() .
                "',datai = '" . $gestobra->getDatai() .
                "',dataf = '" . $gestobra->getDataf() .
                "',just = '" . $gestobra->getJust() .
                "',ass = '" . $gestobra->getAss() .
                "',ativo = '" . $gestobra->getAtivo() . "'WHERE id_gestorobra =" . $gestobra->getId_gestorobra();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($gestorobra) {
        $sql = "DELETE FROM tbl_gestorobra WHERE id_gestorobra = $gestorobra";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar() {
        $sql = "SELECT * FROM tbl_gestorobra WHERE data = CURDATE()";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function CarregaGestorObra($cod) {
        $sql = "SELECT * FROM tbl_gestorobra WHERE id_gestorobra = $cod";
        //echo $sql;
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $gestor = new GestorObra($registo['id_gestorobra'], $registo['id_gestor'], $registo['data'], $registo['id_objconcurso'], $registo['nomeado'], $registo['substituto'], $registo['interino'], $registo['datai'], $registo['dataf'], $registo['just'], $registo['ass'], $registo['ativo']);
        $this->conexao->desconectar();
        return $gestor;
    }
     public function cmbObjconcurso() {
        $sql = "SELECT * FROM tbl_objconcurso";               
       //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function cmbGestor() {
        $sql = "SELECT * FROM tbl_gestor";
       //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function tabGestorObra($ilha) {
        $sql = "SELECT tbl_gestorobra.*, tbl_gestor.nome_gestor, tbl_objconcurso.id_concurso, tbl_objconcurso.id_estrada, tbl_estrada.codigo, tbl_estrada.ilha, tbl_objconcurso.tipo_obra, tbl_objconcurso.pkinicio, tbl_objconcurso.pkfiM
        FROM ((tbl_gestorobra INNER JOIN tbl_objconcurso ON tbl_gestorobra.id_objconcurso = tbl_objconcurso.id_objconcurso) INNER JOIN tbl_estrada ON tbl_objconcurso.id_estrada = tbl_estrada.id_estrada) INNER JOIN tbl_gestor ON tbl_gestorobra.id_gestor = tbl_gestor.id_gestor
        WHERE tbl_estrada.ilha = '$ilha' AND tbl_gestorobra.ativo = 1";
       
    //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function getConexao() {
        return $this->conexao;
    }

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }

}
