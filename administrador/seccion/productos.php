

<?php include("../template/cabecera.php"); ?>


<?php 

/*
print_r($_POST);
print_r($_FILES);
*/

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";  //validar: condicion ternaria lo que si se cumple lo que no se cumple

$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";  //validar: condicion ternaria lo que si se cumple lo que no se cumple

$txtPrecio=(isset($_POST['txtPrecio']))?$_POST['txtPrecio']:"";  //validar: condicion ternaria lo que si se cumple lo que no se cumple

$txtDescripcion=(isset($_POST['txtDescripcion']))?$_POST['txtDescripcion']:"";  //validar: condicion ternaria lo que si se cumple lo que no se cumple

$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";  //validar: condicion ternaria lo que si se cumple lo que no se cumple

$accion=(isset($_POST['accion']))?$_POST['accion']:"";  //validar: condicion ternaria lo que si se cumple lo que no se cumple

/*
echo $txtID."<br/>";
echo $txtNombre."<br/>";
echo $txtImagen."<br/>";
echo $accion."<br/>";
*/


//llamo importo la conexion a la base de datos 
include("../configuracion/bd.php");


switch ($accion)
{
    case "Agregar":
        $sentenciaSQL= $conexion-> prepare("INSERT INTO productos (nombre,precio,descripcion,imagen) VALUES (:nombre,:precio,:descripcion,:imagen);");
        $sentenciaSQL->bindParam(':nombre',$txtNombre);
        $sentenciaSQL->bindParam(':precio',$txtPrecio);
        $sentenciaSQL->bindParam(':descripcion',$txtDescripcion);

        $fecha= new DateTime ();
        $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"Imagen.jpg";

        $tmpImagen= $_FILES["txtImagen"]["tmp_name"];

        if($tmpImagen!="")
        {
            move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);
        }

        $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
        $sentenciaSQL->execute();

        //Se redirecciona a la paguina productos
        header("Location:productos.php");

        //echo "Presionado Botón agregar";
        break;

    case "Modificar":
        $sentenciaSQL= $conexion-> prepare("UPDATE productos SET nombre=:nombre,precio=:precio,descripcion=:descripcion  WHERE ID=:ID");
        $sentenciaSQL->bindParam(':nombre',$txtNombre);
        $sentenciaSQL->bindParam(':precio',$txtPrecio);
        $sentenciaSQL->bindParam(':descripcion',$txtDescripcion);
        $sentenciaSQL->bindParam(':ID',$txtID);
        $sentenciaSQL->execute();

        if($txtImagen!="")
        {
            $fecha= new DateTime ();
            $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"Imagen.jpg";

            $tmpImagen= $_FILES["txtImagen"]["tmp_name"];

            move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);

            //Primero borramos y luego actualizamos 
            //Borrar l imagen de la carpeta img
            $sentenciaSQL= $conexion-> prepare("SELECT imagen FROM productos WHERE ID=:ID");
            $sentenciaSQL->bindParam(':ID',$txtID);
            $sentenciaSQL->execute();
            $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

            if(isset($producto["imagen"])  && ($producto["imagen"]!="Imagen.jpg") )
            {
                if(file_exists("../../img/".$producto["imagen"]))
                {
                    unlink("../../img/".$producto["imagen"]);
                }
            }

            //Actualizamos 
            $sentenciaSQL= $conexion-> prepare("UPDATE productos SET imagen=:imagen WHERE ID=:ID");
            //$sentenciaSQL->bindParam(':imagen',$txtImagen);
            $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
            $sentenciaSQL->bindParam(':ID',$txtID);
            $sentenciaSQL->execute();

        }
            //Se redirecciona a la paguina productos
            header("Location:productos.php");
            
        //echo "Presionado Botón modificar";
        break;

    case "Cancelar":

        //Se redirecciona a la paguina productos
        header("Location:productos.php");

        //echo "Presionado Botón cancelar";
        break;

    case "✏️":
        $sentenciaSQL= $conexion-> prepare("SELECT * FROM productos WHERE ID=:ID");
        $sentenciaSQL->bindParam(':ID',$txtID);
        $sentenciaSQL->execute();
        $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $txtNombre=$producto['nombre'];
        $txtPrecio=$producto['precio'];
        $txtDescripcion=$producto['descripcion'];
        $txtImagen=$producto['imagen'];

        //echo "Presionado Botón selecionar";
        break;

    case "🗑️":

        //Borrar l imagen de la carpeta img
        $sentenciaSQL= $conexion-> prepare("SELECT imagen FROM productos WHERE ID=:ID");
        $sentenciaSQL->bindParam(':ID',$txtID);
        $sentenciaSQL->execute();
        $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

        if(isset($producto["imagen"])  && ($producto["imagen"]!="Imagen.jpg") )
        {
            if(file_exists("../../img/".$producto["imagen"]))
            {
                unlink("../../img/".$producto["imagen"]);
            }
        }

        //Borrar el registro de la base de datos
        $sentenciaSQL= $conexion-> prepare("DELETE  FROM productos WHERE ID=:ID");
        $sentenciaSQL->bindParam(':ID',$txtID);
        $sentenciaSQL->execute();

        //Se redirecciona a la paguina productos
        header("Location:productos.php");
        
        //echo "Presionado Botón borrar";
        break;
        
}

