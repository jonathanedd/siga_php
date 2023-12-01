<?php

session_start();
if(isset($_SESSION['usuario'])){
echo 'Pagina de inicio <br/>' ;
echo 'Bienvenido usuario: ' . $_SESSION['usuario'];
}else{
     echo "<script> alert('Su sesion ha caducado'); "
    . "window.location.replace('index.php');</script>";    
}
