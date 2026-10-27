
# Plan de pruebas - Tablón de anuncios

## Objetivo

Comprobar manualmente que las principales funcionalidades
de la aplicación funcionan correctamente.

Los casos de prueba se han generado con ayuda de IA
y se ejecutarán manualmente.

## Pruebas de autenticación

### Prueba 1. Registro correcto
- Acción: Registrar un usuario con datos válidos.
- Resultado esperado: Se guarda en MySQL y redirige al login.
- Resultado obtenido: Pendiente.
- Estado: Pendiente.

### Prueba 2. Registro con email repetido
- Acción: Registrar un usuario con un email existente.
- Resultado esperado: Muestra un mensaje de error.
- Resultado obtenido: Pendiente.
- Estado: Pendiente.

### Prueba 3. Login correcto
- Acción: Iniciar sesión con credenciales válidas.
- Resultado esperado: Muestra el email del usuario.
- Resultado obtenido: Pendiente.
- Estado: Pendiente.

### Prueba 4. Login incorrecto
- Acción: Iniciar sesión con una contraseña incorrecta.
- Resultado esperado: No inicia sesión y muestra un error.
- Resultado obtenido: Pendiente.
- Estado: Pendiente.

### Prueba 5. Cerrar sesión
- Acción: Pulsar el botón Cerrar sesión.
- Resultado esperado: Se cierra la sesión.
- Resultado obtenido: Pendiente.
- Estado: Pendiente.

## Pruebas de publicaciones

### Prueba 6. Crear publicación
- Acción: Crear una publicación con datos válidos.
- Resultado esperado: Aparece en el listado y en MySQL.
- Resultado obtenido: Pendiente.
- Estado: Pendiente.

### Prueba 7. Crear sin iniciar sesión
- Acción: Acceder al formulario sin sesión.
- Resultado esperado: Redirige al login.
- Resultado obtenido: Pendiente.
- Estado: Pendiente.

### Prueba 8. Editar publicación propia
- Acción: Modificar una publicación del usuario conectado.
- Resultado esperado: Guarda los cambios.
- Resultado obtenido: Pendiente.
- Estado: Pendiente.

### Prueba 9. Editar publicación ajena
- Acción: Intentar editar una publicación de otro usuario.
- Resultado esperado: Devuelve error 403.
- Resultado obtenido: Pendiente.
- Estado: Pendiente.

### Prueba 10. Eliminar publicación propia
- Acción: Eliminar una publicación del usuario conectado.
- Resultado esperado: Desaparece del listado y MySQL.
- Resultado obtenido: Pendiente.
- Estado: Pendiente.

### Prueba 11. Eliminar publicación ajena
- Acción: Intentar eliminar mediante POST una publicación ajena.
- Resultado esperado: Devuelve error 403 y no elimina nada.
- Resultado obtenido: Pendiente.
- Estado: Pendiente.

### Prueba 12. Buscar publicaciones
- Acción: Buscar una publicación por título o categoría.
- Resultado esperado: Solo aparecen las coincidencias.
- Resultado obtenido: Pendiente.
- Estado: Pendiente.

## Pruebas de comentarios

### Prueba 13. Añadir comentario
- Acción: Comentar una publicación con sesión iniciada.
- Resultado esperado: El comentario se guarda y aparece.
- Resultado obtenido: Pendiente.
- Estado: Pendiente.

### Prueba 14. Comentar sin sesión
- Acción: Intentar comentar sin iniciar sesión.
- Resultado esperado: Se impide la publicación del comentario.
- Resultado obtenido: Pendiente.
- Estado: Pendiente.

## Pruebas de seguridad

### Prueba 15. Token CSRF incorrecto
- Acción: Enviar un formulario POST con token incorrecto.
- Resultado esperado: Error 403 y no modifica la BD.
- Resultado obtenido: Pendiente.
- Estado: Pendiente.

### Prueba 16. Formulario vacío
- Acción: Enviar una publicación sin título o contenido.
- Resultado esperado: No permite guardar la publicación.
- Resultado obtenido: Pendiente.
- Estado: Pendiente.

### Prueba 17. Contenido HTML
- Acción: Crear una publicación con etiquetas HTML.
- Resultado esperado: Se muestran como texto, sin ejecutarse.
- Resultado obtenido: Pendiente.
- Estado: Pendiente.
