<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link href="resources/css/login.css" rel="stylesheet" type="text/css"/>
        <script src="resources/js/validations.js" type="text/javascript"></script>
     </head>
    <body>
        <div class="container">
            <form action="validation.php" method="POST">
                <table border="1">                   
                    <tbody>
                        <tr>
                            <td><label for="email">Correo Electrónico:</label> </td>
                            <td><input type="email" id="email" name="email" required ></td>
                        </tr>
                        <tr>
                            <td><label for="contrasena">Contraseña:</label></td>
                            <td><input type="password" id="contrasena" name="contrasena" required oninput="validarTamano('contrasena',2,15)" ></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;"> <button type="submit">Enviar</button> </td>
                            
                        </tr>
                    </tbody>
                </table>   
            </form>
        </div>
    </body>
</html>