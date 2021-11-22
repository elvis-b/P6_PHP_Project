<?php

require_once "conexion.php";

class ModeloSchedule{
		
	/*=============================================
	MOSTRAR NOTIFICACIONES
	=============================================*/

	static public function mdlMostrarSchedule($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();
		
		$stmt = null;
	
	}

	static public function mdlMostrarSchedule1($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_schedule DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;


	}


}