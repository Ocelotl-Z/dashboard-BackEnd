<p align="center"><a href="https://laravel.com" target="_blank"><img src="./public/images/logo.png" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status">

## Instalacion

1. Instalar todos los paquetes:

```bash
composer install
```

2. Prepar archivo .env
   
   * crear una copia del archivo .env.example
   
   * cambiar los siguientes datos:
   
   ```bash
   APP_NAME=SDAW
   APP_ENV=local
   APP_KEY=base64:Ak3hkPlSmVkYjc6pkg9D7gHl2HBy2Dt3nAYomyyH8r0=
   APP_DEBUG=true
   APP_URL=http://dashboard.test
   
   DB_CONNECTION=mysql
   DB_HOST=datos del host
   DB_PORT=puertos
   DB_DATABASE=dashboard
   DB_USERNAME=nombre usuario
   DB_PASSWORD=constraseña
   ```

3. Ejecutar las migraciones:

```bash
php artisan migrate --seed
```


