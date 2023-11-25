<?php

require_once 'Conexao.php';
require_once 'Phidraulica.php';

class DALPhidraulica {

    private $conexao;
    public function __construct($conexao) {
        $this->setConexao($conexao);
    }

    public function Inserir($ph) {
        $sql = "INSERT INTO tbl_phidraulica (alt, reg, id_estrada, data, hora, pkinicio, pkfim, lat_c, lat_n, long_c, long_n, altitude, material, forma, largura_ph, altura_ph, diametro, septos, altura_sp, largura_sp, ass)VALUES('";
        $sql = $sql . $ph->GetAlt() . "','";
        $sql = $sql . $ph->GetReg() . "','";
        $sql = $sql . $ph->GetId_estrada() . "','";
        $sql = $sql . $ph->GetData() . "','";
        $sql = $sql . $ph->GetHora() . "','";
        $sql = $sql . $ph->GetPkinicio() . "','";
        $sql = $sql . $ph->GetPkfim() . "','";
        $sql = $sql . $ph->GetLat_c() . "','";
        $sql = $sql . $ph->GetLat_n() . "','";
        $sql = $sql . $ph->GetLong_c() . "','";
        $sql = $sql . $ph->GetLong_n() . "','";
        $sql = $sql . $ph->GetAltitude() . "','";
        $sql = $sql . $ph->getMaterial() . "','";
        $sql = $sql . $ph->getForma() . "','";
        $sql = $sql . $ph->getLargura_ph() . "','";
        $sql = $sql . $ph->getAltura_ph() . "','";
        $sql = $sql . $ph->getDiametro() . "','";
        $sql = $sql . $ph->getSeptos() . "','";
        $sql = $sql . $ph->getAltura_sp() . "','";
        $sql = $sql . $ph->getLargura_sp() . "','";
        $sql = $sql . $ph->GetAss() . "')";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Alterar($ph) {       
        $sql = "UPDATE tbl_phidraulica SET alt = '" . $ph->getAlt() .
                "',reg = '" . $ph->getReg() .
                "',id_estrada = '" . $ph->getId_estrada() .
                "',data = '" . $ph->getData() .
                "',hora = '" . $ph->getHora() .
                "',pkinicio = '" . $ph->getPkinicio() .
                "',pkfim = '" . $ph->getPkfim() .
                "',lat_c = '" . $ph->getLat_c() .
                "',lat_n = '" . $ph->getLat_n() .
                "',long_c = '" . $ph->getLong_c() .
                "',long_n = '" . $ph->getLong_n() .
                "',altitude = '" . $ph->getAltitude() .
                "',material = '" . $ph->getMaterial() .
                "',forma = '" . $ph->getForma() .
                "',largura_ph = '" . $ph->getLargura_ph() .
                "',altura_ph = '" . $ph->getAltura_ph() .
                "',diametro = '" . $ph->getDiametro() .
                "',septos = '" . $ph->getSeptos() .
                "',altura_sp = '" . $ph->getAltura_sp() .
                "',largura_sp = '" . $ph->getLargura_sp() .
                "',ass = '" . $ph->GetAss() . "'WHERE id_ph =" . $ph->getId_ph();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }

    public function Excluir($ph) {
        $sql = "DELETE FROM tbl_phidraulica WHERE id_ph= $ph";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
    public function Localizar($ph) {
        $sql = "SELECT * FROM tbl_phidraulica WHERE material like '%" . $ph . "%' AND data = CURDATE() ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function TabPhidraulica($ph) {
        $sql = "SELECT * FROM tbl_phidraulica WHERE id_estrada = '$ph' AND data < CURDATE()AND alt = 0 AND arq = 0 ORDER BY pkinicio";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function CarregaPhidraulica($cod) {
        $sql = "SELECT * FROM tbl_phidraulica WHERE id_ph = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();                                              
        $ph = new PHidraulica($registo['id_ph'],$registo['alt'],$registo['reg'], $registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'], $registo['pkfim'], $registo['lat_c'], $registo['lat_n'], $registo['long_c'], $registo['long_n'], $registo['altitude'], $registo['material'], $registo['forma'], $registo['largura_ph'], $registo['altura_ph'], $registo['diametro'], $registo['septos'], $registo['altura_sp'], $registo['largura_sp'], $registo['ass']);
        $this->conexao->desconectar();
        return $ph;
    }
     public function ListaEstradas() {
        $sql = "SELECT tbl_phidraulica.id_estrada, tbl_estrada.codigo, tbl_estrada.ilha, tbl_estrada.toponimo
        FROM tbl_phidraulica INNER JOIN tbl_estrada ON tbl_phidraulica.id_estrada = tbl_estrada.id_estrada
        WHERE tbl_phidraulica.alt = 0 AND tbl_phidraulica.arq = 0
        GROUP BY tbl_phidraulica.id_estrada  ORDER BY tbl_estrada.ilha";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
 
    //----------------------------RECTIFICAR--------------------------------------------------
     public function CarregaPhidraulicaRect($cod) {
        $sql = "SELECT * FROM tbl_phidraulica WHERE id_ph = $cod";
        $this->conexao->conectar();
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $tabela = $banco->query($sql);
        $registo = $tabela->fetch_array();                                              
        $ph = new PHidraulica($registo['id_ph'],$registo['alt'],$registo['reg'], $registo['id_estrada'], $registo['data'], $registo['hora'], $registo['pkinicio'], $registo['pkfim'], $registo['lat_c'], $registo['lat_n'], $registo['long_c'], $registo['long_n'], $registo['altitude'], $registo['material'], $registo['forma'], $registo['largura_ph'], $registo['altura_ph'], $registo['diametro'], $registo['septos'], $registo['altura_sp'], $registo['largura_sp'], $registo['ass'],$registo['arq'],$registo['data_arq']);
        $this->conexao->desconectar();
        return $ph;
    }
      public function LocalizarRect($ph) {
        $sql = "SELECT * FROM tbl_phidraulica WHERE id_estrada = '$ph' AND arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function Rectificar($ph) {       
        $sql = "UPDATE tbl_phidraulica SET alt = '" . $ph->getAlt() .
                "',reg = '" . $ph->getReg() .
                "',id_estrada = '" . $ph->getId_estrada() .
                "',data = '" . $ph->getData() .
                "',hora = '" . $ph->getHora() .
                "',pkinicio = '" . $ph->getPkinicio() .
                "',pkfim = '" . $ph->getPkfim() .
                "',lat_c = '" . $ph->getLat_c() .
                "',lat_n = '" . $ph->getLat_n() .
                "',long_c = '" . $ph->getLong_c() .
                "',long_n = '" . $ph->getLong_n() .
                "',altitude = '" . $ph->getAltitude() .
                "',material = '" . $ph->getMaterial() .
                "',forma = '" . $ph->getForma() .
                "',largura_ph = '" . $ph->getLargura_ph() .
                "',altura_ph = '" . $ph->getAltura_ph() .
                "',diametro = '" . $ph->getDiametro() .
                "',septos = '" . $ph->getSeptos() .
                "',altura_sp = '" . $ph->getAltura_sp() .
                "',largura_sp = '" . $ph->getLargura_sp() .
                 "',arq = '" . $ph->getArq() .
                "',data_arq = '" . $ph->GetData_arq(). "'WHERE id_ph =" . $ph->getId_ph();
        //echo $sql;
        $banco = $this->conexao->getBanco();
        $banco->query('SET NAMES utf8');
        $banco->query($sql);
        $this->conexao->desconectar();
    }
    
     //------------------------------------ EXCEL --------------------------------
    
    public function ExportExcelPHidraulica(){
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_phidraulica.*
        FROM tbl_estrada INNER JOIN tbl_phidraulica ON tbl_estrada.id_estrada = tbl_phidraulica.id_estrada
        WHERE tbl_phidraulica.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    
     public function ExportExcelSAntao(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_phidraulica.*
        FROM tbl_estrada INNER JOIN tbl_phidraulica ON tbl_estrada.id_estrada = tbl_phidraulica.id_estrada
        WHERE tbl_estrada.ilha = 'Santo Antão' AND tbl_phidraulica.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
     public function ExportExcelSVicente(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_phidraulica.*
        FROM tbl_estrada INNER JOIN tbl_phidraulica ON tbl_estrada.id_estrada = tbl_phidraulica.id_estrada
        WHERE tbl_estrada.ilha = 'São Vicente' AND tbl_phidraulica.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSNicolau(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_phidraulica.*
        FROM tbl_estrada INNER JOIN tbl_phidraulica ON tbl_estrada.id_estrada = tbl_phidraulica.id_estrada
        WHERE tbl_estrada.ilha = 'São Nicolau' AND tbl_phidraulica.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSal(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_phidraulica.*
        FROM tbl_estrada INNER JOIN tbl_phidraulica ON tbl_estrada.id_estrada = tbl_phidraulica.id_estrada
        WHERE tbl_estrada.ilha = 'Sal' AND tbl_phidraulica.arq = 0";
        //echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBVista(){        
         $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_phidraulica.*
        FROM tbl_estrada INNER JOIN tbl_phidraulica ON tbl_estrada.id_estrada = tbl_phidraulica.id_estrada
        WHERE tbl_estrada.ilha = 'Boa Vista' AND tbl_phidraulica.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelMaio(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_phidraulica.*
        FROM tbl_estrada INNER JOIN tbl_phidraulica ON tbl_estrada.id_estrada = tbl_phidraulica.id_estrada
        WHERE tbl_estrada.ilha = 'Maio' AND tbl_phidraulica.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelSantiago(){        
        $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_phidraulica.*
        FROM tbl_estrada INNER JOIN tbl_phidraulica ON tbl_estrada.id_estrada = tbl_phidraulica.id_estrada
        WHERE tbl_estrada.ilha = 'Santiago' AND tbl_phidraulica.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelFogo(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_phidraulica.*
        FROM tbl_estrada INNER JOIN tbl_phidraulica ON tbl_estrada.id_estrada = tbl_phidraulica.id_estrada
        WHERE tbl_estrada.ilha = 'Fogo' AND tbl_phidraulica.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
    public function ExportExcelBrava(){        
          $sql = "SELECT tbl_estrada.ilha,tbl_estrada.codigo, tbl_phidraulica.*
        FROM tbl_estrada INNER JOIN tbl_phidraulica ON tbl_estrada.id_estrada = tbl_phidraulica.id_estrada
        WHERE tbl_estrada.ilha = 'Brava' AND tbl_phidraulica.arq = 0";
       // echo $sql;
        $banco = $this->conexao->getBanco(); 
        $banco->query('SET NAMES utf8');
        $retorno = $banco->query($sql);
        $this->conexao->desconectar();
        return $retorno;
    }
   
    //-----------------------------------------------

    public function getConexao() {
        return $this->conexao;
    }

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }

}
