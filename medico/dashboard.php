<?php


session_start();

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");

if(!isset($_SESSION['id_usuario'])){
    header("Location: ../login.php");
    exit();
}

if($_SESSION['rol'] != 'medico'){
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

<title>Panel Medico</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link rel="stylesheet" href="../css/estilos.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<nav class="navbar">
    <div class="container">
        <h2>Panel Médico</h2>
    </div>
</nav>

<div class="container">

    <div class="card" style="display:flex;align-items:center;gap:14px;flex-wrap:wrap;">
        <div style="width:48px;height:48px;border-radius:50%;background:var(--primario-soft);color:var(--primario-800);display:flex;align-items:center;justify-content:center;font-size:1.4rem;">
            <i class="bi bi-person-vcard"></i>
        </div>
        <div>
            <div style="color:var(--texto-muted);font-size:.85rem;">Bienvenido</div>
            <div style="font-family:'Poppins',sans-serif;font-weight:600;font-size:1.1rem;color:var(--oscuro);">
                <?php echo $_SESSION['nombre']; ?>
            </div>
        </div>
    </div>

    <div class="card">

        <form method="GET">

            <div class="row" style="align-items:flex-end;">

                <div class="col-md-10" style="flex:1 1 240px;">

                    <label class="form-label"><i class="bi bi-search"></i> Buscar paciente</label>

                    <input
                    type="text"
                    name="buscar"
                    class="form-control"
                    placeholder="Buscar paciente por nombre, apellido "
                    value="<?php echo isset($_GET['buscar']) ? $_GET['buscar'] : ''; ?>"
                    style="margin-bottom:0;">

                </div>

                <div class="col-md-2" style="flex:0 0 auto;display:flex;flex-direction:column;gap:8px;min-width:160px;">

                    <button
                    type="submit"
                    class="btn btn-primary w-100">

                    <i class="bi bi-search"></i> Buscar

                    </button>

                    <a
                    href="dashboard.php"
                    class="btn btn-secondary w-100">

                    <i class="bi bi-arrow-counterclockwise"></i> Limpiar

                    </a>

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
    <th>Paciente</th>
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

<td>

<a href="expediente.php?id=<?php echo $fila['id_paciente']; ?> " class="btn">
<i class="bi bi-folder2-open"></i> Ver Expediente
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

<a href="registrar_usuario.php"
   class="btn btn-success">

   <i class="bi bi-person-plus-fill"></i> Registrar Usuario

</a>

<a href="../logout.php" class="btn btn-danger">
<i class="bi bi-box-arrow-right"></i> Cerrar Acceso
</a>

</div>

</body>
</html>
