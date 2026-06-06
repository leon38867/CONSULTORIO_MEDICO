<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Consultorio Valerio</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Inter','Segoe UI',sans-serif;
    color:#1e293b;
    background-color:#F8FAFC;
    background-image:
        radial-gradient(1100px 600px at 110% -10%, #E0F2FE 0%, transparent 55%),
        radial-gradient(900px 500px at -10% 110%, #ECFDF5 0%, transparent 50%);
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:24px;
}

.contenedor{
    position:relative;
    background:#ffffff;
    width:100%;
    max-width:560px;
    padding:54px 48px;
    border:1px solid #E2E8F0;
    border-radius:24px;
    text-align:center;
    box-shadow:0 20px 48px rgba(15,23,42,.12);
    overflow:hidden;
    animation:fadeUp .6s ease both;
}

.contenedor::before{
    content:"";
    position:absolute; top:0; left:0; right:0; height:6px;
    background:linear-gradient(90deg,#0EA5E9,#10B981);
}

.logo-real{
    width:150px;
    height:150px;
    object-fit:contain;
    margin:8px auto 24px;
    display:block;
    filter:drop-shadow(0 8px 18px rgba(14,165,233,.18));
}

.titulo{
    font-family:'Poppins',sans-serif;
    font-size:clamp(1.9rem,1.4rem+2.4vw,2.7rem);
    font-weight:800;
    color:#0F172A;
    letter-spacing:-.5px;
    line-height:1.1;
    margin-bottom:12px;
}

.subtitulo{
    color:#64748B;
    font-size:1.05rem;
    margin-bottom:36px;
}

.subtitulo i{ color:#0EA5E9; margin-right:6px; }

.boton{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:10px;
    text-decoration:none;
    background:#0EA5E9;
    color:#fff;
    padding:15px 56px;
    border-radius:999px;
    font-size:1.1rem;
    font-weight:600;
    box-shadow:0 8px 22px rgba(14,165,233,.32);
    transition:.25s cubic-bezier(.4,0,.2,1);
}

.boton:hover{
    background:#0284C7;
    transform:translateY(-3px);
    box-shadow:0 12px 28px rgba(14,165,233,.4);
}

.boton:active{ transform:translateY(0); }

.footer{
    margin-top:34px;
    color:#94A3B8;
    font-size:.85rem;
    display:flex; align-items:center; justify-content:center; gap:6px;
}

@keyframes fadeUp{
    from{ opacity:0; transform:translateY(16px); }
    to{ opacity:1; transform:translateY(0); }
}

@media(max-width:480px){
    .contenedor{ padding:40px 26px; border-radius:20px; }
    .logo-real{ width:120px; height:120px; }
    .boton{ width:100%; padding:15px 24px; }
}

</style>

</head>

<body>

<div class="contenedor">

<img src="img/logo.png"
     alt="Consultorio Valerio"
     class="logo-real">

    <h1 class="titulo">
        CONSULTORIO VALERIO
    </h1>

    <p class="subtitulo">
        <i class="bi bi-heart-pulse-fill"></i>Sistema de Gestión y Atención Médica
    </p>

    <a href="login.php" class="boton">
        <i class="bi bi-box-arrow-in-right"></i> Abrir
    </a>

    <div class="footer">
        <i class="bi bi-c-circle"></i> 2026 Consultorio Valerio
    </div>

</div>

</body>

</html>
