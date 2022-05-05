# amoba-test

Esta prueba busca poner a prueba los conocimientos de nuestros candidatos a front-end y
back-end developer, los cuales deben demostrar sus habilidades trabajando con:
● Laravel
● VUE
● JS
● HTML
● CSS
● Taildwind css
● Mysql
● Entre otros.
Se hara uso de framwork taildwindcss para los estilos (https://tailwindcss.com/)
La prueba consta de una API creada con el framework LARAVEL y un proyecto de frontal
creado en VUEJS.
Se debe conectar a una base de datos con la siguientes tablas:
Persons:
● Id
● First_name
● Last_name
● Document
● Ima_profile
● type_person (campo enum valores 0 y 1)
● created_at
● updated_at
● deleted_at
Users
Los mismos campos por defecto proporcionados por laravel
Nota: el proyecto de backend deberá realizarse bajo un proyecto como máximo laravel 7.x
https://laravel.com/docs/7.x no se admitirán proyectos en versiones superiores.
Versión de PHP a utilizar: 7.3
El objetivo es crear un crud que permita:
● Login / Logout a la aplicación
● Crear, leer y editar Persons, así como filtrar a los mismos por nombre o apellidos
Las tareas de la prueba son las siguientes:
● Módulo Auth únicamente con login
Usuario: pruebas@amobasoftware.com
Contraseña: 134679
● Listar personas.
● Crear nuevas personas.
● Editar persona.
● Eliminar persona (soft delete)
● Filtrar usuarios por nombre o apellido.
La aplicación de filtros quedará sujeta a la creatividad y capacidad de solución de
incidencias del postulante
● Las personas tipo 0 se pintaran a la izquierda
● Las personas tipo 1 se pintaran a la derecha
● Solo se podrán crear personas tipo 1
Realizar el diseño a como se plantea en los mockups.
Crear colección de postman con los endPoint Utilizados
Todas las peticiones desde el frontal se deben realizar a través de axios y haciendo uso del
“Personal Access Client” proporcionado Laravel Passport
https://laravel.com/docs/7.x/passport#main-content
2- Diseños Los diseños que se deben seguir están en el siguiente prototipo:
https://www.figma.com/file/gynVIdMDeU6YlMpNoIzEVP/2-vistas-_-Dashboard?node-id=1%3
A508