$sentenciaSQL= $conexion-> prepare("SELECT * FROM productos");
$sentenciaSQL->execute();
$listaProductos=$sentenciaSQL->fetchall(PDO::FETCH_ASSOC);

?>

<div class="col-md-0">

    <div class="card">
        <div class="card-header text-center">
            Datos del producto
        </div>
        <div class="card-body">
            <form method="POST" enctype ="multipart/form-data" > <!--Esta propiedad acepta todos los datos incluso imagenes -->

                <div class = "form-group">
                <label for="txtID">ID:</label>
                <input type="text" required readonly class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID" placeholder="ID">
                </div>

                <div class = "form-group">
                <label for="txtNombre">Nombre:</label>
                <input type="text" required class="form-control" value="<?php echo $txtNombre; ?>" name="txtNombre" id="txtNombre" placeholder="Nombre del equipo">
                </div>

                <div class = "form-group">
                <label for="txtPrecio">Precio:</label>
                <input type="text" required class="form-control" value="<?php echo $txtPrecio; ?>" name="txtPrecio" id="txtPrecio" placeholder="Precio del equipo">
                </div>

                 <div class = "form-group">
                <label for="txtDescripcion">Descripción:</label>
                <input type="text" required class="form-control" value="<?php echo $txtDescripcion; ?>" name="txtDescripcion" id="txtDescripcion" placeholder="Descripcion del equipo">
                </div>

                <div class = "form-group">
                <label for="txtImagen">Imagen:</label>

                <br/>
                <?php //echo $txtImagen; ?>
                <?php if($txtImagen!=""){ ?>

                <img class="img-thumbnail rounded" src="../../img/<?php echo $txtImagen; ?>" width="50" alt="" srcset="">

                <?php } ?>

                <input type="file"  class="form-control" name="txtImagen" id="txtImagen" placeholder="Imagen">
                </div>
<div class="card-body text-center">
                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion"  value="Agregar" <?php echo ($accion=="✏️")?"disabled":""; ?> class="btn btn-success">Agregar</button>
                    <button type="submit" name="accion"  value="Modificar" <?php echo ($accion!="✏️")?"disabled":""; ?> class="btn btn-warning">Modificar</button>
                    <button type="submit" name="accion"  value="Cancelar" <?php echo ($accion!="✏️")?"disabled":""; ?> class="btn btn-info">Cancelar</button>
                </div>
                </div>
            </form>
        </div>

    </div>  
</div>

<div class="col-md-8">
    <table class="table table-bordered">
        <thead class="card-body text-center">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listaProductos as $producto) {?>
            <tr>
                <td><?php echo $producto['ID'];?></td>
                <td><?php echo $producto['nombre'];?></td>
                <td><?php echo $producto['precio'];?></td>
                <td><?php echo $producto['descripcion'];?></td>

                <td><img class="img-thumbnail rounded" src="../../img/<?php echo $producto['imagen'];?>" width="50" alt="" srcset=""></td>

                <!-- <td><?php //echo $libro['imagen'];?></td>-->

                <td class="card-body text-center">

                    <!--Selecionar | Borrar -->
                    <form method="POST">

                       <input type="hidden" name="txtID" id="txtID" value="<?php echo $producto['ID'];?>"/> <!--hidden = que va a estae escodido es decir no va ser visible -->
                       
                       <input type="submit" name="accion" value="✏️" class="btn btn-primary"/>

                       <input type="submit" name="accion" value="🗑️" class="btn btn-danger"/>

                    </form>

                </td>

            </tr>
            <?php }?>
        </tbody>
    </table>
</div>

<?php include("../template/pie.php"); ?>