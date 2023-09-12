# CRUD - Sistema de Calificaciones

Sistema para gestionar las calificaciones de los estudiantes, puede insertar, modificar, eliminar las calificaciones de los estudiantes.



## 📎 Instalación

1. Clonar el repositorio
2. Crear base de datos con el nombre `sistema_de_notas`
3. Importar el archivo `sistema_de_notas.sql` que se encuentra en la raíz del proyecto en la base de datos creada desde phpMyAdmin
4. Inserte un usuario de prueba en la table profesor, para poder ingresar al sistema. Ejemplo:
    ```sql
    insert into profesor (nombre, telefono, username, password) values ('Pedro Quiroz', 1234567, 'pquiroz', '123');
    ```
5. Crear archivo `env.php` en el directorio `includes` del proyecto con el siguiente contenido:
    
    ```php
    <?php

    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', ''); // Tu contraseña de MySQL, si no tiene contraseña dejar vacío
    define('DB_NAME', 'sistema_de_notas');

    ?>
    ```

6. Iniciar apache y mysql en XAMPP, WamppServer o cualquier otro servidor local, que tengan instalado
7. Abrir el navegador e ingresar a la url `http://localhost/<nombre_del_proyecto>`
8. ¡Listo! Ya puede empezar a usar el sistema



## 🧑‍💻 Tecnologías

- [XAMPP](https://www.apachefriends.org/es/index.html) - Servidor local, que incluye Apache, MySQL, PHP
- [PHP 7.4 o superior](https://www.php.net/) - Lenguaje de programación back-end
- [HTML5](https://developer.mozilla.org/es/docs/HTML/HTML5) - Lenguaje de marcado
- [CSS3](https://developer.mozilla.org/es/docs/Archive/CSS3) - Lenguaje de estilos
- [JavaScript](https://developer.mozilla.org/es/docs/Web/JavaScript) - Lenguaje de programación front-end
- [Bootstrap 5.3](https://getbootstrap.com/) - Framework CSS
- [jQuery 3.7.1](https://jquery.com/) - Librería JavaScript
- [SweetAlert2](https://sweetalert2.github.io/) - Librería JavaScript para mostrar alertas
- [Font Awesome 6.4.2](https://fontawesome.com/) - Librería de iconos



## 🌐 Mapa del sitio

Estructura de archivos y carpetas del proyecto.

```bash
├── sistema_de_notas
│   ├── assets
│   │   ├── css
│   │   │   ├── estilos.css
│   │   │   ├── login.css
│   │   ├── img
│   │   │   ├── favicon.png
│   │   │   ├── logo.png
│   │   ├── js
│   │   │   ├── app.js
│   │   │   ├── utils.js
│   ├── components
│   │   ├── addcalificacion
│   │   │   ├── addcalificacion.php
│   │   ├── navbar
│   │   │   ├── navbar.html
│   ├── includes
│   │   ├── ajax_calificacion.php
│   │   ├── cdb_calificacion.php
│   │   ├── conexion_db.php
│   │   ├── env.php
│   ├── lib
│   │   ├── jQuery
│   │   │   ├── jquery-3.7.1.min.js
│   │   ├── sweetalert2
│   │   │   ├── sweetalert2@11.js
│   ├── .gitignore
│   ├── .htaccess
│   ├── dashboard.php
│   ├── del-calificacion.php
│   ├── edit-calificacion.php
│   ├── index.html
│   ├── README.md
│   ├── sistema_de_notas.sql
```



## 🏴 Equipos de trabajo

Nuestro equipo cuenta con 6 integrantes, los cuales son:

- **Daniel Gómez G.** [danieldevelop](https://github.com/danieldevelop) - Desarrollador FullStack
- **Raul Galleguillos.**
- **Valentina.**  
- **Valeria**
- **Fernanda Duran**
- **Jordy Segura**


Para mas información, puedes enviar un correo a: [dgomez.informatica@gmail.com](mailto:dgomez.informatica@gmail.com)
