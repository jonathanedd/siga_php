<?php
include './dbConnect.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $phoneNumber = $_POST["phoneNumber"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $birthDate = $_POST["birthDate"];
    $idRol = $_POST["idrol"];
    $id=$_POST["id"];
    
    
    
    $sqlUsuario = "UPDATE usuario 
                    SET nombres = :firstName, 
                    apellidos = :lastName, 
                    fechaNacimiento = :birthDate
                    WHERE idusuario = :id";

    $sqlTelefono = "UPDATE telefono
                    SET telefono = :phoneNumber
                    WHERE fktelefonousuario = :id";   
                    
    $sqlCorreo = "UPDATE correo
                    SET correo = :email
                    WHERE fkcorreousuario = :id";
    
    $sqlDireccion = "UPDATE direccion
                    SET direccion = :address
                    WHERE fkdireccionusuario = :id";

    $sqlIdRol = "UPDATE usuariorol
                SET fkrolusuariorol = :idrol
                WHERE fkusuusuariorol = :id";

    

try{
    $connect->beginTransaction();
    $query = $connect->prepare($sqlUsuario);    
    $query->bindParam(':firstName',$firstName,);
    $query->bindParam(':lastName',$lastName);
    $query->bindParam(':birthDate',$birthDate);
    $query->bindParam(':id',$id);
    $query->execute();

    $query = $connect->prepare($sqlTelefono);
    $query->bindParam(':phoneNumber',$phoneNumber);
    $query->bindParam(':id', $id);
    $query->execute();

    $query = $connect->prepare($sqlCorreo);
    $query->bindParam(':email',$email);
    $query->bindParam(':id', $id);
    $query->execute();

    $query = $connect->prepare($sqlDireccion);
    $query->bindParam(':address',$address);
    $query->bindParam(':id', $id);
    $query->execute();

    $query = $connect->prepare($sqlIdRol);
    $query->bindParam(':idrol',$idRol);
    $query->bindParam(':id', $id);
    $query->execute();


    $connect->commit();
    echo "<script>alert('El registro se ha actualizado correctamente'); window.location='./GESTION_ADMINISTRATIVA/vista_usuarios.php';</script>";
}catch(Exception $e){
    $connect->rollBack();
    echo "Error: " . $e->getMessage();
    echo "<script>alert('Error actualizando registro'); window.location='./GESTION_ADMINISTRATIVA/vista_usuarios.php';</script>";
}
$connect=null;   
}
?>


