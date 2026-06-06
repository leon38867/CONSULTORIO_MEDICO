<?php

session_start();
include("config/conexion.php");

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios
        WHERE usuario='$usuario'
        AND password='$password'";

$resultado = $conn->query($sql);

if($resultado->num_rows > 0){

    $datos = $resultado->fetch_assoc();

    $_SESSION['id_usuario'] = $datos['id_usuario'];
    $_SESSION['nombre'] = $datos['nombre'];
    $_SESSION['rol'] = $datos['rol'];

 if($datos['rol']=="enfermera"){

    header("Location: enfermeria/bienvenida.php");

}else{

    header("Location: medico/bienvenida.php");

}

exit();

}else{

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Acceso denegado</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="css/estilos.css">
<style>
.err-wrap{ min-height:100vh; display:flex; align-items:center; justify-content:center; padding:24px; }
.err-card{
    width:100%; max-width:430px; background:#fff;
    border:1px solid var(--borde); border-top:5px solid var(--error);
    border-radius:20px; box-shadow:var(--sombra-lg);
    padding:40px 34px; text-align:center; animation:fadeUp .5s ease both;
}
.err-card .ico{
    width:70px; height:70px; margin:0 auto 18px;
    display:flex; align-items:center; justify-content:center;
    background:#FEF2F2; color:var(--error);
    border-radius:50%; font-size:2rem;
}
.err-card h2{ color:var(--oscuro); margin-bottom:8px; }
.err-card p{ color:var(--texto-muted); margin-bottom:26px; }
</style>
</head>
<body>
<div class="err-wrap">
    <div class="err-card">
        <div class="ico"><i class="bi bi-shield-exclamation"></i></div>
        <h2>Acceso denegado</h2>
        <p>Usuario o contraseña incorrectos</p>
        <a href="login.php" class="btn btn-primary w-100">
            <i class="bi bi-arrow-left"></i> Volver a intentar
        </a>
    </div>
</div>
</body>
</html>
<?php

}
?>
