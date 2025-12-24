# Comandos para Probar Funciones de Eventos

## Búsqueda de Eventos
Usa el comando `test:search-eventos` para filtrar eventos.

### Ejemplos:
- Buscar por categoría: `php artisan test:search-eventos --categoria=Ciencias`
- Buscar por fecha exacta: `php artisan test:search-eventos --fecha=2025-12-25`
- Buscar por rango de fechas: `php artisan test:search-eventos --fecha-from=2025-12-26 --fecha-to=2025-12-28`
- Ver todos: `php artisan test:search-eventos`

## Actualización de Eventos
Usa el comando `test:update-evento` para actualizar un evento.

### Ejemplos:
- Cambiar nombre: `php artisan test:update-evento 1 --nombre="Nuevo Nombre"`
- Cambiar fecha: `php artisan test:update-evento 1 --fecha=2025-12-30`
- Cambiar lugar: `php artisan test:update-evento 1 --lugar="Nuevo Lugar"`
- Cambiar categoría: `php artisan test:update-evento 1 --categoria=NuevaCategoria`
- Cambiar descripción: `php artisan test:update-evento 1 --descripcion="Nueva descripción"`

Puedes combinar opciones para actualizar múltiples campos a la vez.