<?php
session_start();

if(!isset($_SESSION['id_usuario'])){
    header("Location: ../login.php");
    exit();
}

include("../config/conexion.php");

$buscar = "";

if(isset($_GET['buscar'])){
    $buscar = trim($_GET['buscar']);
}

if($buscar != ""){

    $sql = "SELECT *
            FROM pacientes
            WHERE nombre LIKE '%$buscar%'
            OR apellido_paterno LIKE '%$buscar%'
            OR apellido_materno LIKE '%$buscar%'
            OR telefono LIKE '%$buscar%'
            ORDER BY fecha_registro DESC";

}else{

    $sql = "SELECT *
            FROM pacientes
            ORDER BY fecha_registro DESC";

}

$resultado = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<title>Lista de Pacientes</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/estilos.css">

</head>
<body>

<nav class="navbar">
    <div class="container">
        <h2>Pacientes Registrados</h2>
    </div>
</nav>

<div class="container">

    <div class="card">

        <form method="GET">

            <div class="row" style="align-items:flex-end;">

                <div class="col-md-10" style="flex:1 1 240px;">

                    <label class="form-label"><i class="bi bi-search"></i> Buscar paciente</label>

                    <input
                    type="text"
                    name="buscar"
                    class="form-control"
                    placeholder="Buscar por nombre, apellido o teléfono"
                    value="<?php echo isset($_GET['buscar']) ? $_GET['buscar'] : ''; ?>"
                    style="margin-bottom:0;">

                </div>

                <div class="col-md-2" style="flex:0 0 auto;min-width:160px;">

                    <button
                    type="submit"
                    class="btn btn-primary w-100">

                    <i class="bi bi-search"></i> Buscar

                    </button>

                </div>

            </div>

        </form>

    </div>

    <div class="card">

        <h3 style="margin-bottom:16px;"><i class="bi bi-people-fill" style="color:var(--primario);"></i> Pacientes</h3>

        <div class="table-responsive">

        <table class="table table-striped table-hover">
<thead>
<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Teléfono</th>
    <th>Fecha Registro</th>
    <th>Acción</th>
</tr>
</thead>
<tbody>

<?php while($fila = $resultado->fetch_assoc()){ ?>

<tr>

<td><?php echo $fila['id_paciente']; ?></td>

<td>
<?php
echo $fila['nombre']." ".
     $fila['apellido_paterno']." ".
     $fila['apellido_materno'];
?>
</td>

<td><?php echo $fila['telefono']; ?></td>

<td><?php echo $fila['fecha_registro']; ?></td>

<td>

<a href="capturar_signos.php?id=<?php echo $fila['id_paciente']; ?>" class="btn">
<i class="bi bi-heart-pulse"></i> Capturar signos vitales
</a>

</td>

</tr>

<?php } ?>

</tbody>
   </table>

        </div>

    </div>

</div>

<div class="acciones">

<a href="dashboard.php"
   class="btn btn-success">

   <i class="bi bi-arrow-left"></i> Regresar

</a>

</div>

</body>
</html>
