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
     * Necesitamos copiar de algún proyecto con laravel 8 ui en view esto:
     
     ![Alt text](/img/Screenshot_2.png?raw=true)
     
     * Y de la carpeta ``public`` lo siguiente:
      
     ![Alt text](/img/Screenshot_3.png?raw=true)
     
     * Ahora tenemos que iniciar nuestro proyecto y entrar en el login
     
     ![Alt text](/img/Screenshot_4.png?raw=true)
     
     **Nota**: Si se va al apartado de registrar por ejemplo y una vez registrado nos sale un 404 en ``routes/web.php`` hacemos lo siguiente:
     ``Route::view('home','home);``
     
     # API
     Lo de la Api tengo un controlador dentro de ``Controller/Api`` donde hago un CRUD sobre una tabla llamada articulos donde se puede probar con postman
     
