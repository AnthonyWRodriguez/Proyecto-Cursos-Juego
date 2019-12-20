<h1>Cursos Disponibles</h1>
<form action="index.php?page=todos_cursos" method="post">
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
        {{foreach totalCursos}}
        <tr>
          <td class="center">{{course_cod}}</td>
          <td class="center">{{course_name}}</td>
          <td class="center">{{course_desc}}</td>
          <td class="center">
            <button id="btnMatricular{{course_cod}}" name="btnMatricular{{course_cod}}">Matricular</button>
          </td>
        </tr>
        {{endfor totalCursos}}
      </tbody>
    </table>
  </div>
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
        {{foreach matriculadosNom}}
        <tr>
          <td class="center">{{course_cod}}</td>
          <td class="center">{{course_name}}</td>
          <td class="center">{{course_desc}}</td>
          <td class="center">
            <button id="btnRetirar{{course_cod}}" name="btnRetirar{{course_cod}}">Retirar</button>  
          </td>
        </tr>
        {{endfor matriculadosNom}}
      </tbody>
    </table>
  </div>

</form>
