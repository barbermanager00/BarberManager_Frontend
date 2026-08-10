<?php

/**
 * VISTA: splash.php
 * =================
 * Esta es la PRIMERA PÁGINA que ve el usuario cuando accede a la aplicación.
 * 
 * Qué hace:
 * - Muestra el logo/imagen del BarberApp de forma elegante
 * - Aplica animación de entrada (zoom y fade-in)
 * - Después de 3 segundos, redirige automáticamente a /welcome
 * 
 * Diseño:
 * - Fondo a rayas con colores de barbería (rojo, blanco, azul)
 * - Imagen centrada con sombra proyectada
 * - Animación suave y moderna
 */
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BarberApp - Bienvenido</title>
    <style>
        /* Reset de espacio y caja para evitar márgenes extra en el diseño */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Fondo a rayas y centrado total de la pantalla */
        body {
            min-height: 100vh;
            background: repeating-linear-gradient(135deg,
                    #ffffff 0px,
                    #ffffff 40px,
                    #c8102e 40px,
                    #c8102e 80px,
                    #ffffff 80px,
                    #ffffff 120px,
                    #134a7a 120px,
                    #134a7a 160px);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            padding: 20px;
        }

        /* Contenedor principal que mantiene la imagen centrada */
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            max-width: 900px;
        }

        /* Imagen del logo responsive y con sombra suave */
        .splash-image {
            width: 100%;
            max-width: 760px;
            height: auto;
            display: block;
            filter: drop-shadow(0 15px 35px rgba(0, 0, 0, 0.3));
            animation: fadeInScale 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        @keyframes fadeInScale {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @media (max-width: 768px) {

            /* Ajuste del tamaño de la imagen en tablets */
            .splash-image {
                max-width: 350px;
            }
        }

        @media (max-width: 480px) {

            /* Ajuste del tamaño de la imagen en móviles pequeños */
            .splash-image {
                max-width: 280px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <img src="/Barber_Manager/images/splash-logo.png" alt="BarberApp Logo" class="splash-image">
    </div>

    <script>
        // Cuando la página termina de cargar, espera 3 segundos y redirige a welcome.php
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                window.location.href = '/Barber_Manager/welcome';
            }, 3000);
        });
    </script>
</body>

</html>