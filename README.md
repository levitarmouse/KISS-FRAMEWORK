# KISS-FRAMEWORK (Documentación bajo revisión). Disponible, version beta basada branch.

Gestión de API con acceso a modelo de datos basado en Mysql.
Integración de KISS-REST y KISS-ORM.

Nota: No es un generador de Vistas!*
Surge como alternativa ligera para proveer de datos aplicaciones WEB tipo (SPA) SinglePageApplication

Através de KissRest y KissOrm
Tiene soporte para :
    Objetos de uso común:
        Iteradores
        Validación de datos
    Validaciones contra CSRF
    Validaciones contra XSS
    ORM con Mecanismo anti SqlInjection
    Acceso a Mysql a través de ORM tipo Active Record

Instalación:
En el raíz de tu WebServer:
composer create-project levitarmouse/kiss-framework kissf "dev-dev"

Proximamente: Soporte OracleDB y MongoDB también a través de KISS-ORM.

La instalación límpia ya presenta un controlador que es capaz de manejar todas las peticiones
HTTP. Sin embargo el uso esperado es que cree sus propios controladores y en ellos implemente
la lógica que necesita su API.

Para crear sus controladores dirijase a la carpeta /App/controllers
y genere allí una clase con el nombre que desee, no hay restricciones para los 
nombres de las classes más que las impuestas por PHP.

La clase debe pertenecer al namespace: controllers
Además es recomendable que los controladores extiendan de la clase \rest\RestController,
en principio solo para obtener ayuda de los mensajes que pudiera devolver si existen problemas
de integración. Luego será requerida para gestionar seguridad y centralizar lógica inherente a todos los
controladores.


Ejemplo:

Creamos... 

    /App/controllers/MensajeController.php

Con el siguiente código dentro:
<?php

namespace controllers;

class MensajeController {

    public function saludo() {
        return "Bienvenido a KISS-REST. Los saluda amablemente ".__METHOD__;
    }
}
?>

Para poder acceder a dicho controlador, debes registrarlo. (*)

Y para acceder a sus funciones debes configurar el ruteo a ellas!
Debes asociar los métodos de la clase controladora a los distintos métodos HTTP (**).
Ver: https://es.wikipedia.org/wiki/Hypertext_Transfer_Protocol
Nota: Esto lo haces en el archivo de configuración /config/kissrest/rest.ini

(*)
En la sección [CONTROLLERS_ROUTING]
Asocias el nombre del endpoint de la URL con el controlador que la atenderá.

(**)
En la sección [METHODS_ROUTING]
Asocias el endpoint al HTTP Method con un @.
El valor de cada registro es el nombre del método que atenderá el HTTP Method indicado

Por ejemplo, para el caso del Controller MensajeController ejemplificado al principio sería:

[CONTROLLERS_ROUTING]
/mensaje = "MensajeController"

[METHODS_ROUTING]
/mensaje@GET = 'saludo'

Luego podrás ver el resultado accediendo a http://localhost/kissf/mensaje
(suponiendo que has creado el proyecto en la subcarpeta "kissf" en la carpeta root de tú WebServer)

También es parte de la instalación, un sencillo controlador que devuelve la fecha y hora según PHP
y según la base de datos, obviamente luego de haber configurado las credenciales de acceso a ella!.
Es solo ilustrativo para tener disponible un sencillo ejemplo de acceso a consultas a las DB.

En la carpeta que contiene el código de KISS-ORM (vendor/levitarmouse/kiss_orm/example)
se puede hallar un ejemplo de base de datos
para probar el acceso según el ejemplo de configuración incluido!



Todos los ejemplos cumplen solo esa función, pueden ser descartados.
