# iort
Inputs-Outputs de Reciclanet.org
Desarrollo movido a: https://gitlab.com/reciclanet/iort

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

* En caso de MySQL habrá que crearla en el servidor.
``` 
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=iort
DB_USERNAME=iort
DB_PASSWORD=iort
```
* En caso de sqlite (por defecto): 
```
DB_CONNECTION=sqlite
```
Crear la BBDD, en el caso de MySQL habrá que crear la BBDD con el nombre introducido en DB_DATABASE. En el caso de sqlite hay que ejecutar el siguiente comando:
```
touch database/database.sqlite
```

Generar la estructura mediante los comandos:
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
http://127.0.0.1:8000
```
