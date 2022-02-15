
<?php include("template/cabecera.php"); ?>

<?php 

include("administrador/configuracion/bd.php"); 
 
$i=1;

$sentenciaSQL= $conexion-> prepare("SELECT * FROM productos");
$sentenciaSQL->execute();
$listaProductos=$sentenciaSQL->fetchall(PDO::FETCH_ASSOC);

?>
<?php foreach($listaProductos as $producto){?>
<div class="card-body text-center">
    <div class="contenedor text-center">
    <img  src="./img/<?php echo $producto['imagen']; ?>" width="300" alt="">
    <div class="card-body text-center">
        <h4 class="card-title"><?php echo $producto['nombre']; ?></h4>
        <!--<a name= ""  id="" class="btn btn-primary" href ="https://goalkicker.com/" role ="button"> Ver más</a>-->
        <a href="bibliografia.php" role ="button">
                           [<?php 
                                echo $i++;
                            ?>]
         </a><br><br>
        <a name= ""  id="" class="btn btn-primary" href="producto.php?id=<?php echo $producto['ID']; ?>" role ="button">Ver más</a>
    </div>
   </div><br/>
</div>
<?php }?>


<style>
    .contenedor {
  margin-left: 2%;
  margin-right: 0%;
  padding: 0px;
  border: black 2px solid;
}
</style>
<?php include("template/pie.php"); ?>   