<?php

session_start();

if(!isset($_SESSION['id_usuario'])){
    header("Location: ../login.php");
    exit();
}

include("../config/conexion.php");

$id_paciente = $_GET['id'];

$paciente = $conn->query(
"SELECT * FROM pacientes
 WHERE id_paciente = $id_paciente"
)->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<title>Consulta Medica</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link rel="stylesheet" href="../css/estilos.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<nav class="navbar">
    <div class="container">
        <h2>Consulta Médica</h2>
    </div>
</nav>

<div class="container">

    <div class="card">

        <div style="display:flex;align-items:center;gap:14px;margin-bottom:20px;padding-bottom:18px;border-bottom:1px solid var(--borde);">
            <div style="width:50px;height:50px;border-radius:50%;background:var(--primario-soft);color:var(--primario-800);display:flex;align-items:center;justify-content:center;font-size:1.4rem;">
                <i class="bi bi-clipboard2-pulse"></i>
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

        <form action="guardar_consulta.php" method="POST">

        <input type="hidden"
               name="id_paciente"
               value="<?php echo $id_paciente; ?>">

        <label><i class="bi bi-chat-left-text"></i> Motivo de Consulta</label>

        <textarea
        name="motivo_consulta"
        rows="5"
        cols="60"
        placeholder="Describa el motivo de la consulta"
        required></textarea>

        <label><i class="bi bi-search-heart"></i> Diagnóstico</label>

        <textarea
        name="diagnostico"
        rows="5"
        cols="60"
        placeholder="Registre el diagnóstico"
        required></textarea>

        <label><i class="bi bi-capsule"></i> Tratamiento</label>

        <textarea
        name="tratamiento"
        rows="5"
        cols="60"
        placeholder="Indique el tratamiento"
        required></textarea>

        <button type="submit" class="btn btn-success" style="margin-top:6px;">
        <i class="bi bi-save2"></i> Guardar Consulta
        </button>

        </form>

    </div>

</div>

</body>
</html>
