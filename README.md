## Pokemons Finder App

App desarrollada con Laravel 9 para buscar pokemons con [PokeAPI](https://pokeapi.co/).

### Instalación 

##### Requisitos de entorno:

*   Versión PHP 8.1 mínimo
*   Composer instalado [https://getcomposer.org/](https://getcomposer.org/)
*   GIT instalado
*   Módulo para PHP **mbstring** para correr tests PHPUnit

#### Pasos para instalar:

Clonar el repositorio en GitHub, ejecutar los siguientes comandos:

```plaintext
git clone https://github.com/malopez83/pokeapi

cd pokeapi

composer install
```

#### Levantar la aplicación:

```plaintext
php artisan serve
```

Por defecto, la aplicación estará disponible en: [http://127.0.0.1:8000](http://127.0.0.1:8000)

#### Corriendo los tests con PHPUnit:

```plaintext
php artisan test
```