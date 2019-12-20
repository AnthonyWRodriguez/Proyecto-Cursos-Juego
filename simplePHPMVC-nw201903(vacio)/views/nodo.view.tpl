<h1>Curso {{coursecod}}: {{coursename}} </h1>
<h2>Nodo {{nodecod}}: {{nodename}} ({{nodedesc}})</h2>
<br>


<form action="index.php?page=nodo&usrcod={{userCode}}&coursecod={{coursecod}}&nodecod={{nodecod}}" method="post">
    <p class="center">{{nodedialogue}}</p>
    <br>
    <h3 class="center">Para probar su habilidad y reafianzar su confianza en el conocimiento recien aprendido,</h3>
    <h3 class="center">se pide que escriba lo necesario para: {{nodedesc}}</h3>
    <div class="row s-padding">
      <textarea rows="3" cols="50" name="txtAnswer" id="txtAnswer"></textarea>
      <button id="btnConfirm" name="btnConfirm">Confirmar Respuesta</button>
    <div>
</form>



