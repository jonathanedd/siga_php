<?php
include './dbConnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $deleteQueries = [
        "DELETE FROM usuario WHERE idusuario = :id",
        "DELETE FROM telefono WHERE fktelefonousuario = :id",
        "DELETE FROM correo WHERE fkcorreousuario = :id",
        "DELETE FROM direccion WHERE fkdireccionusuario = :id",
        "DELETE FROM usuariorol WHERE fkusuusuariorol = :id"
        
    ];

    try {
        $connect->beginTransaction();

        

        foreach ($deleteQueries as $query) {
            $stmt = $connect->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }

        

        $connect->commit();
        echo "<script>alert('El registro se ha eliminado correctamente'); window.location='./GESTION_ADMINISTRATIVA/vista_usuarios.php';</script>";
    } catch (Exception $e) {
        $connect->rollBack();
        echo "Error: " . $e->getMessage();
        echo "<script>alert('Error eliminando registro'); window.location='./GESTION_ADMINISTRATIVA/vista_usuarios.php';</script>";
    }

    $connect = null;
}
?>