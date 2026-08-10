<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Rye&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <title>Barber Manager - Iniciar Sesión</title>
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

        .header-buttons {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .back-btn {
            background-color: transparent;
            color: #f5f5dc;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            border: 2px solid #f5f5dc;
            transition: all 0.3s ease;
            font-size: 18px;
        }

        .back-btn:hover {
            background-color: #f5f5dc;
            color: #432a1a;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
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
            max-width: 520px;
            width: 90%;
            animation: fadeIn 0.8s ease-out;
            color: #f5f5dc;
        }

        .login-title {
            font-size: 36px;
            font-family: 'Rye', serif;
            color: #f5f5dc;
            margin-bottom: 15px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.8);
            line-height: 1.2;
        }

        .login-subtitle {
            font-size: 18px;
            color: #e8dcc4;
            line-height: 1.6;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.8);
            margin-bottom: 40px;
        }

        /* Separator */
        .separator {
            display: flex;
            align-items: center;
            gap: 16px;
            margin: 28px 0;
        }

        .separator::before,
        .separator::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(to right, transparent, #f5f5dc55, transparent);
        }

        .separator span {
            color: #e8dcc4;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8);
        }

        /* Login buttons */
        .login-options {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .login-option-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 14px;
            padding: 16px 24px;
            border-radius: 10px;
            font-size: 18px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
        }

        .login-option-btn svg {
            width: 24px;
            height: 24px;
            flex-shrink: 0;
        }

        .email-modal {
            position: fixed;
            inset: 0;
            background: rgba(31, 22, 14, 0.82);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 99;
            padding: 20px;
        }

        .email-modal.open {
            display: flex;
        }

        .email-modal-card {
            width: min(100%, 460px);
            background: #f5f5dc;
            border-radius: 14px;
            border: 4px solid #432a1a;
            padding: 28px;
            color: #432a1a;
            box-shadow: 0 12px 55px rgba(0, 0, 0, 0.6);
        }

        .email-modal-card h2 {
            font-family: 'Rye', serif;
            font-size: 28px;
            margin-bottom: 10px;
            text-align: center;
        }

        .email-modal-card p {
            color: #432a1a;
            font-size: 15px;
            line-height: 1.55;
            margin-bottom: 20px;
            text-align: center;
        }

        .email-form label {
            display: block;
            font-weight: 700;
            font-size: 14px;
            margin-bottom: 7px;
            color: #432a1a;
            text-align: left;
        }

        .email-form input {
            width: 100%;
            padding: 12px 14px;
            border-radius: 10px;
            border: 2px solid #d1c5ab;
            outline: none;
            font-size: 15px;
            color: #432a1a;
            background: #fffaf1;
            margin-bottom: 14px;
        }

        .email-form input:focus {
            border-color: #134a7a;
            box-shadow: 0 0 0 3px rgba(19, 74, 122, 0.15);
        }

        .email-form button {
            width: 100%;
            padding: 13px;
            border-radius: 10px;
            border: none;
            background: #432a1a;
            color: #f5f5dc;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .email-form button:hover {
            background: #2b1a10;
            transform: translateY(-2px);
        }

        .email-modal-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-top: 14px;
        }

        .email-modal-actions .secondary {
            background: transparent;
            border: 2px solid #432a1a;
            color: #432a1a;
        }

        .email-modal-actions .secondary:hover {
            background: #432a1a;
            color: #f5f5dc;
        }

        .modal-message {
            margin-top: 15px;
            font-size: 13px;
            font-weight: 700;
            color: #8b1e18;
            min-height: 20px;
        }

        .modal-message.success {
            color: #1b6a34;
        }

        /* Google button */
        .btn-google {
            background-color: #ffffff;
            color: #3c4043;
            border: 2px solid #dadce0;
        }

        .btn-google:hover {
            background-color: #f7f8f8;
            border-color: #c6c8ca;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        /* Email button */
        .btn-email {
            background-color: #f5f5dc;
            color: #432a1a;
            border: 2px solid #f5f5dc;
        }

        .btn-email:hover {
            background-color: #ede9c8;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
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

            .login-title {
                font-size: 28px;
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
            <a href="/Barber_Manager/welcome" class="back-btn">← Volver</a>
        </div>
    </header>

    <main class="hero-section">
        <div class="wood-panel">
            <h1 class="login-title">Iniciar Sesión</h1>
            <p class="login-subtitle">Elegí cómo querés acceder a tu cuenta</p>

            <div class="login-options">
                <!-- Botón de Google -->
                <a href="/Barber_Manager/google-auth" class="login-option-btn btn-google" id="btn-login-google">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92a5.06 5.06 0 0 1-2.2 3.32v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.1z" fill="#4285F4" />
                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853" />
                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18A10.96 10.96 0 0 0 1 12c0 1.77.42 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05" />
                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335" />
                    </svg>
                    Continuar con Google
                </a>

                <div class="separator">
                    <span>o</span>
                </div>

                <!-- Botón de Email -->
                <a href="#" class="login-option-btn btn-email" id="btn-login-email">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" stroke="#432a1a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M22 6l-10 7L2 6" stroke="#432a1a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Continuar con Email
                </a>
            </div>
        </div>
    </main>

    <div class="email-modal" id="email-modal">
        <div class="email-modal-card">
            <button id="close-email-modal" aria-label="Cerrar" style="float:right;border:none;background:transparent;color:#432a1a;font-size:26px;cursor:pointer;">×</button>
            <h2>Continuar con correo</h2>
            <p>Ingresá tu correo y te enviaremos una clave temporal para entrar.</p>

            <div class="email-form" id="email-step-1">
                <label for="email-input">Correo electrónico</label>
                <input type="email" id="email-input" placeholder="nombre@correo.com">
                <button type="button" id="btn-send-code">Solicitar clave</button>
            </div>

            <div class="email-form" id="email-step-2" style="display:none;">
                <p id="email-sent-text" style="margin-top:0; margin-bottom:14px;">La clave temporal fue enviada.</p>
                <label for="key-input">Clave temporal</label>
                <input type="text" id="key-input" placeholder="Ingresá la clave">
                <div class="email-modal-actions">
                    <button type="button" class="secondary" id="btn-back-email">Volver</button>
                    <button type="button" id="btn-confirm-code">Ingresar</button>
                </div>
            </div>

            <div class="modal-message" id="modal-message"></div>
        </div>
    </div>

    <script>
        const emailModal = document.getElementById('email-modal');
        const openEmailModal = document.getElementById('btn-login-email');
        const closeEmailModal = document.getElementById('close-email-modal');
        const emailStep1 = document.getElementById('email-step-1');
        const emailStep2 = document.getElementById('email-step-2');
        const emailInput = document.getElementById('email-input');
        const keyInput = document.getElementById('key-input');
        const emailSentText = document.getElementById('email-sent-text');
        const modalMessage = document.getElementById('modal-message');

        openEmailModal.addEventListener('click', function(event) {
            event.preventDefault();
            emailModal.classList.add('open');
        });

        closeEmailModal.addEventListener('click', function() {
            emailModal.classList.remove('open');
            modalMessage.textContent = '';
            modalMessage.classList.remove('success');
        });

        function showModalMessage(message, ok = false) {
            modalMessage.textContent = message;
            modalMessage.classList.toggle('success', ok);
        }

        function setEmailStep(step) {
            if (step === 1) {
                emailStep1.style.display = 'block';
                emailStep2.style.display = 'none';
            } else {
                emailStep1.style.display = 'none';
                emailStep2.style.display = 'block';
            }
        }

        document.getElementById('btn-send-code').addEventListener('click', async function() {
            const email = emailInput.value.trim();
            if (!email) {
                showModalMessage('Ingresá un correo electrónico.');
                return;
            }

            showModalMessage('Solicitando clave...');

            try {
                const response = await fetch('/Barber_Manager/login-email', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        email: email
                    })
                });

                const result = await response.json();

                if (!result.ok) {
                    showModalMessage(result.message || 'No se pudo generar la clave.');
                    return;
                }

                emailSentText.textContent = 'La clave temporal fue enviada a ' + email + '.';
                showModalMessage(result.message || 'Clave enviada.', true);
                setEmailStep(2);
            } catch (error) {
                showModalMessage('No se pudo completar la solicitud.');
            }
        });

        document.getElementById('btn-back-email').addEventListener('click', function() {
            keyInput.value = '';
            setEmailStep(1);
            showModalMessage('');
        });

        document.getElementById('btn-confirm-code').addEventListener('click', async function() {
            const email = emailInput.value.trim();
            const code = keyInput.value.trim();

            if (!email || !code) {
                showModalMessage('Ingresá tu correo y la clave enviada.');
                return;
            }

            try {
                const response = await fetch('/Barber_Manager/login-email-confirm', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        email: email,
                        clave: code
                    })
                });

                const result = await response.json();

                if (!result.ok) {
                    showModalMessage(result.message || 'La clave es incorrecta.');
                    return;
                }

                showModalMessage('Ingresando...', true);
                if (result.redirect) {
                    window.location.href = result.redirect;
                }
            } catch (error) {
                showModalMessage('No se pudo iniciar sesión.');
            }
        });
    </script>
</body>

</html>