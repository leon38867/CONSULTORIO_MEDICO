<?php

session_start();

if(!isset($_SESSION['id_usuario'])){
    header("Location: ../login.php");
    exit();
}

include("../config/conexion.php");

$id_paciente = $_GET['id'];

$sql = "SELECT * FROM pacientes WHERE id_paciente = $id_paciente";
$resultado = $conn->query($sql);
$paciente = $resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<title>Capturar Signos Vitales</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link rel="stylesheet" href="../css/estilos.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
.signos-grid{ display:grid; grid-template-columns:repeat(auto-fit,minmax(220px,1fr)); gap:0 18px; }
.signos-grid .full{ grid-column:1 / -1; }
</style>
</head>
<body>

<nav class="navbar">
    <div class="container">
        <h2>Captura de Signos Vitales</h2>
    </div>
</nav>

<div class="container">

<div class="card" style="max-width:760px;">

<div style="display:flex;align-items:center;gap:14px;margin-bottom:20px;padding-bottom:18px;border-bottom:1px solid var(--borde);">
    <div style="width:50px;height:50px;border-radius:50%;background:#ECFDF5;color:#059669;display:flex;align-items:center;justify-content:center;font-size:1.4rem;">
        <i class="bi bi-heart-pulse-fill"></i>
    </div>
    <div>
        <div style="color:var(--texto-muted);font-size:.85rem;">Paciente</div>
        <h3 style="margin:0;">
        <?php
        echo $paciente['nombre']." ".
             $paciente['apellido_paterno']." ".
             $paciente['apellido_materno'];
        ?>
        </h3>
    </div>
</div>

<form action="guardar_signos.php" method="POST">

    <input type="hidden"
           name="id_paciente"
           value="<?php echo $id_paciente; ?>">

    <div class="signos-grid">

    <div>
    <label><i class="bi bi-speedometer2"></i> Peso (kg)</label>
    <input type="number" step="0.01" name="peso" required>
    </div>

    <div>
    <label><i class="bi bi-rulers"></i> Talla (m)</label>
    <input type="number" step="0.01" name="talla" required>
    </div>

    <div>
    <label><i class="bi bi-thermometer-half"></i> Temperatura (°C)</label>
    <input type="number" step="0.1" name="temperatura" required>
    </div>

    <div>
    <label><i class="bi bi-activity"></i> Presión Arterial</label>
    <input type="text" name="presion_arterial" placeholder="120/80" required>
    </div>

    <div>
    <label><i class="bi bi-heart"></i> Frecuencia Cardíaca</label>
    <input type="number" name="frecuencia_cardiaca" required>
    </div>

    <div>
    <label><i class="bi bi-lungs"></i> Frecuencia Respiratoria</label>
    <input type="number" name="frecuencia_respiratoria" required>
    </div>

    </div>

    <button type="submit" class="btn btn-success" style="margin-top:6px;">
        <i class="bi bi-save2"></i> Guardar Signos Vitales
    </button>

</form>

</div>

</div>

</body>
</html>
