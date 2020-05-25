<?php
declare(strict_types=1);

require_once $_SERVER['DOCUMENT_ROOT']. '/Model/conexion.php';

class Categoria extends Conexion {

    public function __construct(){
        parent::__construct();
    }

    public function Listar_categoria () {
        try {
            $sql="SELECT * FROM categora";
            $statement = $this->conectar->prepare($sql);
            $statement->execute();

            $lista_categoria=[];
            while($fila=$statement->fetch(PDO::FETCH_ASSOC)) {
                $datos=[
                    "ID"=>$fila['id_categoria'],
                    "NOMBRE"=>$fila['mombre'],
                    "DESCRIPCION"=>$fila['descripcion'],
                    "IMAGEN"=>$fila['imagen']
                ];

                array_push($lista_categoria,$datos);
            }

        }catch (PDOException $e){
            $lista_categoria=[
                ["Error:"=>$e->getMessage()]
            ];

            die();
        }

        return $lista_categoria;
    }

    public function Insertar_categoria (string $nombre, string $descripcion, string $imagen) {
        try {
            $sql="INSERT INTO categoria VALUES (null, :nom, :descrip, :img)";
            $statement=$this->conectar->prepare($sql);
            $statement->execute(array(":nom"=>$nombre, ":descrip"=>$descripcion, ":img"=>$imagen));

            $lista_categoria=[];
            if(($statement->rowCount())>0) {
                $datos=[
                    "Message"=>"Datos registrados correctamente"
                ];

                array_push($lista_categoria,$datos);
            }

        } catch (PDOException $e) {
            $lista_categoria=[
                ["Error:"=>$e->getMessage()]
            ];
            die();
        }

        return $lista_categoria;
    }

    public function Eliminar_categoria (int $id) {
        try {
            $sql="DELETE FROM categoria WHERE id_categoria=:id";
            $statement=$this->conectar->prepare($sql);
            $statement->execute(array(":id"=>$id));

            $lista_categoria=[];
            if(($statement->rowCount())>0) {
                $datos=["Message"=>"Registro eliminado correctamente"];
                array_push($lista_categoria,$datos);
            }

        }catch (PDOException $e) {
            $lista_categoria=[
                ["Error:"=>$e->getMessage()]
            ];
            die();
        }

        return $lista_categoria;
    }

    public function Actualizar_categoria (int $id, string $nombre, string $descripcion, string $imagen) {
        try {
            $sql="UPDATE categoria SET nombre=:nom , descripcion=:descri, imagen=:img WHERE id_categoria=:id";
            $statement=$this->conectar->prepare($sql);
            $statement->execute(array(":id"=>$id, ":nom"=>$nombre, ":descri"=>$descripcion, ":img"=>$imagen));
            $lista_categoria=[];
            if(($statement->rowCount())>0) {
                $datos=["Message"=>"Registros actualizados correctamente"];
                array_push($lista_categoria,$datos);
            }

        } catch (PDOException $e) {
            $lista_categoria=[
                ["Error:"=>$e->getMessage()]
            ];
            die();
        }

        return $lista_categoria;
    }


}
