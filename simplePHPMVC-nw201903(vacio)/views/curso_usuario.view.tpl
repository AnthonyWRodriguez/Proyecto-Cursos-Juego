<h1>Curso {{cod}}: {{nom}}</h1>
<h2>Nodos:</h2>

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
        {{foreach nodos}}
        <tr>
          <td class="center">{{node_cod}}</td>
          <td class="center">{{node_name}}</td>
          <td class="center">{{node_desc}}</td>
          <td class="center">
            <a href="index.php?page=nodo&usrcod={{user_cod}}&coursecod={{course_cod}}&nodecod={{node_cod}}">Iniciar</a>
          </td>
        </tr>
        {{endfor nodos}}
      </tbody>
    </table>
  </div>