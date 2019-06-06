Yii 2 Basic Project Ruleta
============================

REQUERIMIENTOS
------------

Soporte minimo de web server  PHP 5.4.0.
previamente debe estar instalado XAMPP. servidor independiente de codigo libre. 


INSTALLATION
------------

### Instalación via Composer



Usted puede instalar este proyecto usando el siguiente comando en caso de no tener el yii en su computadora mediante la herramienta Composer, en comandos del sistema:

~~~
php composer.phar global require "fxp/composer-asset-plugin:^1.3.1"
php composer.phar create-project --prefer-dist --stability=dev yiisoft/yii2-app-basic basic
~~~
IMPORTANTE 
------------
Ested debe copiar la carpeta del proyecto `Ruleta` en la ruta htdocs del Xampp.
~~~
C:\xampp\htdocs\
~~~
Al tener la carpeta contenedora del Proyecto debe acceder al mismo y realizar la siguiente instruccion.... En el CMD. Levantar los servicios del servidor 

~~~
C:\xampp\htdocs\Ruleta> php yii serve 
~~~
~~~
Para acceder al aplicativo funcional, se debe ingresar la siguiente direccion en el navegador de preferencia.

http://localhost::8080/index.php
~~~

CONFIGURACION
-------------

### Database

Debe acceder al archvo
 `config/db.php` 
realizar los cambios correspondientes. La contraseña y el usuario dependen del momento en el cual
se realizo la instalacion del XAMPP
```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=Prueba2',
    'username' => 'root', // 
    'password' => '1234', //
    'charset' => 'utf8',
];
```
* la base de datos se encunetra en la carpeta principal del proyecto con el nombre  `prueba.sql`

ESTRUCTURA DE DIRECTORIO
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources


