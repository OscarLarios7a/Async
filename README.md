Async Framework for PHP
<center>
  <img src="https://scontent-dfw5-1.xx.fbcdn.net/v/t1.0-9/30741574_247992855770827_1387732786927894528_n.png?_nc_cat=0&oh=eeba211f8506d79c91b722f80d9a9fc5&oe=5BA6FE29" style="border-radius: 100%;" alt="wearecode">
</center>
© 2018 Async, WeareCode
<hr>
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
<h1>Primeras consultas</h1>
Antes de effectuar las consultas tienes que ligar el archivo <i>Async.class.php</i>, depues tienes que instanciar la clase <i>query()</i>
<code>
  <pre>
    $var = new query();
  </pre>
</code>
