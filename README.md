<p align="center">
  <a href="#">
    <img src="https://scontent-dfw5-1.xx.fbcdn.net/v/t1.0-9/35400621_270511213518991_3486364755348684800_n.png?_nc_cat=0&oh=3676b6f45c264b416e1930be3b3d41a4&oe=5BBCE836" style="border-radius: 100%;" alt="wearecode">
  </a>
</p>
<h1>Instalación</h1>
Lo primero que tienes que hacer es editar el archivo <i>install.php</i>, sustituye todos los valores de las constantes.
<code>
  <pre>
    const DB_URL  = 'localhost'; // dirección en donde se encuentra la base de datos
    const DB_USER = 'root'; // Nombre de usuario para poder entrar a Mysql
    const DB_PASS = ''; // Contraseña para acceder a Mysql
    const DB_NAME = 'db_wac';// Nombre que le asignaste a la base de datos	
  </pre>
</code>
<hr>
<h1>Instanciar Async</h1>
Antes de efectuar las consultas tienes que ligar el archivo <i>Async.class.php</i>, después tienes que instanciar la clase <i>query()</i>
<code>
  <pre>
    include 'Async/Async.class.php';
    $var = new query();
  </pre>
</code>
<h1>Primeras consultas</h1>
Antes de iniciar una consulta debes agregar el metodo <code>to('tabla')</code> en el cual se agrega el nombre de la tabla.
<pre>
  include 'Async/Async.class.php';
  $var = new query();
  $var->to('mi_tabla');
</pre>
<h1>edit()</h1>
<i>UPDATE</i><br />
Despues de a ver agregado ese metodo se puede agregar la consulta, ejemplos de consultas:<br>
<pre>
  include 'Async/Async.class.php';
  $var = new query();
  $var->to('mi_tabla');
  $var->edit(['param'=>'value'])// editar el valor 'param' por el valor de value
</pre>
<h1>push()</h1>
<i>INSERT INTO</i><br />
Para agregar un dato a una tabla usamos el metodo: push()
<pre>
  include 'Async/Async.class.php';
  $var = new query();
  $var->to('mi_tabla');
  $var->push(['param' => 'value']);// agrega a la tabla los objetos ingresado al array      
</pre>
<h1>clean()</h1>
<i>DELETE FROM</i><br />
En el caso de <code>clean()</code> y de <code>get()</code> es diferente ya que se le puede dar condiciones, por ejemplo:
<pre>
  include 'Async/Async.class.php';
  $var = new query();
  $var->to('mi_tabla');
  $var->when(['Id'=>'3'])// cuando 'Id' sea igual a 3, si deseas usar condiconales agrega un argumento despues del array
  // $var->when(['Id'=>'3'], '>') o cuando 'Id' sea mayor a 3,  condicionales aceptadas '=' viene por defecto, '>', '<' , '!=', '>=', '<='
  $var->clean();// borra los datos de la tabla metodos ha antecolocar -> when(['param'=>'value'], '='), when_no(['param'=>'value'], '>'), and(['param'=>'value'], '<'), or(['param'=>'value'], '<')
</pre>
Si se coloca de <code>clean()</code> sin anteponer una condición, la tabla se vaciara por completo.
<h1>get()</h1>
<i>SELECT * FROM</i><br />
Para hacer un get() se tiene que usar condiciones por ejemplo:
<ul>
   	<li>seleccionar cuando (WHERE) -> when(array, condition) 'campo' => 'valor', condition = >, <, <>, <=, >=, = </li>
	<li>seleccionar cuando (WHERE NOT) -> when_no(array) 'campo' => 'valor'</li>
	<li>and-> and(array, condition)</li>
	<li>or-> or(array, condition)</li>
	<li>seleccionar hasta (LIMIT) -> limit(int) 'from, to'</li>
	<li>ordenar (ORDER BY) -> order(param,string) 'ASC', 'DESC', 'RAND()''</li>
	<li>contiene (LIKE %i%) ->like(array) 'campo' => 'valor'</li>
	<li>entre dos (BETWEEN) ->middle(value, value)</li>
</ul>
<pre>
	// se le asignara a $result el valor obtenido de get(), el cual regresa todos los valores de la tabla
	$var = new query();
  	$var->to('mi_tabla');  	
	$result = $var->get();
</pre>
<h3>Usando when()</h3>
Para usar when() debes colocar un array con la columna y el valor a buscar, por ejemplo:
<pre>
	// esto retornara el registro que sea igual 3 de la columna 'Id'
	$var = new query();
  	$var->to('mi_tabla');
	$var->when(['Id'=>'3']);
	$result = $var->get();
</pre>
para regresar columnas mayor, menor, diferente usa:
<pre>
	// esto retornara el registro que sea mayor de 3 de la columna 'Id'
	$var = new query();
  	$var->to('mi_tabla');
	$var->when(['Id'=>'3'], '>');
	$result = $var->get();
</pre>
<pre>
	// esto retornara el registro que sea menor de 3 de la columna 'Id'
	$var = new query();
  	$var->to('mi_tabla');
	$var->when(['Id'=>'3'], '<');
	$result = $var->get();
</pre>
<pre>
	// esto retornara el registro que sea diferente de 3 de la columna 'Id'
	$var = new query();
  	$var->to('mi_tabla');
	$var->when(['Id'=>'3'], '!=');
	$result = $var->get();
</pre>	
Y si quieres solo regresar toda la columna coloca solo el nombre de la columna entre comillas:
<pre>
	// esto retornara el registro 3 de la columna 'Id?
	$var = new query();
  	$var->to('mi_tabla');
	$var->when('Id');
	$result = $var->get();
</pre>

<h3>Usando when_no()</h3>
Para usar when_no() debes colocar un array con la columna y el valor a buscar, por ejemplo:
<pre>
	// esto retornara el registro que no sea igual 3 de la columna 'Id'
	$var = new query();
  	$var->to('mi_tabla');
	$var->when_no(['Id'=>'3']);
	$result = $var->get();
</pre>
para regresar columnas que no sean mayor, menor, diferente usa:
<pre>
	// esto retornara el registro que no sea mayor de 3 de la columna 'Id'
	$var = new query();
  	$var->to('mi_tabla');
	$var->when_no(['Id'=>'3'], '>');
	$result = $var->get();
</pre>
<pre>
	// esto retornara el registro que no sea menor de 3 de la columna 'Id'
	$var = new query();
  	$var->to('mi_tabla');
	$var->when_no(['Id'=>'3'], '<');
	$result = $var->get();
</pre>
<pre>
	// esto retornara el registro que no sea diferente de 3 de la columna 'Id'
	$var = new query();
  	$var->to('mi_tabla');
	$var->when_no(['Id'=>'3'], '!=');
	$result = $var->get();
</pre>	
<h3>Usando and()</h3>
Para poder usar el and() antes de llamarlo debes llamar a when() o a when_no() para poder invocarlo, ejemplo:
<pre>
	// esto retornara el registro que tenga el 'Id' = 3 y el 'Nombre' = 3
	$var = new query();
  	$var->to('mi_tabla');
	$var->when(['Id'=>'3']);
	$var->and(['Nombre'=>'josue']);
	$result = $var->get();
</pre>
