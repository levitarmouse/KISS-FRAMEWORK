# KISS-FRAMEWORK (Documentación bajo revisión). Disponible, version beta basada branch.

Gestión de API con acceso a modelo de datos basado en Mysql.
Integración de KISS-REST y KISS-ORM.

Nota: No es un generador de Vistas!*

Instalación:

/var/www/ composer create-project levitarmouse/kiss-framework kissf "dev-dev"

Proximamente: (Validación XSS y CSRF), (Soporte OracleDB, MongoDB a también a través de KISS-ORM)

La instalación límpia ya presenta un controlador que es capaz de manejar todas las peticiones
HTTP. Sin embargo el uso esperado es que cree sus propios controladores y en ellos implemente
la lógica que necesita su API.

Para crear un nuevo controlador, solo dirijase a la carpeta /App/controllers
y cree allí una clase con el nombre que desee, no hay restricciones para los 
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

Para poder acceder a dicho controlador, debes registrarlo. (1)

Y para acceder a sus funciones también debes configurar!
Debes asociar los métodos de la clase controladora a los distintos métodos HTTP (2).
Ver: https://es.wikipedia.org/wiki/Hypertext_Transfer_Protocol
Nota: Esto lo haces en el archivo de configuración /config/kissrest/rest.ini

(1)
En la sección [CONTROLLERS_ROUTING]
Asocias el nombre de la entidad requerida en la URL con el controlador que la atenderá

(2)
En la sección [METHODS_ROUTING]
Indicas la entidad asociandola al HTTP Method con un @.
El valor de cada registro es el nombre del método que atenderá e HTTP Method

Por ejemplo, para el caso del Controller MensajeController ejemplificado arriba podría ser:

[CONTROLLERS_ROUTING]
/mensaje = "MensajeController"

[METHODS_ROUTING]
/mensaje@GET = 'saludo'

Luego podrás ver el resultado accediendo a http://localhost/kissf/mensaje

También es parte de la instalación un sencillo controlador que devuelve la fecha y hora de PHP.
Solo informativo, pero seguro evolucionará en un microservicio de calendario

Todos los ejemplos cumplen solo esa función, pueden ser descartados.
