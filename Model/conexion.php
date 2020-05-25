<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/config.php';
    class Conexion {
        protected $conectar;

        public function __construct(){
            try {
                $dn ="mysql:host=". DB_HOST . ";dbname=".DB_NAME; 
                $this->conectar=new PDO($dn,DB_USER,DB_PASSWORD);
                $this->conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conectar->exec("SET CHARACTER SET utf8");

            }catch(PDOException $e){
                "ERROR:".$e->getMessage();
                die();
            }

            return $this->conectar;
            $this->conectar->close();
        }
    }

    
