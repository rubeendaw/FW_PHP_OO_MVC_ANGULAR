</br>
<div class="container" style="text-align:center">
  <div class="row" style="text-align:center; display:inline-block">
      <form autocomplete="on" method="post" name="delete_travel" id="delete_travel" action="index.php?page=controller_travel&op=delete&id=<?php echo $_GET['id']; ?>">
          <table border='0'>
              <tr>
                  <td align="center"  colspan="2"><h3>¿Desea borrar el viaje <?php echo $_GET['country']; ?> <?php echo $_GET['destination']; ?>?</h3></td>

              </tr>
              <tr>
                  <td align="center"><button type="submit" class="btn btn-success" name="delete" id="delete">Aceptar</button></td>
                  <td align="center"><a class="btn btn-danger" href="index.php?page=controller_travel&op=list">Cancelar</a></td>
              </tr>
          </table>
      </form>
  </div>
</div>
