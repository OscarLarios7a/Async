Este framework fue creado por Josué Hernández Gutiérrez integrante
Del equipo Alien System (C).

Está prohibida la alteración o copia de este framework, al igual que
Su distribución con fines de lucro.

Fue creado para developers backend, con la visión se hacer que las
Conexiones con sus bases de datos sean más fáciles y/o 
Entendibles, esto partiendo de una interfaz creada con POO.

Requerimientos:
  - PHP Mayor PHP 5.0.0
  - MySQL

Primer paso:
 *cambiar el contenido de las constantes que se encuentran en install.php
  Por los datos que describen tu DB.
  
  -	const DB_URL  = 'localhost';
  -	const DB_USER = 'root';
  -	const DB_PASS = ''; 
  -	const DB_NAME = 'db_wac';

Segundo paso:
 *instanciar la función query() en una variable
   
   - $var = new query()

Tercer paso:
 *cada que se quiera crear una consulta lo primero es acceder
  Al método $var->to('Nombre_de_la_tabla'), así es como asignaras el nombre 
  De la tabla.

Cuarto paso:
 *si tu consulta requiere algún método como 'LIKE', 'WHERE', ORDER BY, etc.
  Tienes que asignarlo después de a ver asignado el nombre de la tabla, ejemplo:

  - $var = new query();
  - $var->to('mi_tabla');
  - $var->when(['Id' => '3']);

  - Métodos que se pueden aplicar -
  	* and-> and(array, condition)
	* or-> or(array, condition)
	* seleccionar cuando (WHERE) -> when(['campo' => 'valor'], '<') 'campo' => 'valor', condition = >, <, <>, <=, >=, = 
	* seleccionar cuando (WHERE NOT) -> when_no(array) 'campo' => 'valor'
	* seleccionar hasta (LIMIT) -> limit(int) 'from, to'
	* ordenar (ORDER BY) -> order(string) 'ASC', 'DESC', 'RAND()''
	* contiene (LIKE %i%) ->like(array) 'campo' => 'valor'
	* entre dos (BETWEEN) ->middle(value, value)

Quinto paso:
 *asignar la consulta, $var->consulta, ejemplo
  
  - $var->get()

  - consultas que se pueden aplicar -
  	* insertar (INSERT INTO) -> push(array) 'campo' => 'valor'
	* seleccionar (SELECT * FROM) -> get()
	* borrar (DELETE FROM) ->clean(array) 'campo' => 'valor'
	* editar (UPDATE) ->edit(array) 'campo' => 'valor'

Consultas de ejemplo:
  
  Insertar un campo:

        include 'Async.class.php'; 
        $var = new query();
        $var->to('MI_TABLA');
        $var->push(['param_1' => 'value_2', 'param_2' => 'value_2'])

        *Lo que se hace con to('tabla') es colocar el nombre de la tabla a 
        Acceder, después colocamos el método push([array]) en el cual se colocan los datos a 
        Insertar, esto mediante un array por ejemplo:
          ['Id' => '1']
        Esto quiere decir que al campo 'Id' le vas a insertar el valor '1'.

  Seleccionar un campo:

      *selección por defecto '='
        include 'Async.class.php';
        $var = new query();
        $var->to('MI_TABLA');
        $var->when(['Id' => '1']);
        $row = $var->get();
        echo $row['name'];
        // Example*josue* //

        *WHERE (Id = '1')

      *Selección con condición'>'
        include 'Async.class.php';
        $var = new query();
        $var->to('MI_TABLA');
        $var->when(['Id' => '1'], '>');
        $row = $var->get();
        echo $row['name'];        

        *WHERE (Id > '1')

      * Incluir limit
        include 'Async.class.php';
        $var = new query();
        $var->to('MI_TABLA');
        $var->limit('0', 3);
        $sql = $var->get();
        while(row = $sql->fetch_assoc()){
          echo $row['name'];
        }

        *LIMIT (0, 3)

utl. edt. 16/06/2018 - 9:15 PM
