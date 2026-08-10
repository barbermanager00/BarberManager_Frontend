<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Rye&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <title>Barber Manager - Seleccionar Rol</title>
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
                linear-gradient(rgba(0, 0, 0, 0.2) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 0, 0, 0.2) 1px, transparent 1px),
                linear-gradient(to right, #2d1810, #4a2f1d, #2d1810);
            background-size: 100% 20px, 20px 100%, 100% 100%;
            border-bottom: 4px solid #1a0f0a;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
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
            filter: drop-shadow(0 2px 6px rgba(0, 0, 0, 0.6));
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
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.9);
        }

        .logout-link {
            color: #f5f5dc;
            text-decoration: none;
            font-weight: 700;
            font-size: 14px;
            padding: 12px 22px;
            border-radius: 999px;
            border: 2px solid rgba(245, 245, 220, 0.45);
            background: rgba(255, 255, 255, 0.05);
            transition: all 0.25s ease;
        }

        .logout-link:hover {
            background: #f5f5dc;
            color: #432a1a;
            transform: translateY(-2px);
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
                linear-gradient(rgba(0, 0, 0, 0.2) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 0, 0, 0.2) 1px, transparent 1px),
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

        /* Info del usuario logueado */
        .user-info {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin-bottom: 30px;
            padding: 15px 25px;
            background: rgba(0, 0, 0, 0.25);
            border-radius: 12px;
            border: 1px solid rgba(245, 245, 220, 0.15);
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 3px solid #f5f5dc;
            object-fit: cover;
        }

        .user-details {
            text-align: left;
        }

        .user-details .user-name {
            font-size: 18px;
            font-weight: 700;
            color: #f5f5dc;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.8);
        }

        .user-details .user-email {
            font-size: 14px;
            color: #e8dcc4;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8);
        }

        .panel-title {
            font-size: 38px;
            font-family: 'Rye', serif;
            color: #f5f5dc;
            margin-bottom: 15px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.8);
            line-height: 1.2;
        }

        .panel-subtitle {
            font-size: 20px;
            color: #e8dcc4;
            line-height: 1.6;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.8);
            margin-bottom: 40px;
        }

        /* Botones de selección de rol */
        .role-options {
            display: flex;
            gap: 30px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .role-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 18px;
            padding: 35px 30px;
            border-radius: 15px;
            text-decoration: none;
            transition: all 0.4s ease;
            cursor: pointer;
            border: 3px solid rgba(245, 245, 220, 0.2);
            background: rgba(0, 0, 0, 0.2);
            width: 280px;
            position: relative;
            overflow: hidden;
        }

        .role-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(245, 245, 220, 0.05), transparent);
            transition: all 0.4s ease;
        }

        .role-card:hover {
            border-color: #f5f5dc;
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
            background: rgba(0, 0, 0, 0.35);
        }

        .role-card:hover::before {
            background: linear-gradient(135deg, rgba(245, 245, 220, 0.1), transparent);
        }

        .role-icon {
            position: relative;
            z-index: 1;
        }

        .role-icon svg {
            width: 70px;
            height: 70px;
            filter: drop-shadow(2px 2px 4px rgba(0, 0, 0, 0.5));
        }

        .role-card-title {
            font-family: 'Rye', serif;
            font-size: 22px;
            color: #f5f5dc;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
            position: relative;
            z-index: 1;
        }

        .role-card-desc {
            font-size: 15px;
            color: #e8dcc4;
            line-height: 1.5;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8);
            position: relative;
            z-index: 1;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
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

            .header-logo span {
                font-size: 32px;
            }

            .wood-panel {
                padding: 40px 20px;
            }

            .panel-title {
                font-size: 28px;
            }

            .role-options {
                flex-direction: column;
                align-items: center;
            }

            .role-card {
                width: 100%;
                max-width: 320px;
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
        <a href="/Barber_Manager/logout" class="logout-link">Cerrar sesión</a>
    </header>

    <main class="hero-section">
        <div class="wood-panel">
            <!-- Info del usuario logueado -->
            <div class="user-info">
                <?php if (!empty($usuario['picture'])): ?>
                    <img src="<?= htmlspecialchars($usuario['picture']) ?>" alt="Avatar" class="user-avatar">
                <?php endif; ?>
                <div class="user-details">
                    <div class="user-name"><?= htmlspecialchars($usuario['name']) ?></div>
                    <div class="user-email"><?= htmlspecialchars($usuario['email']) ?></div>
                </div>
            </div>

            <h1 class="panel-title">¿Cómo querés usar Barber Manager?</h1>
            <p class="panel-subtitle">Elegí tu rol para personalizar tu experiencia</p>

            <div class="role-options">
                <!-- Opción: Prestador de servicio -->
                <a href="#" class="role-card" id="role-prestador">
                    <div class="role-icon">
                        <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <!-- Tijeras de barbero -->
                            <circle cx="20" cy="48" r="8" stroke="#f5f5dc" stroke-width="3" fill="none" />
                            <circle cx="44" cy="48" r="8" stroke="#f5f5dc" stroke-width="3" fill="none" />
                            <line x1="26" y1="42" x2="38" y2="12" stroke="#f5f5dc" stroke-width="3" stroke-linecap="round" />
                            <line x1="38" y1="42" x2="26" y2="12" stroke="#f5f5dc" stroke-width="3" stroke-linecap="round" />
                            <circle cx="32" cy="27" r="3" fill="#f5f5dc" />
                        </svg>
                    </div>
                    <span class="role-card-title">Soy Prestador</span>
                    <span class="role-card-desc">Administrá tu barbería, gestioná turnos y organizá a tu equipo</span>
                </a>

                <!-- Opción: Cliente -->
                <a href="#" class="role-card" id="role-cliente">
                    <div class="role-icon">
                        <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <!-- Persona / Cliente -->
                            <circle cx="32" cy="20" r="12" stroke="#f5f5dc" stroke-width="3" fill="none" />
                            <path d="M10 56c0-12.15 9.85-22 22-22s22 9.85 22 22" stroke="#f5f5dc" stroke-width="3" stroke-linecap="round" fill="none" />
                        </svg>
                    </div>
                    <span class="role-card-title">Soy Cliente</span>
                    <span class="role-card-desc">Buscá barberías, reservá turnos y gestioná tus citas</span>
                </a>
            </div>
        </div>
    </main>
</body>

</html>