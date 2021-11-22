<?php

require_once "conexion.php";

class ModeloClases{
		
	/*=============================================
	MOSTRAR NOTIFICACIONES
	=============================================*/

	static public function mdlMostrarClases($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();
		
		$stmt = null;
	
	}

	static public function mdlMostrarClases1($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_class DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;


	}


	/*=============================================
	CREAR CLASES
	=============================================*/

	static public function mdlIngresarClases($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_teacher, id_course, id_schedule, name, color) VALUES (:id_teacher, :id_course, :id_schedule, :name, :color)");

		$stmt->bindParam(":id_teacher", $datos["id_teacher"], PDO::PARAM_INT);
		$stmt->bindParam(":id_course", $datos["id_curso"], PDO::PARAM_INT);
		$stmt->bindParam(":id_schedule", $datos["id_schedule"], PDO::PARAM_INT);
		$stmt->bindParam(":name", $datos["name"], PDO::PARAM_STR);
		$stmt->bindParam(":color", $datos["color"], PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}



	/*=============================================
	EDITAR CLASES
	=============================================*/

	static public function mdlEditarClases($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  id_teacher = :id_teacher,  id_course = :id_course,  id_schedule = :id_schudule, name = :name, color = :color WHERE id_class = :id");
	       
	   	$stmt->bindParam(":id_teacher", $datos["id_teacher"], PDO::PARAM_STR);
		$stmt->bindParam(":id_course", $datos["id_curso"], PDO::PARAM_STR);
		$stmt->bindParam(":id_schedule", $datos["id_schedule"], PDO::PARAM_STR);
		$stmt->bindParam(":name", $datos["name"], PDO::PARAM_STR);
		$stmt->bindParam(":color", $datos["color"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ELIMINAR CLASES
	=============================================*/

	static public function mdlEliminarClases($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_class = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}




	/*=============================================
	ACTUALIZAR CLASES
	=============================================*/

	static public function mdlActualizarClases($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}


	

}