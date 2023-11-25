<?php

require_once 'Conexao.php';
require_once 'Intervencao.php';

class DALIntervencao {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    function Inserir($interv) {
        $sql = "INSERT INTO tbl_intervencao (id_proposta, id_objconcurso, valor_global, trabalhos, cod, pkinicio, pkfim,sentido, und, quant, preco,ass) VALUES ('";
        $sql = $sql . $interv->getId_proposta() . "','";
        $sql = $sql . $interv->getId_objconcurso() . "','";      
        $sql = $sql . $interv->getValor_global() . "','";
        $sql = $sql . $interv->getTrabalhos() . "','";
        $sql = $sql . $interv->getCod() . "','";
        $sql = $sql . $interv->getPkinicio() . "','";
        $sql = $sql . $interv->getPkfim() . "','";
        $sql = $sql . $interv->getSentido() . "','";
        $sql = $sql . $interv->getUnd() . "','";
        $sql = $sql . $interv->getQuant() . "','";
        $sql = $sql . $interv->getPreco() . "','";
        $sql = $sql . $interv->getAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($interv) {
        $sql = "UPDATE tbl_intervencao SET id_proposta = '" . $interv->getId_proposta() .
                "',id_objconcurso = '" . $interv->getId_objconcurso() .
                "',valor_global = '" . $interv->getValor_global() .
                "',trabalhos = '" . $interv->getTrabalhos() .
                "',cod = '" . $interv->getCod() .
                "',pkinicio = '" . $interv->getPkinicio() .
                "',pkfim = '" . $interv->getPkfim() .
                "',sentido = '" . $interv->getSentido() .
                "',und = '" . $interv->getUnd() .
                "',quant = '" . $interv->getQuant() .
                "',preco = '" . $interv->getPreco() .
                "',ass = '" . $interv->getAss() . "'WHERE id_intervencao =" . $interv->getId_intervencao();
//echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($interv) {
        $sql = "DELETE FROM tbl_intervencao WHERE id_intervencao = $interv";
//echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Localizar() {
        $sql = "SELECT * FROM tbl_intervencao";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     public function CarregaIntervencao($cod) {
        $sql = "SELECT * FROM tbl_intervencao WHERE id_intervencao = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $int = new Intervencao($registo['id_intervencao'],$registo['id_proposta'],$registo['id_objeto'],$registo['valor_global'],$registo['trabalhos'],$registo['cod'],$registo['pkinicio'],$registo['pkfim'],$registo['sentido'],$registo['und'],$registo['quant'],$registo['preco'],$registo['ass']);                                              
        $this->conexao->desconectar();
        return $int;
    } 
    
     public function cmbProposta() {
        $sql="SELECT tbl_propostas.*
        FROM tbl_propostas";
    
//echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function cmbObjeto() {
       $sql="SELECT * FROM tbl_objconcurso ORDER BY id_concurso";
//echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function cmbTrabalhos() {
       $sql="SELECT * FROM tbl_Trabalhos";
//echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
      public function cmbItens() {
       $sql="SELECT * FROM tbl_orcamentoitens";
//echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function precoMedio($ilha) {
        $sql = "SELECT tbl_estrada.ilha, tbl_propostas.data, tbl_objconcurso.tipo_obra, tbl_intervencao.trabalhos, tbl_intervencao.cod, tbl_orcamentoitens.descr, tbl_intervencao.preco
        FROM tbl_propostas INNER JOIN (tbl_orcamentoitens INNER JOIN (tbl_intervencao INNER JOIN (tbl_objconcurso INNER JOIN tbl_estrada ON tbl_objconcurso.id_estrada = tbl_estrada.id_estrada) ON tbl_intervencao.id_objconcurso = tbl_objconcurso.id_objconcurso) ON tbl_orcamentoitens.cod = tbl_intervencao.cod) ON tbl_propostas.id_proposta = tbl_intervencao.id_proposta
        WHERE tbl_estrada.ilha = '$ilha'";
       //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    //------------ EXCEL PREÇOS ---------------------------------------------------------------
    public function ExportExcelPrecos() {
        $sql = "SELECT tbl_estrada.ilha, tbl_propostas.data, tbl_objconcurso.tipo_obra, tbl_intervencao.trabalhos, tbl_intervencao.cod, tbl_orcamentoitens.descr, tbl_intervencao.preco
        FROM tbl_propostas INNER JOIN (tbl_orcamentoitens INNER JOIN (tbl_intervencao INNER JOIN (tbl_objconcurso INNER JOIN tbl_estrada ON tbl_objconcurso.id_estrada = tbl_estrada.id_estrada) ON tbl_intervencao.id_objconcurso = tbl_objconcurso.id_objconcurso) ON tbl_orcamentoitens.cod = tbl_intervencao.cod) ON tbl_propostas.id_proposta = tbl_intervencao.id_proposta";        
       //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
   public function ExportExcelBVista() {
        $sql = "SELECT tbl_estrada.ilha, tbl_propostas.data, tbl_objconcurso.tipo_obra, tbl_intervencao.trabalhos, tbl_intervencao.cod, tbl_orcamentoitens.descr, tbl_intervencao.preco
        FROM tbl_propostas INNER JOIN (tbl_orcamentoitens INNER JOIN (tbl_intervencao INNER JOIN (tbl_objconcurso INNER JOIN tbl_estrada ON tbl_objconcurso.id_estrada = tbl_estrada.id_estrada) ON tbl_intervencao.id_objconcurso = tbl_objconcurso.id_objconcurso) ON tbl_orcamentoitens.cod = tbl_intervencao.cod) ON tbl_propostas.id_proposta = tbl_intervencao.id_proposta
        WHERE tbl_estrada.ilha = 'Boa Vista'";
       //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBrava() {
        $sql = "SELECT tbl_estrada.ilha, tbl_propostas.data, tbl_objconcurso.tipo_obra, tbl_intervencao.trabalhos, tbl_intervencao.cod, tbl_orcamentoitens.descr, tbl_intervencao.preco
        FROM tbl_propostas INNER JOIN (tbl_orcamentoitens INNER JOIN (tbl_intervencao INNER JOIN (tbl_objconcurso INNER JOIN tbl_estrada ON tbl_objconcurso.id_estrada = tbl_estrada.id_estrada) ON tbl_intervencao.id_objconcurso = tbl_objconcurso.id_objconcurso) ON tbl_orcamentoitens.cod = tbl_intervencao.cod) ON tbl_propostas.id_proposta = tbl_intervencao.id_proposta
        WHERE tbl_estrada.ilha = 'Brava'";
       //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelFogo() {
        $sql = "SELECT tbl_estrada.ilha, tbl_propostas.data, tbl_objconcurso.tipo_obra, tbl_intervencao.trabalhos, tbl_intervencao.cod, tbl_orcamentoitens.descr, tbl_intervencao.preco
        FROM tbl_propostas INNER JOIN (tbl_orcamentoitens INNER JOIN (tbl_intervencao INNER JOIN (tbl_objconcurso INNER JOIN tbl_estrada ON tbl_objconcurso.id_estrada = tbl_estrada.id_estrada) ON tbl_intervencao.id_objconcurso = tbl_objconcurso.id_objconcurso) ON tbl_orcamentoitens.cod = tbl_intervencao.cod) ON tbl_propostas.id_proposta = tbl_intervencao.id_proposta
        WHERE tbl_estrada.ilha = 'Fogo'";
       //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelMaio() {
        $sql = "SELECT tbl_estrada.ilha, tbl_propostas.data, tbl_objconcurso.tipo_obra, tbl_intervencao.trabalhos, tbl_intervencao.cod, tbl_orcamentoitens.descr, tbl_intervencao.preco
        FROM tbl_propostas INNER JOIN (tbl_orcamentoitens INNER JOIN (tbl_intervencao INNER JOIN (tbl_objconcurso INNER JOIN tbl_estrada ON tbl_objconcurso.id_estrada = tbl_estrada.id_estrada) ON tbl_intervencao.id_objconcurso = tbl_objconcurso.id_objconcurso) ON tbl_orcamentoitens.cod = tbl_intervencao.cod) ON tbl_propostas.id_proposta = tbl_intervencao.id_proposta
        WHERE tbl_estrada.ilha = 'Maio'";
       //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSAntao() {
        $sql = "SELECT tbl_estrada.ilha, tbl_propostas.data, tbl_objconcurso.tipo_obra, tbl_intervencao.trabalhos, tbl_intervencao.cod, tbl_orcamentoitens.descr, tbl_intervencao.preco
        FROM tbl_propostas INNER JOIN (tbl_orcamentoitens INNER JOIN (tbl_intervencao INNER JOIN (tbl_objconcurso INNER JOIN tbl_estrada ON tbl_objconcurso.id_estrada = tbl_estrada.id_estrada) ON tbl_intervencao.id_objconcurso = tbl_objconcurso.id_objconcurso) ON tbl_orcamentoitens.cod = tbl_intervencao.cod) ON tbl_propostas.id_proposta = tbl_intervencao.id_proposta
        WHERE tbl_estrada.ilha = 'Santo Antão'";
       //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSNicolau() {
        $sql = "SELECT tbl_estrada.ilha, tbl_propostas.data, tbl_objconcurso.tipo_obra, tbl_intervencao.trabalhos, tbl_intervencao.cod, tbl_orcamentoitens.descr, tbl_intervencao.preco
        FROM tbl_propostas INNER JOIN (tbl_orcamentoitens INNER JOIN (tbl_intervencao INNER JOIN (tbl_objconcurso INNER JOIN tbl_estrada ON tbl_objconcurso.id_estrada = tbl_estrada.id_estrada) ON tbl_intervencao.id_objconcurso = tbl_objconcurso.id_objconcurso) ON tbl_orcamentoitens.cod = tbl_intervencao.cod) ON tbl_propostas.id_proposta = tbl_intervencao.id_proposta
        WHERE tbl_estrada.ilha = 'São Nicolau'";
       //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSVicente() {
        $sql = "SELECT tbl_estrada.ilha, tbl_propostas.data, tbl_objconcurso.tipo_obra, tbl_intervencao.trabalhos, tbl_intervencao.cod, tbl_orcamentoitens.descr, tbl_intervencao.preco
        FROM tbl_propostas INNER JOIN (tbl_orcamentoitens INNER JOIN (tbl_intervencao INNER JOIN (tbl_objconcurso INNER JOIN tbl_estrada ON tbl_objconcurso.id_estrada = tbl_estrada.id_estrada) ON tbl_intervencao.id_objconcurso = tbl_objconcurso.id_objconcurso) ON tbl_orcamentoitens.cod = tbl_intervencao.cod) ON tbl_propostas.id_proposta = tbl_intervencao.id_proposta
        WHERE tbl_estrada.ilha = 'São Vicente'";
       //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSal() {
        $sql = "SELECT tbl_estrada.ilha, tbl_propostas.data, tbl_objconcurso.tipo_obra, tbl_intervencao.trabalhos, tbl_intervencao.cod, tbl_orcamentoitens.descr, tbl_intervencao.preco
        FROM tbl_propostas INNER JOIN (tbl_orcamentoitens INNER JOIN (tbl_intervencao INNER JOIN (tbl_objconcurso INNER JOIN tbl_estrada ON tbl_objconcurso.id_estrada = tbl_estrada.id_estrada) ON tbl_intervencao.id_objconcurso = tbl_objconcurso.id_objconcurso) ON tbl_orcamentoitens.cod = tbl_intervencao.cod) ON tbl_propostas.id_proposta = tbl_intervencao.id_proposta
        WHERE tbl_estrada.ilha = 'Sal'";
       //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSantiago() {
        $sql = "SELECT tbl_estrada.ilha, tbl_propostas.data, tbl_objconcurso.tipo_obra, tbl_intervencao.trabalhos, tbl_intervencao.cod, tbl_orcamentoitens.descr, tbl_intervencao.preco
        FROM tbl_propostas INNER JOIN (tbl_orcamentoitens INNER JOIN (tbl_intervencao INNER JOIN (tbl_objconcurso INNER JOIN tbl_estrada ON tbl_objconcurso.id_estrada = tbl_estrada.id_estrada) ON tbl_intervencao.id_objconcurso = tbl_objconcurso.id_objconcurso) ON tbl_orcamentoitens.cod = tbl_intervencao.cod) ON tbl_propostas.id_proposta = tbl_intervencao.id_proposta
        WHERE tbl_estrada.ilha = 'Santiago'";
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
