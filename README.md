
## ¿Como cree el repositorio?
Creé el repositorio desde GitHub con el nombre proyecto-prueba, estableciendo como rama principal "Master". Luego, generé la rama "Auth" para implementar un login con autenticación, base de datos y registro de usuarios. Después de cada cambio importante, preparé los archivos para hacer el commit, dejando constancia mediante comentarios de lo que se había realizado.

Una vez finalizado el login, creé una nueva rama llamada "CRUD", donde desarrollé un sistema CRUD de productos, con funcionalidades para añadir, editar, visualizar y eliminar atributos como nombre, precio, stock e imagen. Cada función importante fue documentada utilizando JSDOC, con el objetivo de facilitar su comprensión para cualquier persona.

## ¿Que tecnologias y versiones use?
- EL framework que uso es [Laravel 10](https://laravel.com/docs/10.x/installation).
- Como entorno de desarrollo local use [Laragon 6.0](https://www.filehorse.com/es/download-laragon/74355/).
- Como sistema de gestión de bases de datos use [MySql 8.3](https://dev.mysql.com/doc/relnotes/mysql/8.3/en/news-8-3-0.html).
- Como gestor de descargas de PHP use [Composer](https://getcomposer.org/download/).
- Desde Composer se instalo una libreria externa llamada [Breeze](https://laravel.com/docs/10.x/starter-kits) en su versión 1.29.
- Como servidor web use [Apache](https://httpd.apache.org/download.cgi).
- Por entorno de ejecución de JavaScript utilice [Node.js](https://nodejs.org/es/blog/release/v18.0.0).
- El lenguaje usado fue [PHP 8.1](https://www.php.net/releases/8.1/en.php).
- Para la documentación de las funciones use [JSDOC](https://jsdoc.app/)

Un proyecto facil de entender, desarrollar y practicar.

## 🌿 Estructura de Ramas

| Rama    | Propósito                                                                 |
|---------|---------------------------------------------------------------------------|
| `master` | Rama principal. Contiene la versión estable del proyecto.               |
| `auth`   | Para el desarrollo del sistema de autenticación (login, registro, BD).  |
| `crud`   | Para implementar y mejorar el módulo CRUD de productos.                 |
