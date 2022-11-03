# Ejercicio 27/oct

* modifique la variable .env
  * puede copiar .env.example y modificar la base de datos
* corra el composer para que se cree la carpeta vendor.
  * composer install
* correr la migracion para que se creen las tablas.

Terminar el ejercicio:

* agregando una página para insertar y listar productos. 
  * No olvide agregar en el log la operacion de insertar, por lo tanto, la operacion insertar debe ser transaccional
* Agregar una página para generar venta de producto (reduccion de stock), considerando que:
  * el producto debe existir
  * el producto tiene que tener stock suficiente para la venta.
  * debe agregar en el log la operacion de la venta.
  * Todo esto hagalo dentro de una transaccion.

# Ejercicio 3/Nov

* En el proyecto anterior, modifique las páginas para que usen un dto.
* Por lo tanto, cree lo siguiente
  * Un dto que implemente las interfaces de json y jsonserializable
  * una clase de servicio para dto, para poder crear los dtos con sus datos.
  * Modifique el controlador y las vistas para enviar solo los dtos.
