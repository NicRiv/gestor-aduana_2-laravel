# Gestor de Aduanas

_versión: 1.2_

Admin puede crear usuarios y roles personalizados
* Componentes: Http/livewire/roles , ../usuarios
* Blade: views/livewire/roles , ../usuarios

---

* Todos los formularios funcionan.
* Los botones grises que dicen "Lista" no funcionan.
* Falta agregar funcion (Modal) para ver registro especifico dentro de las tablas.
* Roles: Admin, Cliente (Éste último no puede ingresar a las rutas de administración, ni crear registros).
* Hay tablas vinculadas para los formularios.
* Falta agregar "Control de impresiones" y "Audit Trail"
* Tengo que agregar clases css para tailwind y así reducir codigo, y estandarizar
* El menú tal vez pase a topbar (o navigation-menu)
* Tengo que ver si puedo crear componentes de Blade para reducir codigo, y separarlo

---

### Dashboard

Aún sin cargar

![Dashboard](public/screenshots/dashboard.png)

### Gestion Aduanas

Falta la parte (ingresos, egresos, anulados), los botones para editar, y el hacer click en un registro especifico
(ésto último falta en todas las tablas).

![Gestion aduanas](public/screenshots/gestion-aduanas.png)

Formulario:
Las opciones estan vinculadas a otras tablas.

![Gestion aduanas form](public/screenshots/gestion-aduana-form.png)

### Materiales / Productos

El botón "Lista" no funciona

![Materiales](public/screenshots/materiales.png)

Formulario:

![Materiales form](public/screenshots/materiales-form.png)

### Depósitos

![Depositos](public/screenshots/depositos.png)

Formulario:

![Depositos form](public/screenshots/depositos-form.png)

### Áreas

![Areas](public/screenshots/areas.png)

Form:

![Areas form](public/screenshots/areas-form.png)

### Ubicaciones

![Ubicaciones](public/screenshots/ubicaciones.png)

Form:

![ubicaciones form](public/screenshots/ubicaciones-form.png)

### Condiciones Ambientales

![Condiciones ambientales](public/screenshots/condiciones.png)

Form: 

![Condiciones ambientales form](public/screenshots/condiciones-form.png)

### Unidades Logísticas

![Unidades](public/screenshots/unidades.png)

Form:

![unidades form](public/screenshots/unidades-form.png)

### Divisiones

![Divisiones](public/screenshots/divisiones.png)

Form:

![divisiones form](public/screenshots/divisiones-form.png)

### Tipo Ingresos / Egresos

![tipo ingreso egreso](public/screenshots/tipo-ing-egr.png)

Form:

![tipo ing egr form](public/screenshots/tipo-ing-egr-form.png)

### Usuarios

Admin: admin@mail.com, contraseña: password
Cliente: nico@mail.com, contraseña: password

![usuarios](public/screenshots/usuarios.png)

Form:

![usuarios](public/screenshots/usuarios-form.png)

### Roles

![Roles](public/screenshots/roles.png)

Form:

![Roles form](public/screenshots/roles-form.png)

### Control impresiones

Todavía no creado

### Audit Trail

Todavía no creado