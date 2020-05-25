<?php 
    declare(strict_types=1);
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/conexion.php';
    
    class Usuario extends Conexion {

        public function __construct(){
            parent::__construct();
        }

        public function Listar_usuario (){
            try {
                $sql="SELECT * FROM usuario";
                $statement = $this->conectar->prepare($sql);
                $statement->execute();

                $lista_usuario=[];
                while($filas=$statement->fetch(PDO::FETCH_ASSOC)) {
                    $datos=[
                        "ID"=>$filas['id_usuario'],
                        "NOMBRES"=>$filas['nombres'],
                        "APELLIDOS"=>$filas['apellidos'],
                        "DEPARTAMENTO"=>$filas['departamento'],
                        "PROVINCIA"=>$filas['provincia'],
                        "DISTRITO"=>$filas['distrito'],
                        "DIRECCION"=>$filas['direccion']
                    ];
                    array_push($lista_usuario,$datos);
                }

             
            }catch(PDOException $e) {
                $lista_usuario=[
                    ["Error"=>$e->getMessage()]
                ];
                die();
            }
            echo json_encode($lista_usuario);
            //return $lista_usuario;
        }

        public function Insertar_usuario (string $nom, string $ape, string $depart, string $prov, string $distri, string $direcc) {

            $nombre=htmlspecialchars(addslashes($nom));
            $apellido=htmlspecialchars(addslashes($ape));
            $departamento=htmlspecialchars(addslashes($depart));
            $provincia=htmlspecialchars(addslashes($prov));
            $distrito=htmlspecialchars(addslashes($distri));
            $direccion=htmlspecialchars(addslashes($direcc));


            try {
                $sql="INSERT INTO usuario VALUES (null, :nom , :ape, :depart, :provin, :distri, :direcc)";
                $statement=$this->conectar->prepare($sql);
                $statement->execute(array(":nom"=>$nombre,":ape"=>$apellido,":depart"=>$departamento,":provin"=>$provincia,":distri"=>$distrito,":direcc"=>$direccion));

                $lista_usuario=[];
                if(($statement->rowCount())>0){
                    $datos=["Message"=>"Datos guardados correctamente"];
                    array_push($lista_usuario,$datos);
                }

            }catch (PDOException $e){
                $lista_usuario=[
                    ["Error"=>$e->getMessage()]
                ];
                die();
            }

            return $lista_usuario;
        }


        public function Eliminar_usuario (int $id) {
            $idusuario=$id;
            try {
                $ql="DELETE FROM usuario WHERE id_usuario = :id";
                $statement=$this->conectar->prepare($sql);
                $statement->execute(array(":id"=>$idusuario));

                $lista_usuario=[];
                if(($statement->rowCount())>0){
                    $datos=["Message"=>"Registro eliminado correctamente"];
                    array_push($lista_usuario,$datos);
                }

            }catch(PDOException $e) {
                $lista_usuario=[
                    ["Error"=>$e->getMessage()]
                ];
                die();
            }

            return $lista_usuario;
        }



        public function Actualizar_usuario (string $nombre, string $apellido, string $departamento, string $provincia, string $distrito, string $direccion, int $idusuario ) {
            try {
                $sql="UPDATE usuario SET nombres=:nom, apellidos=:ape, departamento=:depart, provincia=:provin, distrito=:dist, direccion=:direcc WHERE id_usuario = :id ";
                $statement=$this->conectar->prepare($sql);
                $statement->execute(array(":nom"=>$nombre,":ape"=>$apellido,":depart"=>$departamento,":provin"=>$provincia,":dist"=>$distrito,":direcc"=>$direccion,":id"=>$idusuario));
                $lista_usuario=[];
                if(($statement->rowCount())>0){
                    $datos=["Message"=>"Registro actualizado correctamente"];
                    array_push($lista_usuario,$datos);
                }

            }catch(PDOException $e){
                $lista_usuario=[
                    ["Error"=>$e->getMessage()]
                ];
                die();
            }

            return $lista_usuario;
        }

    }

    $objUsuario = new Usuario();
    $objUsuario->Listar_usuario();

