<?php
declare(strict_types=1);

require_once $_SERVER['DOCUMENT_ROOT']. 'Model/conexion.php';

class Subcategoria extends Conexion {

    public function __construct(){
        parent::__construct();
    }

    public function Listar_subcategoria () {
        try {
            $sql="SELECT * FROM subcategora";
            $statement = $this->conectar->prepare($sql);
            $statement->execute();

            $lista_subcategoria=[];
            while($fila=$statement->fetch(PDO::FETCH_ASSOC)) {
                $datos=[
                    "ID"=>$fila['id_subcategoria'],
                    "ID_CATEGORIA"=>$fila['id_categoria'],
                    "NOMBRE"=>$fila['mombre'],
                    "DESCRIPCION"=>$fila['descripcion']
                ];

                array_push($lista_subcategoria,$datos);
            }

        }catch (PDOException $e){
            $lista_subcategoria=[
                ["Error:"=>$e->getMessage()]
            ];

            die();
        }

        return $lista_subcategoria;
    }

    public function Insertar_subcategoria (int $id_categoria,string $nombre, string $descripcion) {
        try {
            $sql="INSERT INTO subcategoria VALUES (null,:id_cate, :nom, :descrip)";
            $statement=$this->conectar->prepare($sql);
            $statement->execute(array(":id_cate"=>$id_categoria,":nom"=>$nombre, ":descrip"=>$descripcion));

            $lista_subcategoria=[];
            if(($statement->rowCount())>0) {
                $datos=[
                    "Message"=>"Datos registrados correctamente"
                ];

                array_push($lista_subcategoria,$datos);
            }

        } catch (PDOException $e) {
            $lista_subcategoria=[
                ["Error:"=>$e->getMessage()]
            ];
            die();
        }

        return $lista_subcategoria;
    }

    public function Eliminar_subcategoria (int $id) {
        try {
            $sql="DELETE FROM subcategoria WHERE id_subcategoria=:id";
            $statement=$this->conectar->prepare($sql);
            $statement->execute(array(":id"=>$id));

            $lista_subcategoria=[];
            if(($statement->rowCount())>0) {
                $datos=["Message"=>"Registro eliminado correctamente"];
                array_push($lista_subcategoria,$datos);
            }

        }catch (PDOException $e) {
            $lista_subcategoria=[
                ["Error:"=>$e->getMessage()]
            ];
            die();
        }

        return $lista_subcategoria;
    }

    public function Actualizar_subcategoria (int $id,int $id_categoria, string $nombre, string $descripcion) {
        try {
            $sql="UPDATE subcategoria SET id_categoria=:id_cate, nombre=:nom , descripcion=:descri WHERE id_subcategoria=:id";
            $statement=$this->conectar->prepare($sql);
            $statement->execute(array(":id"=>$id, ":id_cate"=>$id_categoria, ":nom"=>$nombre, ":descri"=>$descripcion));
            $lista_subcategoria=[];
            if(($statement->rowCount())>0) {
                $datos=["Message"=>"Registros actualizados correctamente"];
                array_push($lista_subcategoria,$datos);
            }

        } catch (PDOException $e) {
            $lista_subcategoria=[
                ["Error:"=>$e->getMessage()]
            ];
            die();
        }

        return $lista_subcategoria;
    }


}
