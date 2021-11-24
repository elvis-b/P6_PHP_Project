


<?php $url = Ruta::ctrRuta();  ?>

       <!-- Begin page content -->
    <div class="container" >

    <div class="container">

    <h1 align="center"> <u>Curso dados de alta </u></h1>

    <form action="vistaAltaCurso">
        <button type="submit" class="btn btn-primary">Alta curso</button>
        <br><br>
    </form>

    <div class="row form-group product-chooser">

        <br>
         <?php



            $cursos = ControladorCursos::ctrMostrarTodosCursos();

            echo "<table class=\"table table-striped\">";
            echo "<thead>";
              echo " <tr>";
                 echo "<th scope=\"col\">Id Cursos</th>";
                 echo "<th scope=\"col\">Nombre</th>";
                 echo "<th scope=\"col\">Descripcion</th>";
                 echo "<th scope=\"col\">Inicio</th>";
                 echo "<th scope=\"col\">Fin</th>";
                 echo "<th scope=\"col\">Activo</th>";
                 echo "<th scope=\"col\">Opciones</th>";
               echo "</tr>";
             echo "</thead>";
         echo "<tbody>";

            foreach ($cursos as $key => $value){

                echo "<tr>";
                    echo "<td>".$value['id_course']."</td>";
                    echo "<td>".$value['name']."</td>";
                    echo "<td>".$value['description']."</td>";
                    echo "<td>".$value['date_start']."</td>";
                    echo "<td>".$value['date_end']."</td>";

                    if($value['active']==1){
                        echo "<td>Si</td>";
                    } else {
                        echo "<td>No</td>";
                    };
                    echo '<td id="divCursos">
                                   <button class="btn btn-warning btnEditarCurso" idCurso="' . $value["id_course"] . '" data-toggle="modal" data-target="#modalEditarCurso"><i class="fa fa-file la-3x"></i>
                                   </button>
                                   <form action="vistaEliminarCurso">
                                        <button class="btn btn-danger btnEliminarCurso" idCurso="' . $value["id_course"] . '"><i class="fa fa-times la-3x"></i>
                                    </form>
                                   </button>
                               <div class="clear"></div>
                          </td>';
                echo "</tr>";

            }
            echo "</tbody>";
            echo  "</table>";
            if(sizeof($cursos)==0){

                echo "<h2 style=\"color:red;\"> No hay cursos dados de alta </h2>";

            }
      ?>




    </div>


     </div>

   </div>


</div>




<!--=====================================
MODAL EDITAR CURSO
======================================-->

<div id="modalEditarCurso" class="modal fade" role="dialog">

   <div class="modal-dialog">

     <div class="modal-content">

       <!-- <form role="form" method="post" enctype="multipart/form-data"> -->

         <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#C6C0BF; color:white; text-align: center;" >
             <button type="button" class="close" data-dismiss="modal">&times;</button>
              <center><h4 class="modal-title">Editar Cursos</h4></center>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!--=====================================
            ENTRADA PARA EL TÍTULO
            ======================================-->

            <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-product"></i>Nombre</span>

                  <input type="text" class="form-control input-lg validarCurso nombreEditar" name="name" placeholder="Ingresar Nombre Curso">

                </div>

            </div>

                 <input type="hidden" class="idCurso" id="idCurso" >

          <div class="form-group">
              <div class="input-group mb-2">
                <span class="input-group-addon">Descripcion</span>
                <textarea id="descripcion" name="descripcion" class="md-textarea form-control descripcionEditar" placeholder="Ingrese Descripción del curso" name="descripcion" rows="3"></textarea>
                <label for="form10"></label>
              </div>
          </div>
          <br>


          <div class="form-group">


                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-product"></i>Inicio</span>

                  <input type="datetime-local" class="form-control input-lg inicioEditar" name="inicio" placeholder="Ingresar título producto">

                </div>

            </div>

             <div class="form-group">


                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-product"></i>Final</span>

                  <input type="datetime-local" class="form-control input-lg finalEditar" name="final" placeholder="Ingresar título producto">

                </div>

            </div>

        </div>


        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-primary EditarCurso">Guardar </button>

        </div>

       <!-- </form> -->

     </div>

   </div>

</div>

<?php

 $eliminarCurso = new ControladorCursos();
 $eliminarCurso -> ctrEliminarCurso();

?>
