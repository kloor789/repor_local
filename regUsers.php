<?php 
  if (!isset($_SESSION['app_id'])) {
    header('location: ?view=close');
  }
 ?>
<?php include(HTML_DIR.'overall/header.php'); ?>
<?php include(HTML_DIR.'overall/sub-topnav.php'); ?>
  <div class="modo-user">
    <img src="<?php echo APP_VIEW . APPI; ?>image/trabajadores.png" alt="">
  </div>
<section class="cont-principal">
  <div>
    <button type="submit" onclick="return Modaldesplegar('visible')" class="boton-nuevo">Nuevo</button>
    <button type="submit" class="boton-excel"><span class="icon-printer"></span> Exportar Excel</button>
    <button type="submit" class="boton-pdf"><span class="icon-printer"></span> Exportar PDF</button>
  </div>
<div id="Modal">
    <div id="view-modal">
      <div class="close">
        <h1><span class="icon-user"></span> Modo de Registro de Usuario</h1>
        <a href="" onclick="return Modaldesplegar('hidden')" title="Cerrar">X</a>
      </div>
      <div role="form" class="fronte">
        <div>
          <input type="text" placeholder="  NOMBRE DEL USUARIO">
        </div>
        <div>
          <input type="text" placeholder="  APELLIDO DEL USUARIO">
        </div> 
        <div>
          <input type="text" placeholder="  DIRRECION DEL USUARIO">
        </div>
        <div>
          <input type="text" placeholder="  EMAIL DEL USUARIO">
        </div>
        <div>
          <input type="text" placeholder="  TELEFONO DEL USUARIO">
        </div>
        <div>
          <input type="text" placeholder="  EDAD DEL USUARIO">
        </div>
        <div>
          <input type="text" placeholder="  CIUDAD DEL USUARIO">
        </div>
        <div>
          <input type="text" placeholder="  SEXO DEL USUARIO">
        </div>
        <div>
          <input type="text" placeholder="  DNI DEL USUARIO">
        </div>
        <div>
          <select class="" name="">
              <option selected="" hidden="">SELECTIONAR CARGO</option>
              <?php echo Cargos(); ?>
          </select>
        </div>
        <div id="btn-guardar">
          <button type="button">Guardar</button>
        </div>
      </div>
    </div>
</div>
<div id="Ventana-Modal">
    <div id="vista-modal">
      <div class="cerrar">
        <h2><span class="icon-user"></span> Modo de Mantenimiento de Usuario</h2>
        <a href="" onclick="return Modaldesplegar_Modificar('hidden')" title="Cerrar">X</a>
      </div>
      <div role="form" class="fronte-1">
        <div>
          <input type="text" placeholder="  NOMBRE DEL USUARIO">
        </div>
        <div>
          <input type="text" placeholder="  APELLIDO DEL USUARIO">
        </div> 
        <div>
          <input type="text" placeholder="  DIRRECION DEL USUARIO">
        </div>
        <div>
          <input type="text" placeholder="  EMAIL DEL USUARIO">
        </div>
        <div>
          <input type="text" placeholder="  TELEFONO DEL USUARIO">
        </div>
        <div>
          <input type="text" placeholder="  EDAD DEL USUARIO">
        </div>
        <div>
          <input type="text" placeholder="  CIUDAD DEL USUARIO">
        </div>
        <div>
          <input type="text" placeholder="  SEXO DEL USUARIO">
        </div>
        <div>
          <input type="text" placeholder="  DNI DEL USUARIO">
        </div>
        <div>
          <select class="" name="">
              <option selected="" hidden="">SELECTIONAR CARGO</option>
              <?php echo Cargos(); ?>
          </select>
        </div>
        <div id="btn-guardar">
          <button type="button">Guardar</button>
        </div>
      </div>
    </div>
