<?php
include './dbConnect.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $phoneNumber = $_POST["phoneNumber"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $birthdDate= $_POST["birthDate"];
    $idRol= $_POST["idrol"];
    
    
    $sql = "SELECT store_procedure_crear_usuario
    (:firstName,:lastName, :phoneNumber, :email, :address, :birthDate, :idrol)";

    $query = $connect->prepare($sql);
    $query->bindParam(':firstName',$firstName);
    $query->bindParam(':lastName',$lastName);
    $query->bindParam(':phoneNumber',$phoneNumber);
    $query->bindParam(':email',$email);
    $query->bindParam(':address',$address);
    $query->bindParam(':birthDate',$birthdDate);
    $query->bindParam(':idrol',$idRol);
    
    if($query->execute()){
        echo "<script>alert('El registro se inserto correctamente'); window.location='./GESTION_ADMINISTRATIVA/vista_usuarios.php';</script>";        
    }else{
        echo "<script>alert('Error insertndo registro'); window.location='./GESTION_ADMINISTRATIVA/vista_usuarios.php';</script>";
    }
    
    $connect=null;
    
}


?>