<?php

require_once "conexion.php";

class ModeloCursos{
		
	/*=============================================
	MOSTRAR NOTIFICACIONES
	=============================================*/

	static public function mdlMostrarCursos($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();
		
		$stmt = null;
	
	}

        
                static public function mdlMostrarTodosCursos(){

    
			$stmt = Conexion::conectar()->prepare("SELECT id_course, name, description, date_start, date_end, active FROM courses");
                       
                        
                        
			$stmt -> execute();

			//return $stmt -> fetch();

		

			//$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_course DESC");

			//$stmt -> execute();

			return $stmt -> fetchAll();

		

		$stmt -> close();

		$stmt = null;
	}
        
        
        static public function mdlMostrarMisCursos(){

    
			$stmt = Conexion::conectar()->prepare("SELECT courses.id_course, name, description, date_start, date_end FROM courses INNER
                                JOIN enrollment ON courses.id_course = enrollment.id_course WHERE enrollment.id_student=:id");
                       
                        $stmt->bindParam(":id", $_SESSION['id'], PDO::PARAM_STR);
                        
			$stmt -> execute();

			//return $stmt -> fetch();

		

			//$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_course DESC");

			//$stmt -> execute();

			return $stmt -> fetchAll();

		

		$stmt -> close();

		$stmt = null;
	}
        
        
	static public function mdlMostrarCursos1($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_course DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;


	}


	/*=============================================
	CREAR CURSO
	=============================================*/

	static public function mdlIngresarCurso($tabla, $datos){

		?>
		<script>
			alert("Conexion con la BBDD");
		</script>

		<?php
                
                $dateInicio = $_POST['date_start'] . ' ' . $_POST['time_start'];

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(name, description, date_start, date_end,active) VALUES (:nombre, :description, :inicio, :final,:active)");

		$stmt->bindParam(":nombre", $datos["name"], PDO::PARAM_STR);
		$stmt->bindParam(":description", $datos["description"], PDO::PARAM_STR);
		$stmt->bindParam(":inicio", $dateInicio, PDO::PARAM_STR);
		$stmt->bindParam(":final", $datos["final"], PDO::PARAM_STR);	
                $stmt->bindParam(":active", $datos["active"], PDO::PARAM_STR);	
                
		if($stmt->execute()){

			?>
			<script>
				alert("OK!!! Dado de alta");
			</script>

		<?php
			return "ok";

		}else{
			?>
			<script>
				alert("Erorr :(");
			</script>

		<?php

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}



	/*=============================================
	EDITAR CURSO
	=============================================*/

	static public function mdlEditarCurso($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET name = :nombre, description = :descripcion,  inicio = :inicio,  final = :final WHERE id_course = :id");
	       
	    $stmt->bindParam(":nombre", $datos["name"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":inicio", $datos["inicio"], PDO::PARAM_STR);
		$stmt->bindParam(":final", $datos["final"], PDO::PARAM_STR);
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
	ELIMINAR CURSO
	=============================================*/

	static public function mdlEliminarCurso($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_course = :id");

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
	ACTUALIZAR Curso
	=============================================*/

	static public function mdlCursoAliado($tabla, $item, $valor){

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


	

