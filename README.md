Latte
=====

El Blog algo diferente.

Como Empezar
------------

Este proyecto requiere tener preinstalado [NPM](http://nodejs.org/), [Bower](http://bower.io/) y [Composer](https://getcomposer.org/).

Teniendo instalado se debe de ejecutar la instalación de los requerimientos.

```sh
$ npm install
$ bower install
$ composer install
```

Montar Base de datos
--------------------

Para montar la base de datos se utiliza el comando con artisan.

```sh
$ artisan migrate --force
```

Montar mi primer Servidor
-------------------------

Se puede montar un servidor con artisan con la siguiente instrucción.

```sh
$ artisan serve
```
