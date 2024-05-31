<?php
    include_once __DIR__ . "/../modelos/servicios/servicioPublicaciones.php";
    include "./../lib/autenticacion.php"; 

    // Crear una instancia del servicio
    $servicioPublicaciones = new servicioPublicaciones();

    $usuarioId = Autenticacion::obtenerUsuario();

    // Obtener publicaciones
    $publicaciones = $servicioPublicaciones->listarPublicacionesUsuario($usuarioId);

    // Crear eventos para el calendario
    $events = [];
    foreach ($publicaciones as $publicacion) {
        $events[] = [
            'title' => htmlspecialchars($publicacion['titulo']),
            'start' => htmlspecialchars($publicacion['fechaHora']),
            'description' => htmlspecialchars($publicacion['descripcion'])
        ];
    }
    $eventsJson = json_encode($events);
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Contacto</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sidebars/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.js'></script>

    <!-- Custom styles for this template -->
    <link href="../assets/css/inicioLoggin.css" rel="stylesheet">

    <style>
    #showCalendarButton, #hideCalendarButton {
        border: none;
        border-radius: 20px;
        padding: 10px 20px;
        width: 200px;
        background-color: grey; /* Color de fondo del botón */
        color: white; /* Color del texto del botón */
        font-size: 16px;
        cursor: pointer;
        margin: 0 auto; /* Centrar horizontalmente */
        margin-bottom: 10px; /* Espacio entre los botones */
    }

    #hideCalendarButton {
        display: none; /* Por defecto, ocultar el botón "Ocultar calendario" */
    }

    #calendarContainer {
        display: none;
        text-align: center; /* Centrar el contenido del contenedor */
    }

    #calendar {
        width: 400px;
        height: 550px;
        background-color: #212529;
        color: white; /* Cambiar el color del texto a naranja */
    }
  /* Estilos para los números de día */
  .fc-daygrid-day .fc-daygrid-day-number,
  .fc-daygrid-day.fc-day-today .fc-daygrid-day-number {
    color: #FFA366 !important; /* Color de los números de día */
  }
    /* Estilos para los nombres de los días */
.fc-col-header-cell-cushion, .fc-col-header-cell {
    color: white !important; /* Color de los nombres de los días */
  }

    /* Estilos adicionales para el efecto de rebote */
    .rutina {
        transition: transform 0.3s ease; /* Añadir transición suave */
    }

    /* Estilo para cuando se hace clic en la rutina */
    .rutina.clicked {
        transform: scale(1.1); /* Escalar la rutina al hacer clic */
    }

    </style>

</head>

<body>

<div id="paginaPublicaciones">
    <!-- SIDEBAR -->
    <?php
    include "inc/header.php";
    include("inc/navigatorColum.php");
    ?>
    <!-- SE MUESTRAN LAS PUBLICACIONES DE LA BASE DE DATOS  -->
    
    <div id="contenedorPublicaciones">
        <div id="tituloRutinas"> <p>MIS RUTINAS</p> </div>
        <button id="showCalendarButton">Mostrar calendario</button>
        <button id="hideCalendarButton" style="display: none;">Ocultar calendario</button>
        <div id="container">
            <?php if (count($publicaciones) > 0): ?>
                <?php foreach ($publicaciones as $publicacion): ?>
                    <div id="caja" class="rutina" id="<?php echo htmlspecialchars($publicacion['titulo']); ?>"> <!-- Agregar la clase rutina y el ID de la rutina -->
                        <?php echo $usuarioId?>
                        <div id="tituloPublicacion"><?php echo htmlspecialchars($publicacion['titulo']); ?></div>
                        <div id="separadorCabecera"></div>
                        <div id="cuerpoPublicacion">
                            <p><?php echo htmlspecialchars($publicacion['descripcion']); ?></p>
                        </div>
                        <div id="fechaPublicacion">
                            <small><?php echo htmlspecialchars($publicacion['fechaHora']); ?></small>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay publicaciones disponibles.</p>
            <?php endif; ?>  
        </div>
    </div>
  
    <div id="calendarContainer">
        <div id="calendar"></div>
    </div>

</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendarContainer = document.getElementById('calendarContainer');
    var showCalendarButton = document.getElementById('showCalendarButton');
    var hideCalendarButton = document.getElementById('hideCalendarButton');
    var calendarVisible = false; // Inicialmente, el calendario está oculto

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: <?php echo $eventsJson; ?>,
        eventColor: 'green',
        dayHeaderFormat: { weekday: 'narrow' }, // Mostrar solo las iniciales de los días de la semana
        themeSystem: 'standard' // Utilizar el sistema de tema estándar para personalizar el calendario
    });

    // Event listener para el botón "Mostrar calendario"
    showCalendarButton.addEventListener('click', function() {
        calendarContainer.style.display = 'block'; // Mostrar el contenedor del calendario
        showCalendarButton.style.display = 'none'; // Ocultar el botón "Mostrar calendario"
        hideCalendarButton.style.display = 'inline-block'; // Mostrar el botón "Ocultar calendario"
        calendarVisible = true; // Establecer que el calendario está visible
        calendar.render(); // Renderizar el calendario después de hacerlo visible
    });

    // Event listener para el botón "Ocultar calendario"
    hideCalendarButton.addEventListener('click', function() {
        calendarContainer.style.display = 'none'; // Ocultar el contenedor del calendario
        showCalendarButton.style.display = 'inline-block'; // Mostrar el botón "Mostrar calendario"
        hideCalendarButton.style.display = 'none'; // Ocultar el botón "Ocultar calendario"
        calendarVisible = false; // Establecer que el calendario está oculto
    });

    // Event listener para hacer clic en un evento del calendario
    calendarEl.addEventListener('click', function(info) {
        if (info.target.classList.contains('fc-daygrid-event')) { // Si se hace clic en un evento del calendario
            var eventTitle = info.target.innerText.trim(); // Obtener el título del evento (sin espacios al inicio y al final)
            var rutinaElement = document.getElementById(eventTitle); // Buscar el elemento de la rutina por su ID
            if (rutinaElement) { // Si se encuentra el elemento de la rutina
                rutinaElement.classList.add('clicked'); // Aplicar la clase clicked para el efecto de rebote
                setTimeout(function() { // Después de 300ms
                    rutinaElement.classList.remove('clicked'); // Quitar la clase clicked
                }, 300);
            }
        }
    });

    calendar.render();
});
</script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/sidebars.js"></script>

</body>
</html>
