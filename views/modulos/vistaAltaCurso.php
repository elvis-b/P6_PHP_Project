
        <!-- Begin page content -->
    <div class="container" style="margin-top:50px">

        <div class="col-md-3 col-lg-3">
        </div>

        <div class="col-md-6 col-lg-6">
        
        <center><h1>REGISTRO DE CURSO</h1></center>

        <form method="POST">


        <div class="mb-3">
          <label for="name" class="form-label">Nombre</label>
          <input name="name" type="text" class="form-control" id="name" aria-describedby="nombre" maxlength="20">
        </div>
        <div class="mb-3">
          <label for="description" class="form-label ">Descripción</label>
          <input name="description" type="text" class="form-control" id="description">
        </div>
        <div class="mb-3">
          <label for="date_start" class="form-label passConfirm">Inicio</label>
          <input name="date_start" type="date" class="form-control" id="date_start">
          <input name="time_start" type="time" class="form-control" id="time_start">
        </div>

        <div class="mb-3">
          <label for="date_end" class="form-label">Fin</label>
          <input name="date_end" type="date" class="form-control" id="date_end">
          <input name="time_end" type="time" class="form-control" id="time_end">
         
        </div>
       
               <div class="mb-3">
          <label for="active" class="form-label">Activo</label>
          <input name="active" type="text" class="form-control" id="active" aria-describedby="active" maxlength="20">
         
        </div>
       
        
         <?php

            $registro = new ControladorCursos();
            $registro -> ctrCrearCurso();

          ?>
       
        <button type="submit" class="btn btn-primary">Enviar</button>
        <button type="reset" class="btn btn-primary">Borrar</button>
    
    </form>
</div>
        
        <?php  
        
     

             if(isset($_SESSION['admin1'])){
                 
                    echo "<br><br><h1>".$_SESSION['admin1']."</h1>";
            
                }
                if(isset($_SESSION['error_register'])){
                    echo "<h2>Error:";
                    echo var_dump($_SESSION['error_register']);
                    echo "</h2>";
                }
                
    
            ?>
</div>


