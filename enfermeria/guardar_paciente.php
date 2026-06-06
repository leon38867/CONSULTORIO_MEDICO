<?php

include("../config/conexion.php");

$nombre = $_POST['nombre'];
$apellido_paterno = $_POST['apellido_paterno'];
$apellido_materno = $_POST['apellido_materno'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];

$hoy = date("Y-m-d");

if($fecha_nacimiento > $hoy){

    die("La fecha de nacimiento no puede ser posterior a la fecha actual.");

}
$sexo = $_POST['sexo'];
$telefono = $_POST['telefono'];

if(!preg_match('/^[0-9]{10}$/', $telefono)){

    die("El teléfono debe contener exactamente 10 dígitos.");

}
$direccion = $_POST['direccion'];

$sql = "INSERT INTO pacientes
(
nombre,
apellido_paterno,
apellido_materno,
fecha_nacimiento,
sexo,
telefono,
direccion
)
VALUES
(
'$nombre',
'$apellido_paterno',
'$apellido_materno',
'$fecha_nacimiento',
'$sexo',
'$telefono',
'$direccion'
)";

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Resultado</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="../css/estilos.css">
<style>
.res-wrap{ min-height:100vh; display:flex; align-items:center; justify-content:center; padding:24px; }
.res-card{ width:100%; max-width:460px; background:#fff; border:1px solid var(--borde);
    border-radius:20px; box-shadow:var(--sombra-lg); padding:42px 34px; text-align:center; animation:fadeUp .5s ease both; }
.res-card .ico{ width:74px; height:74px; margin:0 auto 18px; display:flex; align-items:center; justify-content:center; border-radius:50%; font-size:2.1rem; }
.res-card.ok{ border-top:5px solid var(--exito); }
.res-card.ok .ico{ background:#ECFDF5; color:var(--exito); }
.res-card.err{ border-top:5px solid var(--error); }
.res-card.err .ico{ background:#FEF2F2; color:var(--error); }
.res-card h2{ margin:0 0 22px; }
.res-card .msg{ color:var(--texto-muted); margin-bottom:22px; word-break:break-word; }
</style>
</head>
<body>
<div class="res-wrap">
<?php
if($conn->query($sql)){
?>
    <div class="res-card ok">
        <div class="ico"><i class="bi bi-person-check-fill"></i></div>
        <h2>Paciente registrado correctamente</h2>
        <a href="registrar_paciente.php" class="btn btn-success w-100">
        <i class="bi bi-person-plus"></i> Registrar otro paciente
        </a>
    </div>
<?php
}else{
?>
    <div class="res-card err">
        <div class="ico"><i class="bi bi-exclamation-triangle-fill"></i></div>
        <h2>No se pudo guardar</h2>
        <p class="msg">Error: <?php echo $conn->error; ?></p>
        <a href="registrar_paciente.php" class="btn btn-success w-100">
        <i class="bi bi-arrow-left"></i> Registrar otro paciente
        </a>
    </div>
<?php
}
?>
</div>
</body>
</html>
