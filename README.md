# Devstagram

Devstagram es una app similar a Instagram pero específica para desarrolladores. Con Devstagram puedes:

- Autenticar usuarios con Brazze
- Crear publicaciones con código o imágenes
- Mostrar las publicaciones de los desarrolladores que sigues
- Dar me gusta o comentar las publicaciones que te gustan
- Seguir o dejar de seguir a otros desarrolladores

Devstagram está desarrollada con el framework Laravel, que permite crear aplicaciones web de forma rápida y elegante.

## Requisitos

Para usar Devstagram necesitas tener instalado lo siguiente:

- PHP >= 7.3
- Composer
- MySQL
- Node.js
- NPM

## Instalación

Para instalar Devstagram sigue estos pasos:

1. Clona el repositorio de GitHub:

```bash
git clone https://github.com/jostin-fabian/devstagram.git
```
2.Entra en la carpeta del proyecto:

```bash
cd devstagram
```
3. Instala las dependencias de Composer:

```bash
composer install
```
4. Instala las dependencias de NPM:

```bash
npm install
```
5. Crea un archivo .env a partir del archivo .env.example:

```bash
cp .env.example .env
```
6. Genera una nueva clave para la aplicación:

```bash
php artisan key:generate
```
7. Crea una base de datos para la aplicación y configura las credenciales de acceso en el archivo .env:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=devstagram
DB_USERNAME=root
DB_PASSWORD=
```
8. Ejecuta las migraciones y los seeders para crear y poblar las tablas de la base de datos:

```bash
php artisan migrate --seed
```
9. Ejecuta el servidor de desarrollo:

```bash
php artisan serve
```
10. Visita http://localhost:8000 en tu navegador para ver la aplicación.

# Uso
Para usar Devstagram necesitas crear una cuenta o autenticarte con Brazze. Una vez dentro de la aplicación puedes crear publicaciones, seguir a otros desarrolladores, dar me gusta o comentar las publicaciones de otros desarrolladores.
- Para crear una publicación haz clic en el botón "Create" y rellena el formulario.
- Para seguir a otros desarrolladores haz clic en el botón "Follow" que aparece en la página de perfil de cada desarrollador.
- Para dar me gusta a una publicación haz clic en el botón "Me gusta" que aparece en cada publicación.
- Para comentar una publicación haz clic en el botón "Comment" que aparece en cada publicación y rellena el formulario.
- Para dejar de seguir a un desarrollador haz clic en el botón "Dejar de seguir" que aparece en la página de perfil de cada desarrollador.
- Para cerrar sesión haz clic en el botón "CLOSE SESSION" que aparece en la página de perfil de cada desarrollador.

