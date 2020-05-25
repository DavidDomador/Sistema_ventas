<?php
declare(strict_types=1);

require_once $_SERVER['DOCUMENT_ROOT']. '/Model/conexion.php';

class Producto extends Conexion {

    public function __construct(){
        parent::__construct();
    }

    public function Listar_producto () {
        try {
            $sql="SELECT * FROM producto";
            $statement = $this->conectar->prepare($sql);
            $statement->execute();

            $lista_producto=[];
            while($fila=$statement->fetch(PDO::FETCH_ASSOC)) {
                $datos=[
                    "ID"=>$fila['id_producto'],
                    "ID_SUBCATEGORIA"=>$fila['id_subcategoria'],
                    "NOMBRE"=>$fila['nombre'],
                    "DESCRIPCION"=>$fila['descripcion'],
                    "IMAGEN"=>$fila['img_producto']
                ];

                array_push($lista_producto,$datos);
            }

        }catch (PDOException $e){
            $lista_producto[
                ["Error:"=>$e->getMessage()]
            ];

            die();
        }

        return $lista_producto;
    }

    public function Insertar_producto (int $id_subcategoria,string $nombre, string $descripcion, string $imagen) {
        try {
            $sql="INSERT INTO producto VALUES (null,:id_subcat, :nom, :descrip, :img)";
            $statement=$this->conectar->prepare($sql);
            $statement->execute(array(":id_subcat=>$id_subcategoria, :nom"=>$nombre, ":descrip"=>$descripcion, ":img"=>$imagen));

            $lista_producto=[];
            if(($statement->rowCount())>0) {
                $datos=[
                    "Message"=>"Datos registrados correctamente"
                ];

                array_push($lista_producto,$datos);
            }

        } catch (PDOException $e) {
            $lista_producto=[
                ["Error:"=>$e->getMessage()]
            ];
            die();
        }

        return $lista_producto;
    }

    public function Eliminar_producto (int $id) {
        try {
            $sql="DELETE FROM producto WHERE id_producto=:id";
            $statement=$this->conectar->prepare($sql);
            $statement->execute(array(":id"=>$id));

            $lista_producto=[];
            if(($statement->rowCount())>0) {
                $datos=["Message"=>"Registro eliminado correctamente"];
                array_push($lista_producto,$datos);
            }

        }catch (PDOException $e) {
            $lista_producto=[
                ["Error:"=>$e->getMessage()]
            ];
            die();
        }

        return $lista_producto;
    }

    public function Actualizar_producto (int $id, string $nombre, string $descripcion, string $imagen) {
        try {
            $sql="UPDATE producto SET id_subcategoria=:id_subcate, nombre=:nom , descripcion=:descri, img_producto=:img WHERE id_producto=:id";
            $statement=$this->conectar->prepare($sql);
            $statement->execute(array(":id"=>$id, ":id_subcate"=>$id_subcategoria, ":nom"=>$nombre, ":descri"=>$descripcion, ":img"=>$imagen));
            $lista_producto=[];
            if(($statement->rowCount())>0) {
                $datos=["Message"=>"Registros actualizados correctamente"];
                array_push($lista_producto,$datos);
            }

        } catch (PDOException $e) {
            $lista_producto=[
                ["Error:"=>$e->getMessage()]
            ];
            die();
        }

        return $lista_producto;
    }

}
