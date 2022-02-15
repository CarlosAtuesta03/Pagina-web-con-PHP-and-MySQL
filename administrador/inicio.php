
<?php include("template/cabecera.php"); ?>

                <div class="col-md-12">
                    <div class="card-body text-center">
                        <?php if($nombreUsuario == "vale") {?>
                            <h1 class="display-3"><FONT FACE="Times" COLOR="black">Bienvenida <?php echo $nombreUsuario; ?></FONT></h1><br/>
                        <?php }?>

                        <?php if($nombreUsuario == "carlos") {?>
                            <h1 class="display-3"><FONT FACE="Times" COLOR="black">Bienvenido <?php echo $nombreUsuario; ?></FONT></h1><br/>
                        <?php }?>
                       <!-- <h1 class="display-3">Bienvenido <?php //echo $nombreUsuario; ?></h1>-->
                        <p class="lead"></p>
                        <hr class="my-2">
                        <p></p><br/>
                        <p class="lead">
                            <a class="btn btn-primary btn-lg" href="seccion/productos.php" role="button">Productos</a>
                        </p>
                    </div>
                </div>
                
<?php include("template/pie.php"); ?>
 