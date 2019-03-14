<div style="padding: 3%;" id="content">
    <div class="container">
    	<div class="row">
    			<h3>VIAJES</h3>
    	</div>
    	<div class="row">
    		<p><a class="btn btn-success" href="index.php?page=controller_travel&op=create">Create</a></p>
    		<table id="lista" class="table table-striped table-bordered" width="100%" cellspacing="0">
          <thead>
                <tr>
                    <td  class="text-center" width=125><b>Ref</b></td>
                    <td  class="text-center" width=125><b>Tipo</b></td>
                    <td  class="text-center" width=125><b>Destino</b></td>
                    <td  class="text-center" width=125><b>Precio</b></td>
                    <td  class="text-center" width=125><b>Acción</b></td>
                </tr>
          </thead>
          <tbody>
                <?php
                    if ($rdo->num_rows === 0){
                        echo '<tr>';
                        echo '<td align="center"  colspan="3">NO HAY NINGUN VIAJE</td>';
                        echo '</tr>';
                    }else{
                        foreach ($rdo as $row) {
                       		echo '<tr>';
                    	   	echo '<td class="text-center" width=100>'. $row['ref'] . '</td>';
                    	   	echo '<td class="text-center" width=75>'. $row['type'] . '</td>';
                    	   	echo '<td class="text-center" width=50>'. $row['destination'] . '</td>';
                            echo '<td class="text-center" width=50>'. $row['price'] . '</td>';
                    	   	echo '<td class="text-center" width=150>';
                            echo ("<a class='ref btn btn-primary' id='".$row['id']."'>R</a>");
                    	   	echo '&nbsp;';
                    	   	echo '<a class="btn btn-success" href="index.php?page=controller_travel&op=update&id='.$row['id'].'">U</a>';
                    	   	echo '&nbsp;';
                    	   	echo '<a class="btn btn-danger" href="index.php?page=controller_travel&op=delete&id='.$row['id'].'&country='.$row['country'].'&destination='.$row['destination'].'">D</a>';
                    	   	echo '</td>';
                    	   	echo '</tr>';
                        }
                    }
                ?>
              </tbody>
            </table>
            <a class="delall btn btn-danger" href="index.php?page=controller_travel&op=delete_all">Borrar Todo</a>
    	</div>
    </div>
</div>

<!-- modal reed -->
<section id="travel_modal">
    <div id="details_travel" style="display: none;">
        <div id="details">
            <div id="container">
                Referencia: <div id="ref"></div></br>
                Tipo: <div id="tipo"></div></br>
                Salida: <div id="check_in"></div></br>
                Llegada: <div id="check_out"></div></br>
                Servicios: <div id="services"></div></br>
                Destino: <div id="destino"></div></br>
                Pais: <div id="country"></div></br>
                Precio: <div id="precio"></div></br>
                Descuento: <div id="descuento"></div></br>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
          $('#lista').DataTable();
          $('.dataTables_length').addClass('bs-select');
    });
</script>
