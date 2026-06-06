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

if($_SESSION['rol'] != 'enfermera'){
    header("Location: ../login.php");
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">
<title>Panel de Enfermería</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link rel="stylesheet" href="../css/estilos.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
.menu-grid{ display:grid; grid-template-columns:repeat(auto-fit,minmax(220px,1fr)); gap:16px; margin-top:6px; }
.menu-tile{
    display:flex; flex-direction:column; gap:10px;
    text-decoration:none; color:var(--texto);
    background:#fff; border:1px solid var(--borde);
    border-radius:var(--radio); padding:22px;
    box-shadow:var(--sombra-sm);
    transition:transform var(--trans), box-shadow var(--trans), border-color var(--trans);
}
.menu-tile:hover{ transform:translateY(-4px); box-shadow:var(--sombra-md); border-color:#CBD5E1; }
.menu-tile .mico{ width:50px; height:50px; border-radius:14px; display:flex; align-items:center; justify-content:center; font-size:1.5rem; color:#fff; }
.menu-tile h4{ font-family:'Poppins',sans-serif; margin:0; font-size:1.1rem; color:var(--oscuro); }
.menu-tile p{ margin:0; color:var(--texto-muted); font-size:.88rem; }
.mico.azul{ background:linear-gradient(135deg,#0EA5E9,#0284C7); }
.mico.verde{ background:linear-gradient(135deg,#10B981,#059669); }
</style>

</head>

<body>
<nav class="navbar">

<div class="container">

<h2>
Panel de Enfermería
</h2>

</div>

</nav>

<div class="container">

<div class="card" style="display:flex;align-items:center;gap:14px;flex-wrap:wrap;">
    <div style="width:48px;height:48px;border-radius:50%;background:#ECFDF5;color:#059669;display:flex;align-items:center;justify-content:center;font-size:1.4rem;">
        <i class="bi bi-clipboard2-heart"></i>
    </div>
    <div>
        <div style="color:var(--texto-muted);font-size:.85rem;">Bienvenido(a)</div>
        <h3 style="margin:0;">
        <?php echo $_SESSION['nombre']; ?>
        </h3>
    </div>
</div>

<div class="card">

<h3 style="margin-bottom:6px;"><i class="bi bi-grid-1x2-fill" style="color:var(--primario);"></i> Accesos</h3>

<div class="menu-grid">

<a href="registrar_paciente.php" class="menu-tile">
    <div class="mico verde"><i class="bi bi-person-plus-fill"></i></div>
    <h4>Registrar Paciente</h4>
    <p>Alta de nuevos pacientes</p>
</a>

<a href="lista_pacientes.php" class="menu-tile">
    <div class="mico azul"><i class="bi bi-people-fill"></i></div>
    <h4>Ver Pacientes</h4>
    <p>Listado y captura de signos</p>
</a>

</div>

</div>

</div>

<div class="acciones">

<center><a href="../logout.php" class="btn btn-danger">
<i class="bi bi-box-arrow-right"></i> Cerrar Sesión
</a></center>

</div>

</body>

</html>
