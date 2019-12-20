<h1>Cursos Matriculados</h1>
  <div class="row depth-1 m-padding">
    <table class="col-md-12">
      <thead>
        <tr>
          <th>Codigo</th>
          <th>Nombre</th>
          <th>Descripcion</th>
          <th></th>
        </tr>
      </thead>
      <tbody class="zebra">
        {{foreach cursosPersona}}
        <tr>
          <td class="center">{{course_cod}}</td>
          <td class="center">{{course_name}}</td>
          <td class="center">{{course_desc}}</td>
          <td class="center">
            <a href="index.php?page=curso_usuario&usrcod={{user_cod}}&coursecod={{course_cod}}">Iniciar</a>
          </td>
        </tr>
        {{endfor cursosPersona}}
      </tbody>
    </table>
  </div>