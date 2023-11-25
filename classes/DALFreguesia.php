<?php

require_once 'Conexao.php';
require_once 'Freguesia.php';
require_once 'DALEstrada.php';
require_once 'Estrada.php';
class DALFreguesia {

    private $conexao;

    public function Localizar($freguesia) {
        $sql = "SELECT * FROM tbl_freguesia WHERE freguesia like '%" . $freguesia . "%'";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
       public function cmbFreguesia($freguesia) {
        $sql = "SELECT * FROM tbl_freguesia WHERE freguesia like '%" . $freguesia . "%'";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
   /* public function CarregaEstrada($cod) {
        $sql = "SELECT * FROM tbl_estrada WHERE freguesia = '$cod'" ;
        echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();
        $estrada = new Estrada($registo['id_estrada'],$registo['codigo'],$registo['freguesia'],$registo['classifica'],$registo['classe'],$registo['extensao'],$registo['atribut'],$registo['data']
                ,$registo['toponimo'],$registo['pontosext'],$registo['altitd_pki']
                ,$registo['lat_ci'],$registo['lat_ni'],$registo['long_ci'],$registo['long_ni'],$registo['altitd_pkf']
                ,$registo['lat_cf'],$registo['lat_nf'],$registo['long_cf'],$registo['long_nf']);
        $this->conexao->desconectar();
        return $estrada;
     }*/
      public function TabEstrada($estrada){
         $sql = "SELECT * FROM tbl_estrada WHERE freguesia = '$estrada' AND arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function getConexao() {
        return $this->conexao;
    }

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }

}
