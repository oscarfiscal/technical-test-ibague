El repositorio contiene:

-   **_Laravel_** 

# Descripción del proyecto 🚀

API de Diagnósticos y Pacientes
# Objetivo:
Desarrollar una API RESTful que permita la gestión de diagnósticos y pacientes.

# Funcionalidades 📋
   1. **Sistema de autenticación**
   - Registro de usuarios
   - Inicio de sesión
   - Administración de perfil de usuario

2. **Gestión de Empleados**
   - Crear, leer, actualizar y eliminar empleados
   - Validación de formularios
   - Manejo de errores

3. **Gestión de Departamentos**
   - Crear, leer, actualizar y eliminar departamentos
   - Validación de formularios
   - Manejo de errores

4. **Funcionalidades adicionales**
   - Búsqueda de empleados por nombre o departamento

# Tecnologias

PHP >= 8.2 <br>
Laravel >= 11 <br>
MySQL

# Comenzando 🚀

Estas instrucciones te permitirán obtener una copia del proyecto en funcionamiento en tu entorno local.


# Instalación 🔧

### Usar XAMPP

-  ## Instalar XAMPP 
   XAMPP es una distribución de Apache fácil de instalar que contiene MariaDB, PHP y Perl. Puedes descargarlo desde [XAMPP](https://www.apachefriends.org/es/index.html).

- **Configurar XAMPP**  
   Una vez instalado XAMPP, inicia el panel de control de XAMPP y asegúrate de que Apache y MySQL estén corriendo.
-  ## Instalar Node.js  
   Recuerden tener instalado Node.js Een sus computadoras ya que es necesario para compilar los activos frontend. Puedes descargarlo desde [NODEJS](https://nodejs.org/en/download/prebuilt-installer).
-   ## Clonar proyecto

    ```shell
    https://github.com/oscarfiscal/technical-test-ibague.git
    cd technical-test-ibague/
    ```

-   ## Instalar Paquetes en un solo workspace
    ```shell
    composer install
    ```
-   ## Generar la API KEY
    ```shell
    php artisan key:generate
    ```

-   ## Generar archivo .env

    ```shell
    copy .env.example .env
    ```

-   ## Ejecutar migraciones

    ```shell
    php artisan migrate
    ```

-   ## Correr el proyecto en local

    ```shell
    php artisan serve
    ```
 -   ## Correr frontend
   **Debes abrir una nueva terminal**

    ```shell
    npm run dev
    ```

    # Diagrama de la estructura de la base de datos
    # Explicación de las tablas:
    
    -  employees: firts_name,last_name,birth_date,email,phone,genre
    -  departments: name,description
   # Relaciones
   - La tabla employees tiene una relación de muchos a uno (Many-to-One) con la tabla departments. Esto significa que cada empleado pertenece a un solo departamento, pero un departamento puede tener muchos empleados. Esta relación se establece mediante la clave foránea department_id en la tabla employees, que hace referencia al campo id de la tabla departments.
