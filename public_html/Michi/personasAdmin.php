
<html>
    <head>
        <title>Servicios Mich</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../CSS/Estilos.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script src="../JS/lib/jquery/dist/jquery.min.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
        <link href="../CSS/Estilos.css" rel="stylesheet" type="text/css"/>
        <script src="../JS/personasFunctions.js" type="text/javascript"></script>

        <script src="../JS/lib/sweetAlert2/dist/sweetalert2.all.min.js" type="text/javascript"></script>
        <link href="../JS/lib/sweetAlert2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css"/>
        
    </head>
    <body>       
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="../Principal.html"><img src="../IMAGENES/Captura de pantalla (157).png" class="mini_logo" alt=""/></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                    <li class="nav-item">
                                             <a class="nav-link" href="../Michi/Iniciar.html">Iniciar seción</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../Michi/personasAdmin.php">Registrarse</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Servicios
                                                </a>
                                           <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                <a class="dropdown-item" href="Mudanza.html">Mudanza</a>
                                                <a class="dropdown-item" href="Transporte.html">Transporte</a>
                                                <a class="dropdown-item" href="Delivery.html">Delivery</a>
                                           </div>
                                    </li>
                                    <li class="nav-item">
                                                <a class="nav-link" href="../Michi/Viajes.html">Viaje</a>
                                    </li>
                                   <li class="nav-item">
                                                <a class="nav-link" href="../Michi/Preguntas.html">Preguntas frecuentes</a>
                                    </li>
                                    <li class="nav-item active">
                                                <a class="nav-link" href="../Michi/Acerca.html">Acerca de nosotros<span class="sr-only">(current)</span></a>
                                    </li>
                           </ul>
                </div>
         </nav>
 
                                                <!-- ********************************************************** -->
                                                <!--**********************FORMULARIO***********************-->
                                                <!-- ********************************************************** -->

        <div class="row">
            <div class="col-md-12">
                <form role="form" onsubmit="return false;" id="formPersonas">
                    <div class="row">
                                                <!-- ******************************************************** -->
                                                <!-- Campos de formulario      -->
                                                <!-- ******************************************************** -->
                        <div class="col-md-12">

                            <div class="form-group" id="groupPK_cedula">
                                <label for="txtPK_cedula">Cédula</label>
                                <input type="text" class="form-control" id="txtPK_cedula"  placeholder="">
                            </div>
                            <div class="form-group" id="groupnombre">
                                <label for="txtnombre">Nombre</label>
                                <input type="text" class="form-control" id="txtnombre"  placeholder="">
                            </div>
                            <div class="form-group" id="groupapellido1">
                                <label for="txtapellido1">Primer apellido</label>
                                <input type="text" class="form-control" id="txtapellido1"  placeholder="">
                            </div>
                            <div class="form-group" id="groupapellido2">
                                <label for="txtapellido2">Segundo apellido</label>
                                <input type="text" class="form-control" id="txtapellido2"  placeholder="">
                            </div>
                            <div class="form-group" id="groupfecNacimiento">
                                <label for="txtfecNacimiento">Fecha de Nacimiento</label>
                                <input type="text" class="form-control" id="txtfecNacimiento"  placeholder="">
                            </div>
                            <div class="form-group" id="groupsexo">
                                <label for="txtsexo">Genero</label>
                                <input type="text" class="form-control" id="txtsexo"  placeholder="">
                            </div>
                            <div class="form-group" id="groupNombre_Usuario">
                                <label for="txtUsuario">Nombre de usuario</label>
                                <input type="text" class="form-control" id="txtidUsuario"  placeholder="">
                            </div>
                            <div class="form-group" id="groupContrasenna">
                                <label for="txtContraseña">Contraseña</label>
                                <input type="text" class="form-control" id="txtContrasenna"  placeholder="">
                            </div>
                            <div class="form-group" id="groupTipo_Usuario">
                                <label for="txtTipo_Usuario">Usuario o Chofer</label>
                                <input type="text" class="form-control" id="txtTipo_Usuario"  placeholder="">
                            </div>
                            <div class="form-group" id="groupCorreo">
                                <label for="txtCorreo">Correo</label>
                                <input type="text" class="form-control" id="txtCorreo"  placeholder="">
                            </div>
                            <div class="form-group" id="groupTelefono">
                                <label for="txtTelefono">Telefono</label>
                                <input type="text" class="form-control" id="txtTelefono"  placeholder="">
                            </div>
                            <div class="form-group" id="groupLat">
                               <input type="hidden" class="form-control" id="Lat" >
                            </div>
                            <div class="form-group" id="groupLong">
                               <input type="hidden" class="form-control" id="long">
                            </div>
                            
                            <center>
                                    <div id="coordenadas"></div>
                                    <div id="map-container" class="z-depth-1" style="height: 500px; width: 600px;"></div>
                           <script
                                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrWBUM4BClWO4HXgDsy8l1tbgpWlxT_xc&callback=mostrarMapa">
                           </script>
                            </center>
                            <div class="form-group">
                                <input type="hidden" id="typeAction" value="" />
                                <input type="hidden" value="" id="idTarea"/>
                                <button type="submit" class="btn btn-primary" id="enviar">Crear cuenta</button>
                                <button type="reset" class="btn btn-danger" id="cancelar">Borrar datos</button>
                            </div>
                        </div>
                    </div>
                </form>
    </div>
</div>