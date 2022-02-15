
<?php 
//Bloqueo de informacion (depende)
session_start();

  //Si no hay un usuario logeado me redireige a index
  if(!isset($_SESSION['usuario']))
   {
      //Se redirecciona a la paguina index
      header("Location:../index.php");
   }
   else{
      if($_SESSION['usuario']=="ok")
      {
          $nombreUsuario=$_SESSION['nombreUsuario'];
      }
   }

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

     <?php $url="http://".$_SERVER ['HTTP_HOST']."/sitioweb"?>   

<div id="page">
    <div id="header">
      <nav class="navbar navbar-expand navbar-light bg-primary">
          <div class="nav navbar-nav">
              <a class="nav-link" href="#"> <FONT FACE="Times" SIZE=4 COLOR="White">Administrador Carlos</FONT></a>
              <a class="nav-link" href="<?php echo $url; ?>/administrador/inicio.php"> <FONT FACE="Times" SIZE=4 COLOR="White">Inicio</FONT></a>
              <a class="nav-link" href="<?php echo $url; ?>/administrador/seccion/productos.php"> <FONT FACE="Times" SIZE=4 COLOR="White">Productos</FONT></a>
              <a class="nav-link" href="<?php echo $url; ?>"> <FONT FACE="Times" SIZE=4 COLOR="White">Ver sitio web</FONT></a>
              <a class="nav-link" href="<?php echo $url; ?>/administrador/seccion/cerrar.php"> <FONT FACE="Times" SIZE=4 COLOR="White">Cerrar sesion</FONT></a>
          </div>
      </nav> 
    </div>
</div>


<!--cabecera fija
<style>
body {
    margin: 0;
    padding: 60px 0 0 0;
}
 
#page {
    margin: 0px auto;
    width: 100%;
}

#header {
    position: fixed;
    top: 0;
    width: 10000%;
    padding: 0px 0px;
    /*background-color: #333;*/
    /*font-size: 20px;
    color: #FFFFFF;*/
}

</style>-->



        <div class="container">
            <br/>
            <div class="row">