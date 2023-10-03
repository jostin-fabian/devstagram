# Devstagram

**Devstagram** es una plataforma de redes sociales diseñada específicamente para desarrolladores y entusiastas de la tecnología. Con Devstagram, puedes conectar con otros profesionales de la programación, compartir tus proyectos, obtener retroalimentación valiosa y estar al tanto de las últimas tendencias en el mundo de la tecnología.

## Características principales

- **Perfiles de desarrollador**: Crea un perfil único que destaque tus habilidades, experiencia y proyectos pasados. Agrega una foto de perfil y una breve biografía para que otros desarrolladores te conozcan mejor.

- **Publicación de proyectos**: Comparte tus proyectos personales y colaborativos. Publica detalles sobre tu proyecto, comparte código fuente, capturas de pantalla y enlaces a repositorios de GitHub.

- **Interacción social**: Da "me gusta" a las publicaciones de otros desarrolladores, comenta y comparte tus proyectos favoritos. Fomenta la interacción y la retroalimentación constructiva.

- **Búsqueda de desarrolladores y proyectos**: Encuentra otros desarrolladores por habilidades, tecnologías o proyectos. Explora proyectos interesantes y únete a conversaciones relevantes.
  
## Requisitos

Para utilizar Devstagram en tu entorno de desarrollo, necesitas tener instalados los siguientes componentes:

- **PHP >= 7.x**: El lenguaje de programación en el que está construido Laravel, el marco en el que se basa Devstagram.

- **Composer**: La herramienta de gestión de dependencias de PHP para instalar las bibliotecas requeridas.

- **MySQL**: Un sistema de gestión de bases de datos relacional. Asegúrate de tener una base de datos configurada.

## Instalación

1. Clona el repositorio:

   ```bash
   git clone https://github.com/jostin-fabian/devstagram.git
   ```
2. Instala las dependencias:
   ```bash
   cd devstagram
   composer install
   ```

3. Copia el archivo de configuración:
    ```bash
   cp .env.example .env
   ```
4. Configura tu entorno en el archivo .env. Asegúrate de establecer los valores adecuados para la base de datos 
  
5. Genera la clave de la aplicación:
    ```bash
        cp .env.example .env
   ```
6. Ejecuta las migraciones y las semillas (si las tienes):
    ```bash
    php artisan migrate --seed
   ```
7. Visita http://127.0.0.1:8000

