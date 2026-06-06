<?php

session_start();

if(!isset($_SESSION['id_usuario'])){
    header("Location: ../login.php");
    exit();
}

if($_SESSION['rol'] != 'medico'){
    header("Location: ../login.php");
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Registrar Usuario</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="../css/estilos.css">

</head>

<body>

<nav class="navbar">
    <div class="container">
        <h2>Registrar Usuario</h2>
    </div>
</nav>

<div class="container">

<div class="card" style="max-width:620px;">

<div style="display:flex;align-items:center;gap:14px;margin-bottom:20px;padding-bottom:18px;border-bottom:1px solid var(--borde);">
    <div style="width:50px;height:50px;border-radius:50%;background:var(--primario-soft);color:var(--primario-800);display:flex;align-items:center;justify-content:center;font-size:1.4rem;">
        <i class="bi bi-person-plus-fill"></i>
    </div>
    <h2 style="margin:0;">Nuevo Usuario</h2>
</div>

<form action="guardar_usuario.php" method="POST">

<label><i class="bi bi-person"></i> Nombre Completo</label>

<input
type="text"
name="nombre"
class="form-control"
placeholder="Nombre completo"
required>

<label><i class="bi bi-at"></i> Usuario</label>

<input
type="text"
name="usuario"
class="form-control"
placeholder="Nombre de usuario"
required>

<label><i class="bi bi-lock"></i> Contraseña</label>

<input
type="password"
name="password"
class="form-control"
placeholder="Contraseña"
required>

<label><i class="bi bi-person-badge"></i> Rol</label>

<select
name="rol"
class="form-control"
required>

<option value="medico">
Médico
</option>

<option value="enfermera">
Enfermera
</option>

</select>

<div class="acciones" style="width:100%;margin:6px 0 0;">

<button
type="submit"
class="btn btn-primary">

<i class="bi bi-save2"></i> Guardar Usuario

</button>

<a
href="dashboard.php"
class="btn btn-secondary">

<i class="bi bi-arrow-left"></i> Regresar

</a>

</div>

</form>

</div>

</div>

</body>

</html>
