<?php
declare(strict_types=1);
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/conexion.php';

class Ingreso extends Conexion {

    public function __construct (){
        parent::__construct();
    }

    public function Listar_ingreso () {
        try {
            $sql="SELECT * FROM ingreso";
            $statement=$this->conectar->prepare($sql);
            $statement->execute();
            
            $lista_ingreso=[];
            while($fila=$statement->fetch(PDO::FETCH_ASSOC)) {
                $datos=[
                    "ID"=>$fila['id_ingreso'],
                    "ID_PROVEEDOR"=>$fila['id_proveedor'],
                    "FECHA_INGRESO"=>$fila['fecha_ingreso'],
                    "FECHA_LLEGADA_PRODUCTO"=>$fila['fecha_llegada_producto'],
                    "TIPO_COMPROBANTE"=>$fila['tipo_comprobante'],
                    "SERIE"=>$fila['serie'],
                    "CORRELATIVO"=>$fila['correlativo'],
                    "IGV"=>$fila['igv']
                ];

                array_push($lista_ingreso,$datos);
            }

        } catch (PDOException $e){
            $lista_ingreso=[
                ["Error:"=>$e->getMessage()]
            ];
            die();
        }

        return $lista_ingreso;
    }

    public function Insertar_ingreso(int $id_proveedor, string $fecha_ingreso, string $fecha_llegada_producto, string $tipo_comprobante, string $serie, string $correlativo, string $igv) {
        
        try {
            $sql="INSERT INTO ingreso VALUES (null, :id_prove, :fec_ingre, :fec_llega_ingre, :tip_com, :serie, :corre, :igv)";
            $statement=$this->conectar->prepare($sql);
            $statement->execute(array(":id_prove"=>$id_proveedor, ":fec_ingre"=>$fecha_ingreso, ":fec_llega_ingre"=>$fecha_llegada_producto, ":tip_com"=>$tipo_comprobante, ":serie"=>$serie, ":corre"=>$correlativo, ":igv"=>$igv));

            $lista_ingreso=[];
            if(($statement->rowCount())>0){
                $datos=["Message"=>"Registros insertados correctamente"];
                array_push($lista_ingreso,$datos);
            }

        } catch (PDOException $e) {
            $lista_ingreso=[
                ["Error"=>$e->getMessage()]
            ];
            die();
        }

        return $lista_ingreso;
    }

    
    public function Eliminar_ingreso (int $id) {
        try {
            $sql="DELETE FROM ingreso WHERE id_ingreso=:id";
            $statement=$this->conectar->prepare($sql);
            $statement->execute(array(":id"=>$id));

            $lista_ingreso=[];
            if(($statement->rowCount())>0) {
                $datos=["Message"=>"Registro eliminado correctamente"];
                array_push($lista_ingreso,$datos);
            }

        }catch (PDOException $e) {
            $lista_ingreso=[
                ["Error:"=>$e->getMessage()]
            ];
            die();
        }

        return $lista_ingreso;
    }

    public function Actualizar_ingreso (int $id,int $id_proveedor, string $fecha_ingreso, string $fecha_llegada_producto, string $tipo_comprobante, string $serie, string $correlativo, string $igv) {

        try {
            $sql="UPDATE ingreso SET id_proveedor=:id_prove, fecha_ingreso=:fec_ingre, fecha_llegada_producto=:fec_lle_pro, tipo_comprobante=:tip_com, serie=:ser, correlativo=:corre, igv=:igv WHERE id_ingreso=:id";
            
            $statement=$this->conectar->prepare($sql);
            $statement->execute(array(":id"=>$id, ":id_prove"=>$id_proveedor, ":fec_ingre"=>$fecha_ingreso,":fec_lle_pro"=>$fecha_llegada_producto, ":tip_com"=>$tipo_comprobante, ":ser"=>$serie, ":corre"=>$correlativo, ":igv"=>$igv));

            $lista_ingreso=[];
            if(($statement->rowCount())>0) {
                $datos=["Message"=>"Registros actualizados correctamente"];
                array_push($lista_ingreso,$datos);
            }

        } catch (PDOException $e) {
            $lista_ingreso=[
                ["Error:"=>$e->getMessage()]
            ];
            die();
        }

        return $lista_ingreso;
    }

}