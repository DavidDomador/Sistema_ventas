<?php
declare(strict_types=1);

require_once $_SERVER['DOCUMENT_ROOT']. '/Model/conexion.php';

class Venta extends Conexion {

    public function __construct(){
        parent::__construct();
    }

    public function Listar_venta () {
        try {
            $sql="SELECT * FROM venta";
            $statement = $this->conectar->prepare($sql);
            $statement->execute();

            $lista_venta=[];
            while($fila=$statement->fetch(PDO::FETCH_ASSOC)) {
                $datos=[
                    "ID"=>$fila['id_venta'],
                    "ID_USUARIO"=>$fila['id_usuario'],
                    "FECHA_VENTA"=>$fila['fecha_venta'],
                    "TIPO_COMPROBANTE"=>$fila['tipo_comprobante'],
                    "TIPO_PAGO"=>$fila['tipo_pago'],
                    "SERIE"=>$fila['serie'],
                    "CORRELATIVO"=>$fila['correlativo'],
                    "SUBTOTAL"=>$fila['subtotal'],
                    "DESCUENTO"=>$fila['descuento'],
                    "IGV"=>$fila['igv'],
                    "TOTAL"=>$fila['total']
                ];

                array_push($lista_venta,$datos);
            }

        }catch (PDOException $e){
            $lista_venta[
                ["Error:"=>$e->getMessage()]
            ];

            die();
        }

        return $lista_venta;
    }

    public function Insertar_venta (int $id_usuario,string $fecha_venta, string $tipo_comprobante, string $tipo_pago, string $serie, string $correlativo, string $subtotal, string $descuento, string $igv, string $total) {
        try {
            $sql="INSERT INTO venta VALUES (null,:id_usu, :fec_ven, :tip_com, :tip_pag, :ser, :correla, :subtotal, :descu, :igv, :total)";

            $statement=$this->conectar->prepare($sql);
            $statement->execute(array( ":id_usu"=>$id_usuario,":fec_ven"=>$fecha_venta, ":tip_com"=>$tipo_comprobante, ":tip_pag"=>$tipo_pago, ":ser"=>$serie, ":correla"=>$correlativo, ":subtotal"=>$subtotal,":descu"=>$descuento,":igv"=>$igv,":total"=>$total));

            $lista_venta=[];
            if(($statement->rowCount())>0) {
                $datos=[
                    "Message"=>"Datos registrados correctamente"
                ];

                array_push($lista_venta,$datos);
            }

        } catch (PDOException $e) {
            $lista_venta=[
                ["Error:"=>$e->getMessage()]
            ];
            die();
        }

        return $lista_venta;
    }

    public function Eliminar_venta (int $id) {
        try {
            $sql="DELETE FROM venta WHERE id_venta=:id";
            $statement=$this->conectar->prepare($sql);
            $statement->execute(array(":id"=>$id));

            $lista_venta=[];
            if(($statement->rowCount())>0) {
                $datos=["Message"=>"Registro eliminado correctamente"];
                array_push($lista_venta,$datos);
            }

        }catch (PDOException $e) {
            $lista_venta=[
                ["Error:"=>$e->getMessage()]
            ];
            die();
        }

        return $lista_venta;
    }

    public function Actualizar_venta (int $id,int $id_usuario,string $fecha_venta, string $tipo_comprobante, string $tipo_pago, string $serie, string $correlativo, string $subtotal, string $descuento, string $igv, string $total) {

        try {
            $sql="UPDATE venta SET id_usuario=:id_usu, fecha_venta=:fec_ven , tipo_comprobante=:tip_com, tipo_pago=:tip_pag, serie=:ser, correlativo=:correla, subtotal=:subto, descuento=:descu, igv=:igv, total=:tot WHERE id_venta=:id";

            $statement=$this->conectar->prepare($sql);

            $statement->execute(array(":id"=>$id, ":id_usuario"=>$id_usuario, ":fec_ven"=>$fecha_venta, ":tip_com"=>$tipo_comprobante, ":tip_pag"=>$tipo_pago, ":ser"=>$serie, ":correla"=>$correlativo, ":subto"=>$subtotal, ":descu"=>$descuento, ":igv"=>$igv, ":tot"=>$total));

            $lista_venta=[];
            if(($statement->rowCount())>0) {
                $datos=["Message"=>"Registros actualizados correctamente"];
                array_push($lista_venta,$datos);
            }

        } catch (PDOException $e) {
            $lista_venta=[
                ["Error:"=>$e->getMessage()]
            ];
            die();
        }

        return $lista_venta;
    }

}
