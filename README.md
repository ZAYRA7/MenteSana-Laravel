<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# 🧠 MenteSana - Sistema de Gestión de Citas

**MenteSana** es un sistema web desarrollado en Laravel (Proyecto en equipo - Aplicaciones Web 2026) que permite gestionar, agendar, actualizar y cancelar citas psicológicas en línea.

---

## 📸 Capturas de Pantalla

### 1. Lista de Citas (`/citas`)

Visualización general de las citas registradas con su paciente, fecha, hora, psicólogo asignado (ej. Ps. María Gómez, Dr. Carlos Mendoza), estado (Confirmada, Pendiente, Cancelada) y acciones.

![Lista de Citas](https://via.placeholder.com/800x450.png?text=MenteSana+-+Lista+de+Citas)

### 2. Agendar Nueva Cita (`/citas/create`)

Formulario interactivo para registrar una nueva cita ingresando Paciente, Fecha, Hora y la selección del Psicólogo correspondiente.

![Agendar Cita](https://via.placeholder.com/800x450.png?text=MenteSana+-+Agendar+Nueva+Cita)

### 3. Editar Cita (`/citas/{id}/edit`)

Interfaz de modificación que permite reasignar horarios, fechas o psicólogos a una cita previamente agendada.

![Editar Cita](https://via.placeholder.com/800x450.png?text=MenteSana+-+Editar+Cita)

---

## 🛠️ Instrucciones de Instalación

Sigue estos pasos para clonar y ejecutar el proyecto localmente:

1. **Clonar el repositorio:**
   `bash
    git clone [https://github.com/tu-usuario/mente-sana.git](https://github.com/tu-usuario/mente-sana.git)
    cd mente-sana
    `
   Instalar dependencias de PHP:

Bash
composer install
Configurar el archivo de entorno:

Bash
cp .env.example .env
php artisan key:generate
Configurar la base de datos:
Abre el archivo .env y configura las variables de conexión:

Fragmento de código
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mentesana_db
DB_USERNAME=root
DB_PASSWORD=
Ejecutar migraciones y datos de prueba:

Bash
php artisan migrate --seed
Iniciar el servidor local:

Bash
php artisan serve
Accede en tu navegador a: http://127.0.0.1:8000/citas.

🗺️ Tabla de Rutas
Método HTTP Ruta / URI Nombre de Ruta Controlador / Acción Descripción
GET /citas citas.index CitaController@index Lista todas las citas agendadas y sus estados.
GET /citas/create citas.create CitaController@create Muestra el formulario para agendar una nueva cita.
POST /citas citas.store CitaController@store Almacena una nueva cita en la base de datos.
GET /citas/{cita}/edit citas.edit CitaController@edit Muestra el formulario con los datos prellenados para editar.
PUT / PATCH /citas/{cita} citas.update CitaController@update Actualiza los datos de una cita existente.
DELETE /citas/{cita} citas.destroy CitaController@destroy Elimina o cancela una cita del sistema.
About Laravel
Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

Simple, fast routing engine.

Powerful dependency injection container.

Multiple back-ends for session and cache storage.

Expressive, intuitive database ORM.

Database agnostic schema migrations.

Robust background job processing.

Real-time event broadcasting.

Laravel is accessible, powerful, and provides tools required for large, robust applications.

Learning Laravel
Laravel has the most extensive and thorough documentation and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

In addition, Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on Laravel Learn, where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

Agentic Development
Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install Laravel Boost to supercharge your AI workflow:

Bash
composer require laravel/boost --dev

php artisan boost:install
Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

Contributing
Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the Laravel documentation.

Code of Conduct
In order to ensure that the Laravel community is welcoming to all, please review and abide by the Code of Conduct.

Security Vulnerabilities
If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via taylor@laravel.com. All security vulnerabilities will be promptly addressed.

License
The Laravel framework is open-sourced software licensed under the MIT license.
