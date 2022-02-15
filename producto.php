
<?php include("template/cabecera.php"); ?>


<?php

include("administrador/configuracion/bd.php"); 

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";  //validar: condicion ternaria lo que si se cumple lo que no se cumple

$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";  //validar: condicion ternaria lo que si se cumple lo que no se cumple

$txtPrecio=(isset($_POST['txtPrecio']))?$_POST['txtPrecio']:"";  //validar: condicion ternaria lo que si se cumple lo que no se cumple

$txtDescripcion=(isset($_POST['txtDescripcion']))?$_POST['txtDescripcion']:"";  //validar: condicion ternaria lo que si se cumple lo que no se cumple

$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";  //validar: condicion ternaria lo que si se cumple lo que no se cumple


$ID = $_GET['id'];


$sentenciaSQL= $conexion-> prepare("SELECT * FROM productos WHERE ID=:ID");
        $sentenciaSQL->bindParam(':ID',$ID);
        $sentenciaSQL->execute();
        $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $txtNombre=$producto['nombre'];
        $txtPrecio=$producto['precio'];
        $txtDescripcion=$producto['descripcion'];
        $txtImagen=$producto['imagen'];

/*echo  $ID;
echo $txtNombre;
echo $txtDescripcion;
echo $txtImagen;
*/

?>


<body>
    <main>
        <h1 class="card-body text-center"><FONT FACE="Times" SIZE=12 COLOR="black">PRODUCTO (<?php echo $txtNombre;?>)</FONT></h1><br/><br/>
        <table>
            <tr>
                <td>
                    <img  src="./img/<?php echo $txtImagen; ?>" width="500" alt=""></div>
                </td>
                <td>
                            <table class="table table-bordered">
                                 <thead>
                                     <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Descripción</th>
                                    </tr>
                                 </thead>
                                     <tbody>
                                       <tr>
                                          <td><?php echo $ID;?></td>
                                          <td><?php echo $txtNombre;?></td>
                                          <td><?php echo $txtPrecio;?></td>
                                          <td><?php echo $txtDescripcion;?></td>
                                      </tr>
                                     </tbody>
                            </table>
                </td>
            </tr>
        </table><br/>
        <div class="card-body text-center">
        <a name= ""  id="" class="btn btn-primary text-center" href="productos.php" role ="button"> Regresar </a>
        </div>
    </main>
</body>







<!--no lo utilizo-->
<div class="div_centrado2"> 
    
</div>

<style>
   html,body{ margin: 0;}
    .div_contenedor{
        background: crimson;
        height: 1vh;       
    }
    .div_centrado2{
        /*background: yellow;*/
        width: 1000px;       
        height: 200px;
        position: absolute;
        top:85%;
        left: 50%;           
        margin-top: -100px;
        margin-left: -100px;
    }
</style>


    <style>
        img.resize 
        {
            ancho máximo: 100%; 
            altura máxima: 100%; 
        }
    </style>


<?php include("template/pie.php"); ?>   