<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="resources/js/validaciones.js" type="text/javascript"></script>
    </head>
    <body>
        <?php 
        include './session.php';
        include './dbConnect.php'; ?>
        <h2>Crear Usuario</h2>
        <form method="post" action="logicacrearusuario.php" >
            <table>
                <tr>
                    <td><label for="firstName">Nombres:</label></td>
                    <td><input type="text" id="firstName" name="firstName"></td>
                </tr>
                <tr>
                    <td><label for="lastName">Apellidos:</label></td>
                    <td><input type="text" id="lastName" name="lastName" required></td>
                </tr>
                <tr>
                    <td><label for="phoneNumber">Telefono:</label></td>
                    <td><input type="text" id="phoneNumber" name="phoneNumber"></td>
                </tr>
                <tr>
                    <td><label for="email">Correo:</label></td>
                    <td><input type="email" id="email" name="email" required oninput="validarEmail('email')" > </td>
                </tr>
                <tr>
                    <td><label for="address">Dirección:</label></td>
                    <td><input type="text" id="address" name="address" required></td>
                </tr>
                <tr>
                    <td><label for="birthDate">Fecha Nacimiento:</label></td>
                    <td><input type="date" id="birthDate" name="birthDate" required></td>
                </tr>
                <tr>
                    <td><label for="idrol">Rol:</label></td>
                    <td>
                        <select id="idrol" name="idrol">
                           <?php 
                           $sql = "SELECT idrol, descripcionrol FROM rol";
                           $query = $connect->prepare($sql);
                           $query->execute();
                           $resultsRol = $query->fetchAll(PDO::FETCH_OBJ);
                           if($query->rowCount()>0){
                               foreach ($resultsRol as $idRol) {
                           ?> <option value="<?php echo $idRol->idrol; ?>"> <?php echo $idRol->descripcionrol; ?></option>                           
                           <?php } }?>
                        </select> 
                    </td>
                </tr>
                <tr>
                    
            </table>
            <button type="submit" > Crear empleado </button>
        </form>        
    </body>
</html>

