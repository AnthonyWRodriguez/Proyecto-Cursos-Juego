<section>
  <h1>Simple PHP MVC</h1>
</section>
<section>
  <h2>Seguridad</h2>
  <div>
    <ul>
      {{if rol1}}
        <li><a href="index.php?page=users">Usuarios</a></li>
        <li><a href="index.php?page=roles">Roles</a></li>
        <li><a href="index.php?page=programas">Funciones</a></li>
      {{endif rol1}}
      {{if rol2}}
        <li><a href="index.php?page=user&usrcod={{userCode}}&mode=UPD">Modificar Usuario</a></li>
      {{endif rol2}}
      <li><a href="index.php?page=todos_cursos">Todos los Cursos</a></li>
      <li><a href="index.php?page=cursos_usuario&usrcod={{userCode}}">Cursos Matriculados</a></li>
    </ul>
  </div>
</section>
