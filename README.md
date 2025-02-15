<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Documentación del Proyecto Laravel

## Instalación y Configuración

### Requisitos Previos

Antes de comenzar, asegúrese de tener instalado lo siguiente:

- PHP (≥8.0)
- Composer
- Laravel (≥9.x)
- SQLite o MySQL
- Node.js y npm (opcional, para assets front-end)

### Clonar el Proyecto

Ejecute el siguiente comando para clonar el repositorio:

```sh
 git clone https://github.com/tu-repo/tu-proyecto.git
 cd tu-proyecto
```

### Instalar Dependencias

Ejecute el siguiente comando para instalar las dependencias del proyecto:

```sh
composer install
```

### Configurar el Archivo de Entorno

Copie el archivo de configuración y ajústelo según la base de datos que desea usar:

```sh
cp .env.example .env
```

Edite el archivo `.env` y configure los siguientes valores según la base de datos elegida.

#### Usando SQLite

1. Cree el archivo de la base de datos:

   ```sh
   touch database/database.sqlite
   ```

2. En el archivo `.env`, configure:

   ```env
   DB_CONNECTION=sqlite
   DB_DATABASE=/absolute/path/to/database.sqlite
   ```

#### Usando MySQL

Si prefiere usar MySQL, configure los siguientes valores en el archivo `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_base_de_datos
DB_USERNAME=usuario
DB_PASSWORD=contraseña
```

### Generar la Clave de la Aplicación

```sh
php artisan key:generate
```

### Ejecutar Migraciones y Seeders

Ejecute los siguientes comandos para crear las tablas y poblar la base de datos con datos de prueba:

```sh
php artisan migrate --seed
```

## Ejecutar el Proyecto

### Iniciar el Servidor de Desarrollo

Para iniciar el servidor local, ejecute:

```sh
php artisan serve
```

El proyecto estará disponible en: [http://127.0.0.1:8000](http://127.0.0.1:8000)

### Acceder con Usuario de Prueba

Puede iniciar sesión con las siguientes credenciales:

- **Correo:** `test@test.com`
- **Contraseña:** `password`

## Opcional: Compilar Assets

Si el proyecto incluye assets front-end, ejecute:

```sh
npm install
npm run dev
```

## Notas Finales

Si tiene algún problema con permisos en `storage` y `bootstrap/cache`, ejecute:

```sh
chmod -R 777 storage bootstrap/cache
```

Con esto, el proyecto estará listo para usarse. ¡Disfruta desarrollando!
