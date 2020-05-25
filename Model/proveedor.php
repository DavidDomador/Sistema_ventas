<?php 
declare(strict_types=1);
require_once $_SERVER['DOCUMENT_ROOT']. '/Model/conexion.php';

class Proveedor extends Conexion {

    public function __construct(){
        parent::__construct();
    }

    public function Listar_proveedor() {
        try {
            $sql="SELECT * FROM proveedor";
            $statement=$this->conectar->prepare($sql);
            $statement->execute();

            $lista_proveedor=[];
            
            while($fila=$statement->fetch(PDO::FETCH_ASSOC)){
                $datos=[
                    "ID"=>$fila['id_proveedor'],
                    "RAZON_SOCIAL"=>$fila['razon_social'],
                    "SECTOR_COMERCIAL"=>$fila['sector_comercial'],
                    "TIPO_COMPROBANTE"=>$fila['tipo_comprobante'],
                    "NUM_COMPROBANTE"=>$fila['num_comprobante'],
                    "DIRECCION"=>$fia['direccion'],
                    "TELEFONO"=>$fila['telefono'],
                    "CELULAR"=>$fila['celular'],
                    "EMAIL"=>$fila['email'],
                    "URL"=>$fila['url']
                ];

                array_push($lista_proveedor,$datos);
            }

        }catch (PDOException $e){
            $lista_proveedor=[
                ["Error"=>$e->getMessage()]
            ];
            die();
        }

        return $lista_proveedor;
    }

    public function Insetar_proveedor(string $razon_social, string $sector_comercial, string $tipo_comprobante, string $num_comprobante, string $direccion, string $telefono, string $celular, string $email, string $url) {
        try {
            $sql="INSERT INTO proveedor VALUES (null,:ra_so,:sec_com,:tip_com,:num_com,:direc,:telef,:cel,:emai,:ur)";
            $statement=$this->conectar->prepare($sql);
            $statement->execute(array(":ra_so"=>$razon_social,":sec_com"=>$sector_comercial, ":tipo_com"=>$tipo_comprobante, ":num_com"=>$num_comprobante, ":direc"=>$direccion, ":telef"=>$telefono, ":cel"=>$celular, ":emai"=>$email, ":url"=>$url));

            $lista_proveedor=[];
            if(($statement->rowCount())>0) {
                $datos=[
                    "Message"=>"Registros ingresados correctamente"
                ];
                array_push($lista_proveedor,$datos);
            }

        }catch (PDOException $e) {
            $lista_proveedor=[
                ["Error:"=>$e->getMessage()]
            ];
        }

        return $lista_proveedor;
    }

    public function Eliminar_proveedor () {
        try {
            $sql="DELETE FROM proveedor WHERE id_proveedor=:id";
            $statement=$this->conectar->prepare($sql);
            $statement->execute();

            $lista_proveedor=[];
            if(($statement->rowCount())>0){
                $datos=[
                    "Message"=>"Registro eliminado correctamente"
                ];
                array_push($lista_proveedor,$datos);
            }

        }catch (PDOException $e){
            $lista_proveedor=[
                ["Error:"=>$e->getMessage()]
            ];
            die();
        }

        return $lista_proveedor;
    }

    public function Actualizar_proveedor (int $idproveedor,string $razon_social, string $sector_comercial, string $tipo_comprobante, string $num_comprobante, string $direccion, string $telefono, string $celular, string $email, string $url ) {
        
        try {
            $sql="UPDATE proveedor SET razon_social=:raso, sector_comercial=:secom, tipo_comprobante=:ticom,num_comprobante=:numcom,direccion=:direc, telefono=:telf, celular=:cel, email=:emai, url=:ur WHERE id_proveedor=$idproveedor";
            $statement=$this->conectar->prepare($sql);
            $statement->execute(array(":raso"=>$razon_social,":secom"=>$sector_comercial, ":ticom"=>$tipo_comprobante, ":numcom"=>$num_comprobante, ":direc"=>$direccion, ":telf"=>$telefono, ":cel"=>$celular, ":emai"=>$email, ":url"=>$url));

            $lista_proveedor=[];
            if(($statement->rowCount())>0){
                $datos=["Message"=>"Registros insertados correctamente"];

                array_push($lista_proveedor,$datos);
            }

        }catch (PDOException $e) {
            $lista_proveedor=[
                ["Error:"=>$e->getMessage()]
            ];
            die();
        }

        return $lista_proveedor;
    }
}