<?php
session_start();

if(!isset($_SESSION['id_usuario'])){
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<title>Registro de pacientes</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link rel="stylesheet" href="../css/estilos.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<nav class="navbar">
    <div class="container">
        <h2>Registro de Pacientes</h2>
    </div>
</nav>

<div class="container">

<div class="card" style="max-width:680px;">

<div style="display:flex;align-items:center;gap:14px;margin-bottom:20px;padding-bottom:18px;border-bottom:1px solid var(--borde);">
    <div style="width:50px;height:50px;border-radius:50%;background:#ECFDF5;color:#059669;display:flex;align-items:center;justify-content:center;font-size:1.4rem;">
        <i class="bi bi-person-plus-fill"></i>
    </div>
    <h2 style="margin:0;">Datos del Paciente</h2>
</div>

<form action="guardar_paciente.php" method="POST">

    <label><i class="bi bi-person"></i> Nombre:</label>
    <input type="text" name="nombre" required>

    <label><i class="bi bi-person"></i> Apellido Paterno:</label>
    <input type="text" name="apellido_paterno" required>

    <label><i class="bi bi-person"></i> Apellido Materno:</label>
    <input type="text" name="apellido_materno">

    <label><i class="bi bi-calendar3"></i> Fecha de Nacimiento:</label>
   <input
type="date"
name="fecha_nacimiento"
id="fecha_nacimiento"
class="form-control"
required>

    <label><i class="bi bi-gender-ambiguous"></i> Sexo:</label>
    <select name="sexo">
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
    </select>

    <label><i class="bi bi-telephone"></i> Teléfono:</label>
   <input
type="tel"
name="telefono"
class="form-control"
pattern="[0-9]{10}"
maxlength="10"
placeholder="10 dígitos"
required>

    <label><i class="bi bi-geo-alt"></i> Dirección:</label>
    <textarea name="direccion"></textarea>

    <div class="acciones" style="width:100%;margin:6px 0 0;">
    <button type="submit" class="btn btn-success">
        <i class="bi bi-save2"></i> Guardar Paciente
    </button>

    <a href="dashboard.php" class="btn btn-secondary">
       <i class="bi bi-arrow-left"></i> Regresar
    </a>
    </div>

</form>

</div>

</div>

<script>

const hoy = new Date();

const año = hoy.getFullYear();
const mes = String(hoy.getMonth() + 1).padStart(2,'0');
const dia = String(hoy.getDate()).padStart(2,'0');

const fechaActual = `${año}-${mes}-${dia}`;

document
.getElementById('fecha_nacimiento')
.setAttribute('max', fechaActual);

</script>
<script>

document
.querySelector('[name="telefono"]')
.addEventListener('input', function(){

    this.value = this.value.replace(/[^0-9]/g,'');

});

</script>
</body>
</html>
