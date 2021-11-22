
<?php

session_start();

$url = Ruta::ctrRuta();

 $rutas = array();

        if(isset($_GET["ruta"])){

            $rutas = explode("/", $_GET["ruta"]);

            $ruta = $rutas[0];

        }else{

            $ruta = "inicio";

        }

include "modulos/common/head.php";
include "modulos/common/menu.php";

/*=============================================
 RUTAS 
=============================================*/

if(isset($_GET["ruta"])){

    /*=============================================
     LATERAL
     =============================================*/

    if($rutas[0]=="vistaLogin"){
    	echo "<br><br>";
        include "modulos/vistaLogin.php";
  
   }else if($rutas[0]=="vistaRegistro"){
        include "modulos/vistaRegistro.php";
  
   }else if($rutas[0]=="inicio"){
   	  
       include "modulos/inicio.php";
  
   
    } else if($rutas[0]=="vistaPerfil"){
   	   include "modulos/vistaPerfil.php";
            //include "modulos/vistaPerfil.php";
     }  else if($rutas[0]=="vistaCursos"){
   	   include "modulos/vistaCursos.php";
            //include "modulos/vistaPerfil.php";
     } else if($rutas[0]=="vistaMisCursos"){
   	   include "modulos/vistaMisCursos.php";
            //include "modulos/vistaPerfil.php";
    } else if($rutas[0]=="vistaCalendario"){
   	   include "modulos/calendario/index.php";
    } else if($rutas[0]=="vistaAsignaturas"){
            include "modulos/vistaAsignaturas.php"; 
    }else if($rutas[0]=="vistaAsignaturaAdmin"){
            include "modulos/vistaAsignaturaAdmin.php"; 
    }else if($rutas[0]=="vistaCursosAdmin"){
            include "modulos/vistaCursosAdmin.php"; 
    } else if($rutas[0]=="vistaEliminarUsuario"){
            include "modulos/vistaEliminarUsuario.php"; 
    } else if($rutas[0]=="vistaModificarUsuariosAdmin"){
            include "modulos/vistaModificarUsuariosAdmin.php"; 
    } else if($rutas[0]=="vistaAltaUsuario"){
            include "modulos/vistaAltaUsuario.php"; 
            
    } else if($rutas[0]=="vistaAltaCurso"){
        
        if(($_SESSION["tipo"]=="ADMIN")){
             include "modulos/vistaAltaCurso.php";    
        }
       
    }

  if(isset($_SESSION["validarSesion"]) && $_SESSION["validarSesion"] === "ok"){

       if(isset($_GET["ruta"])){

       

         if($rutas[0] == "calendario" || $rutas[0] == "calendariouser" ||$rutas[0] == "vistaAdmin" || $rutas[0] == "logout" ||$rutas[0] == "vistaCursos" || $rutas[0] == "vistaClases" || $rutas[0] == "vistaProfesores"){


         echo "<div class='container'>";

            include "modulos/".$rutas[0].".php";

        
     
          }else{
              include "modulos/calendariouser.php";
          }
        }


    }
   
   
   
     
}else{
    include "modulos/inicio.php";
}

include "modulos/common/footer.php";


?>