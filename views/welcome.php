<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Rye&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <title>Barber Manager - Bienvenida</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: repeating-linear-gradient(135deg,
                    #ffffff 0px,
                    #ffffff 40px,
                    #c8102e 40px,
                    #c8102e 80px,
                    #ffffff 80px,
                    #ffffff 120px,
                    #134a7a 120px,
                    #134a7a 160px);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        /* Franja superior tipo madera marrón */
        .top-bar {
            width: 100%;
            height: 145px;
            background-color: #432a1aff;
            background-image: 
                linear-gradient(rgba(0,0,0, 0.2) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0,0,0, 0.2) 1px, transparent 1px),
                linear-gradient(to right, #2d1810, #4a2f1d, #2d1810);
            background-size: 100% 20px, 20px 100%, 100% 100%;
            border-bottom: 4px solid #1a0f0a;
            box-shadow: 0 4px 15px rgba(0,0,0,0.5);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 50px;
            z-index: 10;
        }

        .header-logo {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .header-logo img {
            height: 170px;
            filter: drop-shadow(0 2px 6px rgba(0,0,0,0.6));
            transition: all 0.3s ease;
        }

        .header-logo img:hover {
            filter: drop-shadow(0 0 15px rgba(255, 255, 255, 0.8));
            transform: scale(1.05);
        }

        .header-logo span {
            font-family: 'Rye', serif;
            color: #f5f5dc;
            font-size: 50px;
            text-shadow: 3px 3px 6px rgba(0,0,0,0.9);
        }

        .header-buttons {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .login-btn {
            background-color: #f5f5dc; /* Color sólido azul de la barbería */
            color: #533c0aff;
            text-decoration: none;
            padding: 14px 28px;
            border-radius: 8px;
            font-weight: 700;
            border: 2px solid #f5f5dc;
            transition: all 0.3s ease;
            font-size: 20px;
        }

        .login-btn:hover {
            background-color: #f5f5dc;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.4);
        }

        /* Contenido principal */
        .hero-section {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 1;
            padding: 40px 20px;
        }

        .wood-panel {
            background-color: #432a1aff;
            background-image: 
                linear-gradient(rgba(0,0,0, 0.2) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0,0,0, 0.2) 1px, transparent 1px),
                linear-gradient(to right, #2d1810, #432a1a, #2d1810);
            background-size: 100% 20px, 20px 100%, 100% 100%;
            border: 4px solid #1a0f0a;
            border-radius: 15px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.6);
            padding: 50px 40px;
            text-align: center;
            max-width: 900px;
            width: 90%;
            animation: fadeIn 0.8s ease-out;
            color: #f5f5dc;
        }

        .wood-panel .hero-title {
            font-size: 42px;
            font-family: 'Rye', serif;
            color: #f5f5dc;
            margin-bottom: 25px;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.8);
            line-height: 1.2;
        }

        .wood-panel .hero-description {
            font-size: 20px;
            color: #e8dcc4;
            line-height: 1.6;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.8);
            margin-bottom: 30px;
        }

        .wood-panel .features-list {
            list-style: none;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 18px;
            margin-bottom: 30px;
        }

        .wood-panel .features-list li {
            font-size: 20px;
            color: #e8dcc4;
            display: flex;
            align-items: center;
            gap: 10px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.8);
        }

        .wood-panel .features-list li::before {
            content: '✓';
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 28px;
            height: 28px;
            min-width: 28px;
            background-color: #f5f5dc;
            color: #432a1a;
            border-radius: 50%;
            font-size: 22px;
            font-weight: bold;
            box-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 768px) {
            .top-bar {
                padding: 0 20px;
                height: auto;
                padding-top: 15px;
                padding-bottom: 15px;
                flex-direction: column;
                gap: 15px;
            }
            .wood-panel {
                padding: 40px 20px;
            }
            .wood-panel .hero-title {
                font-size: 32px;
            }
            .wood-panel .hero-description {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>
    <!-- Franja superior tipo madera -->
    <header class="top-bar">
        <div class="header-logo">
            <img src="/Barber_Manager/images/splash-logo.png" alt="BarberApp Logo">
            <span>Barber Manager</span>
        </div>
        <div class="header-buttons">
            <a href="/Barber_Manager/login" class="login-btn">Iniciar sesión</a>
        </div>
    </header>

    <main class="hero-section">
        <div class="wood-panel">
            <h1 class="hero-title">Aumentá tus cortes, no tus mensajes</h1>
            <p class="hero-description">Simplificá la agenda de tu barbería, organizá a tus barberos y brindá la experiencia digital que tus clientes esperan.</p>
            
            <ul class="features-list">
                <li>Sin tarjeta ni compromisos: Accedé gratis sin ingresar datos de pago</li>
                <li>Sin contratar ninguna suscripción</li>
                <li>Potencia total desde el día 1: Proba todas las funcionalidades sin límites</li>
                <li>Tu equipo completo sumado: Agregá barberos y colaboradores ilimitados sin costo extra</li>
            </ul>
        </div>
    </main>
</body>

</html>