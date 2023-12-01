<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="resources/js/validations.js" type="text/javascript"></script>
    </head>
    <body>
        <?php 
        include './session.php';
        include './dbConnect.php'; 
        $id = $_POST['id'];
        $sql= "SELECT * FROM view_users WHERE idusuario = :id"; 
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
        $stmt->execute();
        $obj = $stmt->fetchObject();
        ?>
        <h2>Actualizar Usuario</h2>
        <form method="post" action="logicaupdateusuario.php" >
            <table>
            <tr>
                    <td><label for="firstName">Nombres:</label></td>
                    <td><input type="text" id="firstName" name="firstName" value="<?php echo $obj->nombres;?>"></td>
                </tr>
                <tr>
                    <td><label for="lastName">Apellidos:</label></td>
                    <td><input type="text" id="lastName" name="lastName" required value="<?php echo $obj->apellidos;?>"></td>
                </tr>
                <tr>
                    <td><label for="phoneNumber">Telefono:</label></td>
                    <td><input type="text" id="phoneNumber" name="phoneNumber" value="<?php echo $obj->telefono;?>"></td>
                </tr>
                <tr>
                    <td><label for="email">Correo:</label></td>
                    <td><input type="email" id="email" name="email" required value="<?php echo isset($obj->correo) ? $obj->correo : ''; ?>"  oninput="validarEmail('email')" ></td>
                </tr>
                <tr>
                    <td><label for="address">Dirección:</label></td>
                    <td><input type="text" id="address" name="address" required value="<?php echo $obj->direccion;?>"></td>
                </tr>
                <tr>
                    <td><label for="birthDate">Fecha Nacimiento:</label></td>
                    <td><input type="date" id="birthDate" name="birthDate" required value="<?php echo $obj->fechanacimiento;?>"></td>
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
                           ?> <option value="<?php echo $idRol->idrol; ?>" <?php if($idRol->descripcionrol==$obj->descripcionrol ){echo 'selected';} ?> ><?php echo $idRol->descripcionrol; ?>   </option>                        
                           <?php } }?>
                        </select>
                    </td>
                </tr>
                
            </table>
            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" /> 
            <button type="submit" > Actualizar Usuario </button>
        </form>        
    </body>
</html>