<html>
    <head>
        <title>Lista de Usuarios</title>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"></link>
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css"></link>
        <link rel="stylesheet" href="../resources/css/index.css"></link>
    </head>
    <body>
        <div id="container">
        <?php include '../nav.php'; ?>
        <h1>Lista de Usuarios</h1>

        <main>
            <a href='../crearusuario.php'>Crear Usuario</a>

        
       
        
    <?php
    include '../session.php';
include '../dbConnect.php';
$sql = "SELECT 
u.idusuario,
u.nombres, 
u.apellidos, 
r.descripcionrol, 
t.telefono, 
c.correo, 
d.direccion, 
u.fechanacimiento
FROM usuario AS u
INNER JOIN usuariorol AS ur ON u.idusuario = ur.fkusuusuariorol
INNER JOIN rol AS r ON r.idrol = ur.fkrolusuariorol
INNER JOIN telefono AS t ON u.idUsuario = t.fktelefonousuario
INNER JOIN correo AS c ON u.idusuario = c.fkcorreousuario
INNER JOIN direccion AS d ON u.idusuario = d.fkdireccionusuario";

$query = $connect->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
// var_dump($result);

if($query->rowCount() > 0){
    echo '<table id="t-all" class="display nowrap" style="width: 100%" border="1"> <thead>';
    echo '<th>ID Usuario</th>';
    echo '<th>ROL</th>';
    echo '<th>NOMBRES</th>';
    echo '<th>APELLIDOS</th>';
    echo '<th>TELEFONO</th>';
    echo '<th>CORREO</th>';
    echo '<th>DIRECCIÓN</th>';
    echo '<th>FECHA NACIMIENTO</th> ';
    echo '<th>OPCIONES</th>';
    echo '</thead><tbody>';
    foreach ($results as $result) {
        # code...
        echo '<tr>
        <td>' . $result->idusuario . '</td>
        <td>' . $result->descripcionrol . '</td>
        <td>' . $result->nombres . '</td>
        <td>' . $result->apellidos . '</td>
        <td>' . $result->telefono . '</td>
        <td>' . $result->correo . '</td>
        <td>' . $result->direccion . '</td>
        <td>' . $result->fechanacimiento . '</td> '
        . '<td><form action="../updateusuario.php" method="POST">  
            <input type="hidden" name="id" id=id value="' . $result->idusuario . '">
            <button type="submit">Actualizar</button>
            
        </form>
        <form action="../deleteusuario.php" method="POST">  
        <input type="hidden" name="id" id=id value="' . $result->idusuario . '">
        <button type="submit">Eliminar</button>
    </form>

        </td>
        </tr>';
        
    }echo '</tbody></table>';
        
        
    
}
    


    ?>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script> 
        <script>
            $(document).ready(function () {
                $('#t-all').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ],
                    responsive: true, 
                    "paging": true, 
                    "pageLength": 5,  
                    "lengthMenu": [10, 25, 50, 75, 100],
                    "search": {
                        "smart": true
                    },
        

                });
            });
        </script>
        </main>
        </div>
    </body>
</html>



