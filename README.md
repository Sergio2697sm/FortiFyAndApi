# Proyecto de autenticación con Fortify y uso de una API

He hecho un proyecto basado en Laravel utilizando autenticación mediante Forify y ademas he creado una API basica tanto para la autenticacion como de una tabla para hacer un CRUD de dicha tabla

# ¿Qué es fortify?

Es un metodo de autenticación donde el backend es idependiente del frontend.

# Instalación

Necesitamos un proyecto limpio en laravel. Donde tendremos que seguir estos pasos:

* Necesitamos instalar el paquete de fortify -> ``composer require laravel/fortify``
* Necesitamos instalar este recurso: ``php artisan vendor:publish --provider="Laravel\Fortify\FortifyServiceProvider``
* Una vez instalado lo anterior, necesitamos indicar en el archivo ``.env`` la tabla que vamos a usar y donde nos vamos a conectar y hacer un ``php artisan migrate``
* En el archivo ``/config/app.php`` en el apartado providers ponemos lo siguiente: ``App\Providers\FortifyServiceProvider::class``
* Ahora dentro del archivo ``app/Providers/FortifyServiceProvider.php`` dentro de la funcion ``boot()`` introducimos las distintas vistas:
    - Una para la vista del login: 
    ``Fortify::loginView(fn () => view('auth.login'));``
    
    - Una para la vista de registro:   
    ``Fortify::registerView(fn () => view('auth.register'));``
    
    - Una para restablecer la contraseña(contraseña olvidada):
    ```
    Fortify::requestPasswordResetLinkView(function () {
            return view('auth.passwords.email');
        });
     ``` 
     - Una para Restablecimiento de la contraseña:
     ```
     Fortify::resetPasswordView(function ($request) {
            return view('auth.passwords.reset', ['request' => $request]);
        });
     ```
     *Necesitamos copiar de algún proyecto con laravel 8 ui en view esto:
     ![Alt text](/relative/path/to/img.jpg?raw=true "Optional Title")
     
