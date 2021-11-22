<?php

require_once "conexion.php";

class ModeloUsuarios{

static public function cerrarSesion(){
    unset($_SESSION["nombre"]);
    unset($_SESSION["tipo"]);
}	
    
    
    /*=============================================
	REGISTRO DE USUARIO
	=============================================*/
    
    

	static public function mdlRegistroEstudiante($tabla, $datos){

                $sql = Conexion::conectar()->prepare("SELECT * FROM students,teachers,users_admin  WHERE students.username= \"".$datos["username"]."\""
                     . "                         or teachers.username= \"".$datos["username"]."\" or users_admin.username= \"".$datos["username"]."\"" );
                $sql -> execute();
                if($sql->rowCount()>0 )
                {
                    return "existe";
                }
                else
                {
                    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(username, pass, email, name, surname, telephone, nif) VALUES (:username, :password, :email, :nombre, :surname, :telefono, :nif)");

                    $stmt->bindParam(":username", $datos["username"], PDO::PARAM_STR);
                    $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
                    $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
                    $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
                    $stmt->bindParam(":surname", $datos["surname"], PDO::PARAM_STR);
                    $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
                    $stmt->bindParam(":nif", $datos["nif"], PDO::PARAM_STR);

                    if($stmt->execute()){
                            return "ok";
                    }else{
                            return "error";
                    }

                    $stmt->close();
                    $stmt = null;

                     }
	}

	/*=============================================
	REGISTRO DE ADMIN
	=============================================*/

	static public function mdlRegistroAdmin($tabla, $datos){

            
                $sql = Conexion::conectar()->prepare("SELECT * FROM students,teachers,users_admin  WHERE students.username= \"".$datos["username"]."\""
                     . "                         or teachers.username= \"".$datos["username"]."\" or users_admin.username= \"".$datos["username"]."\"" );
                $sql -> execute();
                if($sql->rowCount()>0 )
                {
                    return "existe";
                }
                else
                {
            
                    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(username, password, email, name, surname) VALUES (:username, :password, :email, :nombre, :surname)");

                    $stmt->bindParam(":username", $datos["username"], PDO::PARAM_STR);
                    $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
                    $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
                    $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
                    $stmt->bindParam(":surname", $datos["surname"], PDO::PARAM_STR);

                    if($stmt->execute()){

			return "ok";

                    }else{

			return "error";
		
                    }

                    $stmt->close();
                    $stmt = null;

            }

        }
/*=============================================
	REGISTRO DE TEACHER
	=============================================*/

	static public function mdlRegistroTeacher($tabla, $datos){

            
            
                $sql = Conexion::conectar()->prepare("SELECT * FROM students,teachers,users_admin  WHERE students.username= \"".$datos["username"]."\""
                     . "                         or teachers.username= \"".$datos["username"]."\" or users_admin.username= \"".$datos["username"]."\"" );
                $sql -> execute();
                if($sql->rowCount()>0 )
                {
                    return "existe";
                }
                else
                {
                    
                
                    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(username, password, email, name, surname, telephone, nif) VALUES (:username, :password, :email, :nombre, :surname, :telefono, :nif)");

                    $stmt->bindParam(":username", $datos["username"], PDO::PARAM_STR);
                    $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
                    $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
                    $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
                    $stmt->bindParam(":surname", $datos["surname"], PDO::PARAM_STR);
                    $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
                    $stmt->bindParam(":nif", $datos["nif"], PDO::PARAM_STR);


                    if($stmt->execute()){

                            return "ok";

                    }else{

                            return "error";

                    }

                    $stmt->close();
                    $stmt = null;
                }
	}

	/*=============================================
	MOSTRAR Estudiante
	=============================================*/

	static public function mdlMostrarEstudiante($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();
                
		return $stmt -> fetch();

		$stmt-> close();

		$stmt = null;

	}

	static public function mdlMostrarAdmin($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt-> close();

		$stmt = null;

	}

        static public function mdlActualizarPerfil($tabla, $datos){


            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET pass=:password, username=:username ,email=:email WHERE username=\"".$_SESSION["username"]."\"");

            if(isset($datos['username']))
            {
                // Comprobamos que no exista un usuario con el mismo username
                $sql = Conexion::conectar()->prepare("SELECT * FROM students,teachers,users_admin  WHERE students.username= \"".$datos["username"]."\""
                    . "                         or teachers.username= \"".$datos["username"]."\" or users_admin.username= \"".$datos["username"]."\"" );
                $sql -> execute();
                
               
                if($sql->rowCount()>0 )
                {
                    return "existe";
                } 
                
                $username = $datos['username'];
            
            } else {
                $username = $_SESSION["username"];
            }  
            
            echo "Nombre de usuario ". $username;
            
            if(isset($datos['password'])){
                $password = $datos["password"];
            } else {
                $password = $_SESSION["password"];
            } 
            
            if(isset($datos['email'])){
                $email = $datos["email"];
            } else {
                $email = $_SESSION["email"]; 
            }
            $stmt->bindParam(":username", $username, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":password", $password, PDO::PARAM_STR);
            

            
            if($stmt->execute()){
                // Modificar variables de sesion
                $_SESSION["email"] = $email;
                $_SESSION["password"]=$password;
                $_SESSION["username"]=$username;
                return "ok";
            }else{
                return "error";
            }

            $stmt->close();
        }

        static public function mdlMostrarTeacher($tabla, $item, $valor){

		//if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		//}else{

		//	$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_usuario DESC");

		//	$stmt -> execute();

		//	return $stmt -> fetchAll();

		//}

		$stmt -> close();
		
		$stmt = null;
	
	}


}