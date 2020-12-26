# Proyecto de autenticación con Fortify y uso de una API

He hecho un proyecto basado en Laravel utilizando autenticación mediante Forify y ademas he creado una API basica tanto para la autenticacion como de una tabla para hacer un CRUD de dicha tabla

# ¿Qué es fortify?

Es un metodo de autenticación donde el backend es idependiente del frontend.

# Instalación

Necesitamos un proyecto limpio en laravel. Donde tendremos que seguir estos pasos:

* Necesitamos instalar el paquete de fortify -> ``composer require laravel/fortify``
* Necesitamos instalar este recurso: ``php artisan vendor:publish --provider="Laravel\Fortify\FortifyServiceProvider``
* Una vez instalado lo anterior, necesitamos indicar en el archivo ``.env`` la tabla que vamos a usar y donde nos vamos a conectar y hacer un ```php artisan migrate``
* En el archivo ``/config/app.php`` en el apartado providers ponemos lo siguiente: ``App\Providers\FortifyServiceProvider::class``
