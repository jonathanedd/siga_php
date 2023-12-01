
<?php
include './dbConnect.php';


$email = $_POST['email'];
$pass = $_POST['contrasena'];

$sql = "SELECT u.* 
        FROM usuario u
        JOIN correo c ON u.idusuario = c.fkcorreoUsuario
        JOIN contrasena cn ON u.idusuario = cn.fkusuarioContrasena
        WHERE c.correo = :user AND cn.contrasena = :pass";

$query = $connect->prepare($sql);
$query->bindParam(':user', $email, PDO::PARAM_STR);
$query->bindParam(':pass', $pass, PDO::PARAM_STR);
$query->execute();

if ($query->rowCount() > 0) {
    session_start();
    $_SESSION['usuario'] = $email;
    echo "<script>window.location.replace('./GESTION_ADMINISTRATIVA/vista_usuarios.php');</script>"; 
} else {
    echo "<script> alert('Correo y/o contraseña incorrectos'); "
        . "window.location.replace('index.php');</script>";    
}


/*
include './dbConnect.php';

$email = $_POST['email'];
$pass = $_POST['contrasena'];

$sql = "SELECT * FROM user WHERE username = :user AND password = :pass";
$query = $connect->prepare($sql);
$query->bindParam(':user',$email,PDO::PARAM_STR);
$query->bindParam(':pass',$pass,PDO::PARAM_STR);
$query->execute();

if($query->rowCount() > 0 ){
    session_start();
    $_SESSION['usuario'] = $email;
    echo "<script>window.location.replace('pagina1.php');</script>"; 
}else{
      echo "<script> alert('Correo y/o contraseña incorrectos'); "
    . "window.location.replace('index.php');</script>";    
}
*/




/*

if (strcasecmp($_POST['email'],"pruebas@gmail.com")==0 && strcmp($_POST['contrasena'],"admin")==0){
    session_start();
    $_SESSION['usuario'] = $_POST['email'];
    echo "<script>window.location.replace('pagina1.php');</script>";
}else{   
    echo "<script> alert('Nombre de usuario y/o contraseña incorrectos'); "
    . "window.location.replace('index.php');</script>";
}
*/