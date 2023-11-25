<?php

class Conectar {
   private $host;
   private $user;
   private $pass;
   private $bd;
   private $con;
   
   public function __construct() {
       $this->host = "localhost";
       $this->user = "root";
       $this->pass = "";
       $this->bd = "igr";
       $con = mysqli_connect($this->host,$this->user,$this->pass,$this->bd);
      
   if(!$con){
       die('A conexão à base de dados falhou:'. mysqli_connect_error());         
    }else {
        mysqli_query($con,"SET NAMES 'utf-8'");
       
    }
  }
  
  public function consultaSimples($sql){
     mysqli_query($sql);
     
  }
  public function consultaRetorno($sql){
      $con = mysqli_connect($this->host,$this->user,$this->pass,$this->bd);
      $consulta = mysqli_query($con,$sql);
      return $consulta;
  }
  public function getHost() {
      return $this->host;
  }

  public function getUser() {
      return $this->user;
  }

  public function getPass() {
      return $this->pass;
  }

  public function getBd() {
      return $this->bd;
  }

  public function setHost($host) {
      $this->host = $host;
  }

  public function setUser($user) {
      $this->user = $user;
  }

  public function setPass($pass) {
      $this->pass = $pass;
  }

  public function setBd($bd) {
      $this->bd = $bd;
  }
  public function getCon() {
      return $this->con;
  }

  public function setCon($con) {
      $this->con = $con;
  }



}
