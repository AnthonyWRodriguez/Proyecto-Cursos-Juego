<h1>
  Gestión de Usuarios
</h1>
<!--
Esta es la busqueda copiada de usuarios y los busca por correo

<div class="row depth-1 m-padding">
  <form action="index.php?page=users" method="post" class="col-md-8 col-offset-2">
      <div class="row s-padding">
        <label class="col-md-1" for="fltEmail">Correo:&nbsp;</label>
        <input type="email" name="fltEmail"  class="col-md-8"
              id="fltEmail" placeholder="correo@electron.ico" value="{{fltEmail}}" />
        <button class="col-md-3" id="btnFiltro"><span class="ion-refresh">&nbsp;Actualizar</span></button>
      </div>
  </form>
</div>
-->
  
  <table class="col-md-12">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th class="sd-hide">Costo</th>
        <th></th>
      </tr>
    </thead>
    <tbody class="zebra">
      {{foreach BDD}}
      <tr>
        <td>{{nom}}</td>
        <td>{{desc}}</td>
        <td class="sd-hide">{{costo}}</td>
      </tr>
      {{endfor BDD}}
    </tbody>