</div>
<script src="<?php echo APP_VIEW . APPI; ?>js/Modal.js"></script>
<section class="container-tabla">
      <?php
       $db = new Conexion();
       $por_pagina = 5;
       $pagina_query = $db->query("SELECT * FROM usuario;");
       $page = $pagina_query->num_rows;
       $paginas = ceil($page / $por_pagina);
       $pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1 ;
       $start = ($pagina - 1) * $por_pagina;
       $query =$db->query("SELECT cargos_usuario.NOMBRE_CAR, usuario.* FROM cargos_usuario INNER JOIN usuario ON cargos_usuario.ID_CAR=usuario.ID_CAR ORDER BY IDUSER ASC LIMIT $start,$por_pagina;");
      ?>
        <table>
          <caption class="title-tabla"><span class="icon-list2"></span>Lista de Usuarios</caption>
          <tr>
            <th>N°  <span class="icon-sort-amount-asc"></span></th>
            <th>NOMBRE</th>
            <th>APELLIDOS</th>
            <th>DIRRECION</th>
            <th>EMAIL</th>
            <th>TELEFONO</th>
            <th>EDAD</th>
            <th>CIUDAD</th>
            <th>SEXO</th>
            <th>DNI</th>
            <th>CARGO</th>
            <th>MODIFICAR</th>
            <th>ELIMINAR</th>
          </tr>
          <?php
      while ($query_rows = $query->fetch_assoc()) {
        ?>
          <tr>
            <td>
              <?php echo utf8_encode($query_rows['IDUSER'])?>
            </td>
            <td>
              <?php echo utf8_encode($query_rows['NOMBRE'])?>
            </td>
            <td>
              <?php echo utf8_encode($query_rows['APELLIDO'])?>
            </td>
            <td>
              <?php echo utf8_encode($query_rows['DIRECCION'])?>
            </td>
            <td>
              <?php echo utf8_encode($query_rows['EMAIL'])?>
            </td>
            <td>
              <?php echo utf8_encode($query_rows['TELEFONO'])?>
            </td>
            <td>
              <?php echo utf8_encode($query_rows['EDAD'])?>
            </td>
            <td>
              <?php echo utf8_encode($query_rows['CIUDAD'])?>
            </td>
            <td>
              <?php echo utf8_encode($query_rows['SEXO'])?>
            </td>
            <td>
              <?php echo utf8_encode($query_rows['DNI'])?>
            </td>
            <td>
              <?php echo utf8_encode($query_rows['NOMBRE_CAR'])?>
            </td>
            <td>
              <a href="?view=reguser&<?php echo utf8_encode($query_rows['IDUSER'])?>" onclick="javascript:Modaldesplegar_Modificar('visible')"><span class="icon-eye"></span></a>
            </td>
            <td>
              <a href="?view=reguser&<?php echo utf8_encode($query_rows['IDUSER'])?>"><span class="icon-cancel-circle"></span></a>
            </td>
          </tr>
      <?php
      }
      ?>
        </table>
          <div class="list-nume">
            <div class="paginacion">
            <?php
                $anterior = $pagina - 1;
                $siguiente = $pagina + 1;
                echo "<center>";
                if ($pagina > 1) {
                  echo '<a  href="?view=reguser&pagina='.intval($anterior).'"><strong>&laquo; Atras</strong></a>';
                }
                for ($i=1; $i <= $paginas; $i++) {
                  echo ($i == $pagina) ? '<b><a class="active" href="?view=reguser&pagina='. intval($i) .'">&nbsp;'. intval($i) .'&nbsp;</a></b>' : '<a href="?view=reguser&pagina='. intval($i) .'">&nbsp;'. intval($i) .'&nbsp;</a>';
                }
                if ($pagina < $paginas) {
                  echo '<a id="botones" href="?view=reguser&pagina='.intval($siguiente).'"><strong>Siguiente &raquo;</strong></a>';
                }
                echo "</center>";
              ?>
            </div>
          </div>
      </section>
</section>