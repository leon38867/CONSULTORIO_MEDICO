<?php

session_start();

if(!isset($_SESSION['id_usuario'])){
    header("Location: ../login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Acceso Correcto</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

*{ box-sizing:border-box; }

body{
    margin:0; padding:24px;
    font-family:'Inter','Segoe UI',sans-serif;
    color:#1e293b;
    background-color:#F8FAFC;
    background-image:
        radial-gradient(1100px 600px at 110% -10%, #E0F2FE 0%, transparent 55%),
        radial-gradient(900px 500px at -10% 110%, #ECFDF5 0%, transparent 50%);
    display:flex; justify-content:center; align-items:center;
    min-height:100vh;
}

.contenedor{
    position:relative;
    text-align:center;
    background:#fff;
    padding:46px 40px;
    border:1px solid #E2E8F0;
    border-radius:24px;
    box-shadow:0 20px 48px rgba(15,23,42,.12);
    width:520px; max-width:100%;
    overflow:hidden;
    animation:fadeUp .55s ease both;
}
.contenedor::before{
    content:""; position:absolute; top:0; left:0; right:0; height:6px;
    background:linear-gradient(90deg,#10B981,#0EA5E9);
}

.badge-ok{
    display:inline-flex; align-items:center; gap:8px;
    background:#ECFDF5; color:#059669;
    padding:7px 18px; border-radius:999px;
    font-weight:600; font-size:.9rem; margin-bottom:14px;
}

h1{
    font-family:'Poppins',sans-serif;
    color:#0F172A; font-size:1.8rem; margin:0 0 6px;
}

.usuario{
    font-size:1.15rem; color:#059669; font-weight:600; margin-bottom:18px;
}

.imagen{
    width:220px; height:220px;
    margin:6px auto 26px;
    display:flex; justify-content:center; align-items:center;
}
.imagen img{
    width:200px; height:200px; object-fit:contain;
    border-radius:50%;
    background:#ECFDF5;
    padding:14px;
    box-shadow:0 10px 26px rgba(16,185,129,.18);
}

.acciones{ display:flex; flex-direction:column; gap:12px; max-width:300px; margin:0 auto; }

.btn, .btn-cerrar{
    display:inline-flex; align-items:center; justify-content:center; gap:8px;
    color:#fff; padding:13px 30px;
    text-decoration:none; border-radius:999px;
    font-size:1rem; font-weight:600;
    transition:.22s cubic-bezier(.4,0,.2,1);
}
.btn{ background:#10B981; box-shadow:0 8px 20px rgba(16,185,129,.28); }
.btn:hover{ background:#059669; transform:translateY(-2px); }
.btn-cerrar{ background:#EF4444; box-shadow:0 8px 20px rgba(239,68,68,.24); }
.btn-cerrar:hover{ background:#DC2626; transform:translateY(-2px); }

@keyframes fadeUp{ from{opacity:0; transform:translateY(16px);} to{opacity:1; transform:translateY(0);} }

@media(max-width:480px){
    .contenedor{ padding:34px 22px; }
    .imagen{ width:170px; height:170px; }
    .imagen img{ width:150px; height:150px; }
}

</style>

</head>

<body>

<div class="contenedor">

<div class="badge-ok"><i class="bi bi-check-circle-fill"></i> Acceso Correcto</div>

<h1>¡Bienvenido(a)!</h1>

<div class="usuario">

<i class="bi bi-person-badge"></i> Enfermera(o) <?php echo $_SESSION['nombre']; ?>

</div>

<div class="imagen" >

<img src="../img/enfemero.png"
     width="250"
     height="250"
     alt="Logo">

</div>

<div class="acciones">

<a href="dashboard.php" class="btn">

<i class="bi bi-grid-1x2-fill"></i> Abrir Sistema

</a>

<a href="../logout.php" class="btn-cerrar">

<i class="bi bi-box-arrow-right"></i> Cerrar

</a>

</div>

</div>

</body>

</html>
