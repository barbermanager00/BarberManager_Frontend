# BarberManager Frontend

Este repositorio contiene el punto de entrada PHP de la API de BarberManager y un archivo JavaScript cliente para consultar barberos y turnos. Las páginas HTML que alojaban la interfaz no forman parte del estado actual de este repositorio.

## Arquitectura

`public/index.php` carga Composer, la configuración y los modelos del backend, registra las rutas de la API y despacha cada solicitud. `public/.htaccess` permite que Apache reescriba las rutas que no corresponden a archivos existentes hacia ese punto de entrada. La lógica de negocio reside en los controladores y modelos PHP del backend, que deben estar disponibles junto al proyecto.

`public/js/app.js` contiene las interacciones del navegador para consultar `/barberos` y `/turnos` y enviar reservas. Usa JavaScript nativo y permite indicar la URL del servidor mediante `window.BACKEND_URL`; si no se define, usa `http://localhost/Barber_Manager`.

## Stack tecnológico

- PHP para el punto de entrada y la API.
- Composer para el autoload y las dependencias del backend (el punto de entrada menciona Eloquent).
- JavaScript nativo para las solicitudes HTTP y las interacciones de turnos/barberos.
- Apache con `mod_rewrite` para publicar la API usando las reglas de `public/.htaccess`.
- No hay `package.json` ni un proceso de compilación de frontend en este repositorio.

## Estructura

```text
.
├── public/
│   ├── .htaccess       # Reescritura de rutas hacia index.php
│   ├── index.php       # Entrada y rutas de la API
│   ├── js/app.js       # Cliente JavaScript para turnos y barberos
│   └── images/         # Recursos de imagen
└── README.md
```

## Requisitos

Para iniciar la API localmente se necesita:

- PHP instalado y disponible como comando `php`.
- El backend complementario de BarberManager, incluidos `composer.json`, `vendor/`, `config/`, `models/` y los controladores que carga `public/index.php`.
- Una base de datos configurada según el backend.
- Para Apache, `mod_rewrite` habilitado y permiso `AllowOverride All` para que se apliquen las reglas de `.htaccess`.

El checkout actual no incluye Composer (`composer.json`), dependencias, configuración de base de datos ni las clases del backend; por sí solo no puede iniciar la API. Obtén y configura esos archivos siguiendo las instrucciones del repositorio backend antes de ejecutar los comandos siguientes.

## Ejecución local

Desde la raíz del proyecto, una vez instalado y configurado el backend, inicia el servidor PHP integrado:

```powershell
php -S 127.0.0.1:8000 -t public public/index.php
```

La API quedará disponible en `http://127.0.0.1:8000`. La ruta raíz responde el estado del servicio; las rutas implementadas incluyen `GET/POST /turnos`, `GET/POST /barberos` y `GET/POST /barber` (además de `GET /barber/{id}`). Para usar el cliente `app.js` desde una página anfitriona, define `window.BACKEND_URL = 'http://127.0.0.1:8000'` antes de cargar el script. Las llamadas desde otro origen también pueden requerir configuración CORS en el backend.

Si se usa Apache, configura el `DocumentRoot` para servir `public/`, habilita `mod_rewrite` y permite `AllowOverride All`; después inicia Apache y visita `http://localhost/`. La conexión a base de datos y cualquier secreto deben configurarse localmente y no subirse al repositorio.
