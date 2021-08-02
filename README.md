<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Instalaciones

Antes de poder ejecutar este proyecto debemos tener instalado lo siguiente:

- Apache
- Mysql
- Composer
- Tener una terminal para ejecutar comandos y un IED de desarrollo
- node js

## Ejecución

- Ejecutar el comando ``` composer install ``` dentro de la carpeta del proyecto para instalar todas las dependencias 
- Luego ejecutamos el comando ``` npm install ``` para instalar las dependencias de npm
- Crear una base de datos y configurar los accesos en el archivo ``` .env```
- Para generar la clave unica de la aplicacion debemos ejecutar el comando ```php artisan key:generate```
- Despues ejecutamos las migraciones con el comando ```php artisan migrate ``` para que cree las tablas en la base de datos
- por ultimo ejecutamos nuestro proyecto con el comando ```php artisan serve```

## Probar servicios

Si queremos probar los servicios debemos descargar Postman y abrir el siguiente [link](https://www.getpostman.com/collections/2495aa84e9d26dbbc8a1p) donde estaran toda la configuracion de los servicios 

Para ejecutar estos servicios debemos loguearnos y con el token que nos genere ingresamos a los demas metodos de la api, este token lo podemos poner el el header de cada servicio
