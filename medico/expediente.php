<?php

session_start();

include("../config/conexion.php");

$id = $_GET['id'];

$paciente = $conn->query(
"SELECT * FROM pacientes
 WHERE id_paciente = $id"
)->fetch_assoc();

$signos = $conn->query(
"SELECT *
 FROM signos_vitales
 WHERE id_paciente = $id
 ORDER BY fecha DESC
 LIMIT 1"
)->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<title>Expedientes</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link rel="stylesheet" href="../css/estilos.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
.exp-grid{ display:grid; grid-template-columns:repeat(auto-fit,minmax(150px,1fr)); gap:14px; }
.exp-item{
    background:#F8FAFC; border:1px solid var(--borde);
    border-radius:var(--radio-sm); padding:14px 16px;
}
.exp-item .lbl{ font-size:.78rem; text-transform:uppercase; letter-spacing:.03em; color:var(--texto-muted); font-weight:600; display:flex; align-items:center; gap:6px; }
.exp-item .val{ font-family:'Poppins',sans-serif; font-size:1.15rem; font-weight:600; color:var(--oscuro); margin-top:4px; }
.exp-item.azul{ border-left:4px solid var(--primario); }
.exp-item.verde{ border-left:4px solid var(--exito); }
.exp-item.ambar{ border-left:4px solid var(--alerta); }
.consulta-item{
    background:#fff; border:1px solid var(--borde);
    border-left:4px solid var(--primario); border-radius:var(--radio-sm);
    padding:18px 20px; margin-bottom:14px;
}
.consulta-item .fecha{
    display:inline-flex; align-items:center; gap:6px;
    background:var(--primario-soft); color:var(--primario-800);
    padding:4px 12px; border-radius:999px; font-size:.82rem; font-weight:600; margin-bottom:10px;
}
.consulta-item p{ margin:6px 0; }
.consulta-item b{ color:var(--oscuro-700); }
</style>
</head>
<body>

<nav class="navbar">
    <div class="container">
        <h2>Expediente Clínico</h2>
    </div>
</nav>

<div class="container">

    <div class="card">
        <div style="display:flex;align-items:center;gap:16px;flex-wrap:wrap;">
            <div style="width:58px;height:58px;border-radius:50%;background:var(--primario-soft);color:var(--primario-800);display:flex;align-items:center;justify-content:center;font-size:1.6rem;">
                <i class="bi bi-person-vcard-fill"></i>
            </div>
            <div>
                <div style="color:var(--texto-muted);font-size:.85rem;">Paciente</div>
                <h2 style="margin:0;">
                <?php
                echo $paciente['nombre']." ".
                     $paciente['apellido_paterno']." ".
                     $paciente['apellido_materno'];
                ?>
                </h2>
            </div>
        </div>
    </div>

    <div class="card">
        <h3 style="margin-bottom:16px;"><i class="bi bi-info-circle" style="color:var(--primario);"></i> Datos Generales</h3>
        <div class="exp-grid">
            <div class="exp-item azul">
                <div class="lbl"><i class="bi bi-gender-ambiguous"></i> Sexo</div>
                <div class="val"><?php echo $paciente['sexo']; ?></div>
            </div>
            <div class="exp-item azul">
                <div class="lbl"><i class="bi bi-telephone"></i> Teléfono</div>
                <div class="val"><?php echo $paciente['telefono']; ?></div>
            </div>
        </div>
    </div>

    <div class="card">
        <h3 style="margin-bottom:16px;"><i class="bi bi-heart-pulse" style="color:var(--exito);"></i> Últimos Signos Vitales</h3>
        <div class="exp-grid">
            <div class="exp-item verde">
                <div class="lbl"><i class="bi bi-speedometer2"></i> Peso</div>
                <div class="val"><?php echo $signos['peso']; ?> kg</div>
            </div>
            <div class="exp-item verde">
                <div class="lbl"><i class="bi bi-rulers"></i> Talla</div>
                <div class="val"><?php echo $signos['talla']; ?> m</div>
            </div>
            <div class="exp-item verde">
                <div class="lbl"><i class="bi bi-calculator"></i> IMC</div>
                <div class="val"><?php echo $signos['imc']; ?></div>
            </div>
            <div class="exp-item ambar">
                <div class="lbl"><i class="bi bi-thermometer-half"></i> Temperatura</div>
                <div class="val"><?php echo $signos['temperatura']; ?> °C</div>
            </div>
            <div class="exp-item azul">
                <div class="lbl"><i class="bi bi-activity"></i> Presión Arterial</div>
                <div class="val"><?php echo $signos['presion_arterial']; ?></div>
            </div>
            <div class="exp-item azul">
                <div class="lbl"><i class="bi bi-heart"></i> Frec. Cardíaca</div>
                <div class="val"><?php echo $signos['frecuencia_cardiaca']; ?></div>
            </div>
            <div class="exp-item azul">
                <div class="lbl"><i class="bi bi-lungs"></i> Frec. Respiratoria</div>
                <div class="val"><?php echo $signos['frecuencia_respiratoria']; ?></div>
            </div>
        </div>

        <div style="margin-top:20px;">
        <a href="consulta.php?id=<?php echo $id; ?>" class="btn">
        <i class="bi bi-clipboard2-plus"></i> Registrar Consulta
        </a>
        </div>
    </div>

    <div class="card">
        <h3 style="margin-bottom:16px;"><i class="bi bi-journal-medical" style="color:var(--primario);"></i> Historial de Consultas</h3>

<?php

$consultas = $conn->query(
"SELECT *
 FROM consultas
 WHERE id_paciente = $id
 ORDER BY fecha_consulta DESC"
);

while($consulta = $consultas->fetch_assoc()){

?>

<div class="consulta-item">

<span class="fecha"><i class="bi bi-calendar3"></i> <?php echo $consulta['fecha_consulta']; ?></span>

<p>
<b>Motivo:</b>
<?php echo $consulta['motivo_consulta']; ?>
</p>

<p>
<b>Diagnóstico:</b>
<?php echo $consulta['diagnostico']; ?>
</p>

<p>
<b>Tratamiento:</b>
<?php echo $consulta['tratamiento']; ?>
</p>

</div>

<?php
}
?>

    </div>

</div>

</body>
</html>
