# iort
Inputs-Outputs de Reciclanet.org

## Instalación

Clonar el repositorio
```
https://github.com/reciclanet/iort.git
```

Entrar en el directorio
```
cd iort
```

Instalar los componentes mediante composer
```
composer install
```

Crear el fichero de configuración a partir del ejemplo
```
cp .env.example .env
```

Editar el fichero `.env` con los datos necesarios para conectarse a la BBDD.

Crear la BBDD llamada `iort` y luego generar la estructura mediante los comandos:
```
php artisan migrate
```


```
php artisan db:seed
```


Crear las claves de la aplicación utilizadas para el hash de las contraseñas, la sesión, etc..
```
php artisan key:generate
```

## Ejecutar el servidor

Comando para ejecutar el servidor
```
php artisan serve
```


En la consola aparecerá la ruta a la que acceder, normalmente:
```
http://localhost:8000
```
