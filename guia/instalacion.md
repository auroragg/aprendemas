# Instrucciones de instalación y despliegue

## En local

Para la instalación de la aplicación en local son necesarios una serie de requisitos:
    • php >= 7.1.11
    • PostgreSQL >= 9.5
    • composer
    • Servidor bien configurado, por ejemplo Apache2
Una vez cumplidos estos requisitos deberás realizar los siguientes pasos para llevar a cabo la instalación de la aplicación:
    1. Tener el Apache2 (u otro servidor) configurado con un nombre de dominio creado (por ejemplo: aprendemas.local) y enlazado a aprendemas/web/.
    2. Instalar composer.
    3. Realizar los siguientes comandos en consola: git clone https://github.com/danili77/eventz.git cd eventz composer install composer run-script post-create-project-cmd
    4. Instalar PostgreSQL y ejecutar los siguientes comandos desde la raiz del proyecto: cd db ./create.sh ./load.sh > Después de realizar estos comandos se habrá creado una base de datos llamada aprendemas con un usuario aprendemas y contraseña arpendemas.
    5. Cambiar la siguiente configuración dentro del proyecto:
        ◦ Correo electrónico:
            ▪ Cambiar el correo electrónico del administrador en /config/params.php.
            ▪ SMTP_PASS: crear esta variable de entorno para la contraseña del correo electrónico.
        ◦ Cambiar el nombre del usuario administrador en /models/Usuario.php dentro de la función esAdmin().


## En la nube


Para la instalación de la aplicación en la nube Heroku serán necesarios realizar los siguientes pasos:
    1. Tener una cuenta en Heroku y crear una aplicación. Además, debes instalar el comando heroku para trabajar por linea de comandos o bien hacerlo desde la página web.
    2. Añadir el addon heroku-postgresql
    3. Crear la base de datos de la aplicación en la nube:
        Para inyectar la base de datos hacemos: heroku psql < db/aprendemas.sql
    4. Ejecutar los siguientes comandos:
        cd aprendemas heroku login (sólo hace falta una vez)
        heroku git:remote -a nombre_aplicacion_heroku
        git push heroku master
