<?php

Class ControladorCursos{

	/*=============================================
	MOSTRAR NOTIFICACIONES
	=============================================*/

	static public function ctrMostrarCursos(){

		$tabla = "courses";

		$respuesta = ModeloCursos::mdlMostrarMisCursos($tabla);

		return $respuesta;

	}

        /**
         * Funcion que muestra los cursos del usuario identificado
         * @param type $item
         * @param type $valor
         * @return type
         */
        static public function ctrMostrarMisCursos(){

		$tabla = "courses";

		$respuesta = ModeloCursos::mdlMostrarMisCursos();

		return $respuesta;

	}
        
        static public function ctrMostrarTodosCursos(){

		$tabla = "courses";

		$respuesta = ModeloCursos::mdlMostrarTodosCursos();

		return $respuesta;

	}
        
	static public function ctrMostrarCursos1($item, $valor){

		$tabla = "courses";

		$respuesta = ModeloCursos::mdlMostrarCursos1($tabla,$item,$valor);

		return $respuesta;

	}

	/*=============================================
	CREAR CURSOS
	=============================================*/

	/*
	static public function ctrCrearCurso($datos){

		if(isset($datos["name"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $datos["name"])){

				
		
					$datos = array(
						   "name"=>$datos["name"],
						   "descripcion"=>$datos["descripcion"],
						   "inicio"=>$datos["inicio"],
						   "final"=>$datos["final"]
						  
					   );

				$respuesta = ModeloCursos::mdlIngresarCurso("courses", $datos);

			    return $respuesta;
				

			}else{

					echo'<script>

					swal({
						  type: "error",
						  title: "¡El nombre del curso  no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "vistaCursos";

							}
						})

			  	</script>';



			}
		
		}

	} 
	*/


	static public function ctrCrearCurso(){

		?>
		<script>
			alert("Llamada al controlador, creamos curso");
		</script>

		<?php

		if(isset($_POST["name"])){

			
                    $datos = array(
			"name"=>$_POST["name"],
			"description"=>$_POST["description"],
			"inicio"=>"",
			"final"=>"",
                        "active"=>"1"
                    );
				
		
					/*$datos = array(
						   "name"=>$_POST["name"],
						   "descripcion"=>$_POST["descripcion"],
						   "inicio"=>$_POST["inicio"],
						   "final"=>$_POST["final"]
						  
					   ); */

                    $respuesta = ModeloCursos::mdlIngresarCurso("courses", $datos);

			    return $respuesta;
				

			//}else{
				/*
					echo'<script>

					swal({
						  type: "error",
						  title: "¡El nombre del curso  no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "vistaCursos";

							}
						})
				
			  	</script>';



			} */
		
		}

	}


	static public function ctrEditarCurso($datos){

		if(isset($datos["id"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $datos["notificacion"])){

					$datos = array("id"=>$datos["id"],
						  "name"=>$datos["name"],
						   "descripcion"=>$datos["descripcion"],
						   "inicio"=>$datos["inicio"],
						   "final"=>$datos["final"]
						  
					   );

				$respuesta = ModeloCursos::mdlEditarCurso("courses", $datos);

					return $respuesta;
				

			}else{

					echo'<script>

					swal({
						  type: "error",
						  title: "¡El nombre del producto no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "vistaCursos";

							}
						})

			  	</script>';



			}
		
		}

	

	}


	/*=============================================
	ELIMINAR CURSO
	=============================================*/

	static public function ctrEliminarCurso(){


		if(isset($_GET["idCurso"])){

			$datos = $_GET["idCurso"];

			$respuesta = ModeloCursos::mdlEliminarCurso("courses", $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El curso ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "vistaCursos";

								}
							})

				</script>';

			}		



		}

	}



	

	

}