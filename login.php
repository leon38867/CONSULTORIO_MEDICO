<?php

session_start();

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

// Si ya inició sesión, redirigir al panel correspondiente
if(isset($_SESSION['id_usuario'])){

    if($_SESSION['rol'] == 'medico'){
        header("Location: medico/dashboard.php");
    }else if($_SESSION['rol'] == 'enfermera'){
        header("Location: enfermeria/dashboard.php");
    }

    exit();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Consultorio Médico</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link rel="stylesheet" href="css/estilos.css">

<style>
.login-wrap{
    min-height:100vh;
    display:flex; align-items:center; justify-content:center;
    padding:24px;
}
.login-card{
    width:100%; max-width:430px;
    background:#fff;
    border:1px solid var(--borde);
    border-radius:24px;
    box-shadow:0 20px 48px rgba(15,23,42,.12);
    overflow:hidden;
    animation:fadeUp .55s ease both;
}
.login-head{
    background:linear-gradient(120deg,#0F172A,#0369A1);
    color:#fff;
    padding:38px 32px 30px;
    text-align:center;
    position:relative;
}
.login-head::after{
    content:""; position:absolute; left:0; right:0; bottom:0; height:4px;
    background:linear-gradient(90deg,#0EA5E9,#10B981);
}
.login-head .ico{
    width:64px; height:64px; margin:0 auto 14px;
    display:flex; align-items:center; justify-content:center;
    background:rgba(255,255,255,.12);
    border:1px solid rgba(255,255,255,.25);
    border-radius:50%;
    font-size:1.9rem; color:#7dd3fc;
}
.login-head h2{ color:#fff; margin:0; font-size:1.5rem; }
.login-head p{ color:#cbd5e1; margin:.35rem 0 0; font-size:.92rem; }
.login-body{ padding:34px 32px 36px; }
</style>

</head>

<body>

<div class="login-wrap">

    <div class="login-card">

        <div class="login-head">
            <div class="ico"><i class="bi bi-heart-pulse-fill"></i></div>
            <h2>Consultorio Médico</h2>
            <p>Acceso al sistema de gestión</p>
        </div>

        <div class="login-body">

            <form action="validar.php" method="POST">

                <div class="mb-3">

                    <label class="form-label">
                        <i class="bi bi-person"></i> Usuario
                    </label>

                    <input
                        type="text"
                        name="usuario"
                        class="form-control"
                        placeholder="Ingrese su usuario"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        <i class="bi bi-lock"></i> Contraseña
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Ingrese su contraseña"
                        required>

                </div>

               <button
    type="submit"
    class="btn btn-primary w-100">

    <i class="bi bi-box-arrow-in-right"></i> Ingresar

</button>

<a
    href="consultorio_valerio.php"
    class="btn btn-secondary w-100 mt-3">

    <i class="bi bi-arrow-left"></i> Regresar

</a>

            </form>

        </div>

    </div>

</div>

</body>

</html>
