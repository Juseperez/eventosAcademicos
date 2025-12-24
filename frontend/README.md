# Eventos Académicos - Frontend Dinámico

Una aplicación web moderna para visualizar eventos académicos de forma dinámica usando JavaScript.

## 🚀 Características

### ✨ Interfaz Moderna
- **Diseño responsivo** con Bootstrap 5
- **Animaciones CSS** para transiciones suaves
- **Gradientes y efectos blur** para un look moderno
- **Tarjetas interactivas** con hover effects

### 🔍 Funcionalidades de Búsqueda
- **Búsqueda en tiempo real** por nombre, descripción o lugar
- **Filtro por fecha** específica
- **Filtro por categorías** con botones interactivos
- **Ordenamiento** por fecha, nombre o categoría

### ⭐ Sistema de Favoritos
- **Marcar/desmarcar favoritos** con un clic
- **Persistencia local** usando localStorage
- **Contador de favoritos** en tiempo real
- **Indicador visual** en las tarjetas

### 📊 Estadísticas Dinámicas
- **Total de eventos**
- **Número de favoritos**
- **Cantidad de categorías**
- **Eventos para hoy**

### 🎭 Animaciones y UX
- **Animaciones de entrada** escalonadas para las tarjetas
- **Estados de carga** con spinner
- **Estado vacío** cuando no hay resultados
- **Notificaciones toast** para feedback
- **Transiciones suaves** en todos los elementos

## 🛠️ Tecnologías Utilizadas

- **HTML5** - Estructura semántica
- **CSS3** - Animaciones y estilos modernos
- **JavaScript (ES6+)** - Lógica de la aplicación
- **Bootstrap 5** - Framework CSS responsivo
- **Font Awesome** - Iconos vectoriales
- **Fetch API** - Peticiones HTTP asincrónicas

## 📁 Estructura del Proyecto

```
frontend/
├── index.html          # Archivo principal
└── README.md          # Esta documentación
```

## 🚀 Cómo Usar

### 1. **Iniciar el Backend**
Primero, asegúrate de que tu backend de Laravel esté corriendo:

```bash
cd backend
php artisan serve --host=0.0.0.0 --port=8000
```

### 2. **Abrir el Frontend**
Abre el archivo `frontend/index.html` en tu navegador web.

### 3. **Configurar la API**
Si tu API está en una URL diferente, modifica la línea 265 en `index.html`:

```javascript
const response = await fetch('http://localhost:8000/api/eventos');
```

Cambia `http://localhost:8000` por la URL de tu API.

## 🎯 Funcionalidades Detalladas

### Búsqueda y Filtrado
- **Búsqueda global**: Escribe en el campo de búsqueda para filtrar por cualquier campo
- **Filtro por fecha**: Selecciona una fecha específica en el calendario
- **Filtro por categoría**: Haz clic en los botones de categoría para activar/desactivar filtros
- **Ordenamiento**: Selecciona el criterio de ordenamiento en el dropdown

### Sistema de Favoritos
- **Agregar/Quitar**: Haz clic en el corazón de cada tarjeta
- **Persistencia**: Los favoritos se guardan automáticamente en el navegador
- **Indicador visual**: Los favoritos tienen el corazón rojo
- **Contador**: Se actualiza en tiempo real en la barra de navegación

### Animaciones
- **Entrada escalonada**: Las tarjetas aparecen con delay progresivo
- **Hover effects**: Las tarjetas se elevan al pasar el mouse
- **Transiciones**: Todos los cambios tienen animaciones suaves
- **Loading states**: Spinner mientras carga la información

## 🔧 Personalización

### Cambiar Colores de Categorías
En la función `getBadgeColor()`, puedes agregar más categorías:

```javascript
getBadgeColor(categoria) {
    const colores = {
        'Matemáticas': '#FF6B6B',
        'Física': '#4ECDC4',
        'Informática': '#45B7D1',
        'Química': '#FFA07A',        // Nueva categoría
        'default': '#667eea'
    };
    return colores[categoria] || colores.default;
}
```

### Modificar la API
Si necesitas cambiar los endpoints o agregar autenticación:

```javascript
async cargarEventos() {
    const headers = {
        'Authorization': 'Bearer ' + token,  // Si necesitas auth
        'Content-Type': 'application/json'
    };

    const response = await fetch('http://tu-api.com/api/eventos', {
        headers: headers
    });
}
```

### Agregar Más Funcionalidades
El código está modularizado, puedes agregar fácilmente:
- **Paginación**
- **Modal de detalles**
- **Formulario de creación**
- **Autenticación de usuarios**
- **Sincronización con backend**

## 🌐 Compatibilidad

- ✅ Chrome 70+
- ✅ Firefox 65+
- ✅ Safari 12+
- ✅ Edge 79+
- ✅ Navegadores móviles modernos

## 📱 Responsive Design

La aplicación es completamente responsiva:
- **Desktop**: 4 columnas de tarjetas
- **Tablet**: 2 columnas
- **Mobile**: 1 columna

## 🔒 Seguridad

- **CORS**: Configurado para permitir peticiones desde el frontend
- **Input sanitization**: Los datos se validan antes de mostrar
- **XSS protection**: El contenido HTML se escapa automáticamente

## 🚀 Próximos Pasos

1. **Integrar con backend real** - Conectar con tu API de Laravel
2. **Agregar autenticación** - Login/register de usuarios
3. **Implementar paginación** - Para muchos eventos
4. **Agregar calendario** - Vista de calendario mensual
5. **Push notifications** - Notificaciones de nuevos eventos
6. **Offline support** - Service workers para modo offline

## 📞 Soporte

Si tienes problemas o preguntas:
1. Verifica que el backend esté corriendo
2. Revisa la consola del navegador (F12) para errores
3. Asegúrate de que la URL de la API sea correcta
4. Verifica que no haya problemas de CORS

---

**¡Disfruta visualizando tus eventos académicos de forma dinámica! 🎓✨**