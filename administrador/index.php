
<?php

session_start();

include("configuracion/bd.php");

//print_r($_POST);

$usuario=(isset($_POST['usuario']))?$_POST['usuario']:"";  //validar: condicion ternaria lo que si se cumple lo que no se cumple
$contraseña=(isset($_POST['contraseña']))?$_POST['contraseña']:"";  //validar: condicion ternaria lo que si se cumple lo que no se cumple

echo "<br/>";
echo $usuario."<br/>";
echo $contraseña."<br/>";


$sentenciaSQL= $conexion-> prepare("SELECT * FROM usuarios ");
$sentenciaSQL->execute();
$ucs=$sentenciaSQL->fetchall(PDO::FETCH_ASSOC);


foreach ($ucs as $uc) 
{
   /*echo "<br/>";
     echo $uc['usuario']."<br/>";
     echo $uc['contraseña']."<br/>";
   */


if($_POST)
    {
      if(($_POST['usuario']==$uc['usuario']) && ($_POST['contraseña']==$uc['contraseña']))
      {
        $_SESSION['usuario']="ok";
        $_SESSION['nombreUsuario']=$uc['usuario'];

        header('Location:inicio.php');
      }
      else{
        $mensaje="Error: El usuario o contraseña son incorrectos";
      }
    }}
?>



<!doctype html>
<html lang="en">
  <head>
    <title>Admiistrador</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <div class="container">
        <div class="row">
            <div class="col-md-4">    
            </div>

            <div class="col-md-4">

            <br/> <br/> <br/>

            <div class="card">
                <div class="card-header text-center">
                    Login
                </div>
                <div class="card-body">

                <?php if(isset($mensaje)){?>
                  <div class="alert alert-danger" role="alert">
                    <?php echo $mensaje; ?>
                  </div>
                <?php }?>

                        <form method="POST">

                            <div class = "form-group">
                            <label>Usuario:</label>
                            <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario">
                            </div>

                            <div class="form-group">
                            <label>Contraseña:</label>
                            <input type="password" class="form-control" name="contraseña" id="contraseña" placeholder="Contraseña">
                            </div>
                            <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Iniciar sesion</button><br/><br/>
                            <a name= ""  id="" class="btn btn-primary" href="../index.php" role ="button">Regresar</a>
                            </div>

                        </form>
                        
                        
                </div>
            </div>
                
            </div>
            
        </div>
    </div>
   
  </body>
</html>
