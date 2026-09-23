# CRUD de nombres con Laravel y MongoDB

Proyecto de César Meza Corella, ITMA II. Docente: Aquino Segura Roldán.

Aplicación web para crear, consultar, editar y eliminar nombres. Los registros se guardan en la colección `nombres` de MongoDB. Incluye validación, formularios con CSRF, escape de HTML y pruebas contra MongoDB real.

- [Código fuente](https://github.com/YvnPretty/cru-laravelpapuxd)
- [Informe paso a paso con portada y capturas](Informe_CRUD_Laravel_MongoDB_Cesar_Meza_Corella.pdf)

## Requisitos

Entorno verificado: PHP 8.5.4 con la extensión `mongodb`, Composer, Laravel 13.33.0, MongoDB 7.0.43 y `mongodb/laravel-mongodb` 5.11.0. Composer verifica las restricciones exactas de PHP y extensiones al instalar.

```bash
php --ri mongodb
git clone https://github.com/YvnPretty/cru-laravelpapuxd.git
cd cru-laravelpapuxd
composer install
cp .env.example .env
php artisan key:generate
```

## MongoDB local

Si no tienes un servidor en el puerto 27017, puedes crear uno con Docker:

```bash
docker run -d --name mongo-crud \
  -p 127.0.0.1:27017:27017 \
  -v mongo_crud_data:/data/db mongo:7
```

En ejecuciones posteriores usa `docker start mongo-crud`. Si ya cuentas con MongoDB, utiliza su conexión y no crees otro contenedor en el mismo puerto. En el equipo de la práctica se reutilizó `mongo-laravel7`.

Configura `.env`:

```dotenv
DB_CONNECTION=mongodb
DB_URI=mongodb://127.0.0.1:27017
DB_DATABASE=crud_nombres
SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync
```

```bash
php artisan config:clear
php artisan serve --host=127.0.0.1 --port=8000
```

Abre la dirección que imprime Artisan. El listado está en `/` y `/nombres`. Este CRUD crea la colección al insertar el primer documento; no requiere las migraciones SQL heredadas del proyecto original. Las vistas usan estilos integrados y no necesitan compilar Vite para funcionar.

## Uso

1. Abre **Crear nombre**, escribe un nombre y pulsa **Guardar**.
2. Consulta el detalle o vuelve al listado para seleccionar un registro.
3. Pulsa **Editar**, cambia el nombre y guarda.
4. Pulsa **Eliminar** desde el detalle para borrar el registro.

El nombre es obligatorio, de tipo texto y tiene un máximo de 255 caracteres. Los registros inexistentes responden con 404. Es una aplicación de práctica local sin autenticación ni permisos por usuario.

## Archivos principales

- `config/database.php`: conexión MongoDB mediante `DB_URI` y `DB_DATABASE`.
- `app/Models/Nombre.php`: modelo MongoDB y colección `nombres`.
- `app/Http/Controllers/NombreController.php`: operaciones CRUD y validación.
- `routes/web.php`: siete rutas del recurso y página inicial.
- `resources/views`: listado, formularios y detalle.
- `tests/Feature/NombreCrudTest.php`: persistencia, validación y escape de HTML.

## Verificación

Con MongoDB iniciado:

```bash
php artisan test --compact
vendor/bin/pint --dirty --format agent
composer validate --no-check-publish
```

Resultado verificado: **5 pruebas aprobadas, 46 aserciones**. Cada prueba usa una base `crud_nombres_test_` con un sufijo único y la elimina al terminar, sin tocar la base del proyecto. El servidor indicado por `DB_URI` debe permitir crear y eliminar esas bases de prueba.

También se verificó en el navegador el recorrido crear → consultar → editar → eliminar. El registro de demostración se eliminó al finalizar.

## Archivos privados

`.env`, `vendor`, `node_modules` y los registros están excluidos de Git. No agregues tokens ni credenciales al repositorio. `.env.example` contiene únicamente valores de ejemplo para desarrollo local.
