API DEL SISTEMA WEB EAGLE PARAGLIDING.

En esta API se logra poder para obtener datos o generar operaciones sobre los productos registrados en el sistema web Eagle Paragliding. 
Los pricipales metodos y recursos a utilizar en la URL para la API son los siguientes:

• Metodo GET:

   METODO	      URL	         	                    RESPUESTA

    GET	      /gliders	   	            Lista de todos los parapentes en venta.
    GET	      /glider/:ID	            Se muestra parapente seleccionado por id.
    GET	      /gliders/:ID/comment 	    Se mostraran comentarios de usuarios que compraron      
                                        articulo seleccionado.

• Metodo POST:

    POST      /gliders                  Se creara un nuevo producto pero previamente se 
                                        deben completar los datos del parapente a agregar.

• Metodo DELETE:

    DELETE   /gliders/:ID               El producto seleccionado por id se eliminara del sistema.


• Filtrado por categoria:

Para poder hacer un filtrado de los productos por categorias se debe agregar el siguiente parametro a la solicitud de GET y luego escribir la categoria por la que se quiere filtrar los productos registrados:
    
                            /gliders?category=categoria

• Paginacion:

Para poder realizar la paginacion se deben agregar los siguientes parametros de consulta a las solicitudes GET y se deben agregar la cantidad por el cual se quieren mostrar los productos.

                            /gliders?start=1&end=5

Nota: En el caso de que seleccione un valor mayor a la cantidad de productos registrados en el sistema se mostraran todos los parapentes existentes en el sitio web.

• Ordenamiento:

Para poder llevar a cabo el ordenamiento de los parapentes del sitio se deben agregar los siguientes paramentros de consulta a las solicitudes GET:

                            /gliders?sort=precio&order=ASC o DESC

Nota: Se podra elegir cualquier campo de los productos (id, nombre del parapente, descripcion, difficultad, precio o categoria), en el caso de strings se ordenara alfabeticamente. La eleccion de realizarlo de manera ascendente o descendente es de libre eleccion.