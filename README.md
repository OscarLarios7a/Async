Async Framework for PHP
<p align="center">
  <a href="#">
    <img src="https://scontent-dfw5-1.xx.fbcdn.net/v/t1.0-9/35400621_270511213518991_3486364755348684800_n.png?_nc_cat=0&oh=3676b6f45c264b416e1930be3b3d41a4&oe=5BBCE836" style="border-radius: 100%;" alt="wearecode">
  </a>
</p class="center">
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
<h1>Instanciar Async</h1>
Antes de efectuar las consultas tienes que ligar el archivo <i>Async.class.php</i>, después tienes que instanciar la clase <i>query()</i>
<code>
  <pre>
    include 'Async/Async.class.php';
    $var = new query();
  </pre>
</code>
