<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitio Web</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
</head>
<body>
<?php $url="http://".$_SERVER ['HTTP_HOST']."/sitioweb"?>   



<div id="page">
    <div id="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                <a class="nav-link" href="#"> <FONT FACE="Times" SIZE=4 COLOR="White">Carlos</FONT></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php"> <FONT FACE="Times" SIZE=4 COLOR="White">Inicio</FONT></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="productos.php"> <FONT FACE="Times" SIZE=4 COLOR="White">Productos</FONT></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="bibliografia.php"> <FONT FACE="Times" SIZE=4 COLOR="White">Bibliografia</FONT></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $url; ?>../administrador/index.php"> <FONT FACE="Times" SIZE=4 COLOR="White">Loguin</FONT></a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<!--cabecera fija-->
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

</style>


    <div class="container">

    <br/>

        <div class="row">