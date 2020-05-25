<?php 
    declare(strict_types=1);
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/conexion.php';

    class Cotizacion extends Conexion {

        public function __construct(){
            parent::__construct();
        }

        public function Listar_cotizacion () {
            try {
                $sql="SELECT * FROM cotizacion";
                $statement=$this->conectar->prepare($sql);
                $statement->execute();

                $lista_cotizacion=[];
                while ($fila=$statement->fetch(PDO::FETCH_ASSOC)){
                    $datos=[
                        "ID_COTIZACION"=>$fila['id_cotizacion'],
                        "ID_USUARIO"=>$fila['id_usuario'],
                        "NOMBRE_PRODUCTO"=>$fila['nombre_producto'],
                        "PRECIO"=>$fila['precio'],
                        "COMENTARIO"=>$fila['comentario'],
                        "FUE_PEDIDO"=>$fila['fue_pedido'],
                        "FUE_PAGADO"=>$fila['fue_pagado'],
                        "URL"=>$fila['url'],
                        "PRECIO_VENTA"=>$fila['precio_venta']
                    ];

                    array_push($lista_cotizacion,$datos);
                }

            }catch (PDOException $e) {
                $lista_cotizacion=[
                    ["Error:"=>$e->getMessage()]
                ];

                die();
            }

            return $lista_cotizacion;
        }

        public function Insertar_cotizacion (int $id_usuario, string $nombre_producto, string $precio, string $comentario, string $fue_pedido,string $fue_pagado, string $url, string $precio_venta) {

            try {
                $sql="INSERT INTO cotizacion VALUES (null, :id_usu, :nom_prod, :prec, :coment, :f_ped, :f_pag, :ur, :prec_vent) ";
                $statement=$this->conectar->prepare($sql);
                $statement->execute(array(":id_usu"=>$id_usuario, ":nom_prod"=>$nombre_producto, ":prec"=>$precio, ":coment"=>$comentario, ":f_ped"=>$fue_pedido, ":f_pag"=>$fue_pagado, ":ur"=>$url,":prec_vent"=>$precio_venta));

                $lista_cotizacion=[];
                if(($statement->rowCount())>0) {
                    $datos=["Message:"=>"Registros insertados correctamente"];
                    array_push($lista_cotizacion,$datos);
                }
               
            }catch (PDOException $e) {
                $lista_cotizacion=[
                    ["Error:"=>$e->getMessage()]
                ];

                die();
            }

            return $lista_cotizacion;
        }

        public function Eliminar_cotizacion (int $id) {
            try {
                $sql="DELETE FROM cotizacion WHERE id_cotizacion=:id";
                $statement=$this->conectar->prepare($sql);
                $statement->execute(array(":id"=>$id));

                $lista_cotizacion=[];
                if(($statement->rowCount())>0) {
                    $datos=["Message:"=>"Registro eliminado correctamente"];
                    array_push($lista_cotizacion,$datos);
                }

            }catch(PDOException $e) {
                $lista_cotizacion=[
                    ["Error:"=>$e->getMessage()]
                ];

                die();
            }

            return $lista_cotizacion;
        }

        public function Actualizar_cotizacion (int $id_cotizacion, int $id_usuario, string $nombre_producto, string $precio, string $comentario, string $fue_pedido,string $fue_pagado, string $url, string $precio_venta) {

            try {
                $sql="UPDATE cotizacion SET id_usuario=:id_usu, nombre_producto=:nom_produc, precio=:prec, comentario=:coment, fue_pedido=:f_ped, fue_pagado=:f_pag, url=:ur, precio_venta=:prec_vent  WHERE id_cotizacion=:id ";

                $statement=$this->conectar->prepare($sql);
                $statement->execute(array(":id"=>$id, ":id_usu"=>$id_usuario, ":nom_produc"=>$nombre_producto, ":prec"=>$precio, ":coment"=>$comentario, ":f_ped"=>$fue_pedido, ":f_pag"=>$fue_pagado, ":ur"=>$url, ":prec_vent"=>$precio_venta));
                $statement->execute();

                $lista_cotizacion=[];
                if(($statement->rowCount())>0) {
                    $datos=["Message:"=>"Registro actualizado correctamente"];
                    array_push($lista_cotizacion,$datos);
                }

            } catch (PDOException $e){
                $lista_cotizacion=[
                    ["Error:"=>$e->getMessage()]
                ];

                die();
            }

            return $lista_cotizacion;
        }
    }

?>