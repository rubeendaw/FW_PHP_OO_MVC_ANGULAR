<div class="container">
  <div class="row">
    <!-- <div class="col-md-6"> -->

    <!-- <div id="contenido"> -->
        <form autocomplete="on" method="post" name="update_travel" id="update_travel">
            <h1>Modificar Viaje</h1>
            <table border='0'>
              <tr>
                  <td>Tipo de movil: </td>
                  <td>
                      <?php
                      // echo "<pre>";
                  		// print_r($travel);
                  		// echo "</pre><br>";
                          if ($travel['type']==="Nacional"){
                      ?>
                        <input type="radio" id="type" name="type" value="Nacional" checked/> Nacional
                        <input type="radio" id="type" name="type" value="Europeo"/> Europeo
                        <input type="radio" id="type" name="type" value="Internacional"/> Internacional
                      <?php
                    }else if ($travel['type']==="Europeo"){
                      ?>
                        <input type="radio" id="type" name="type" value="Nacional"/> Nacional
                        <input type="radio" id="type" name="type" value="Europeo" checked/> Europeo
                        <input type="radio" id="type" name="type" value="Internacional"/> Internacional
                      <?php
                        }else {
                      ?>
                        <input type="radio" id="type" name="type" value="Nacional"/> Nacional
                        <input type="radio" id="type" name="type" value="Europeo"/> Europeo
                        <input type="radio" id="type" name="type" value="Internacional" checked/> Internacional
                      <?php
                          }
                      ?>
                  </td>
                  <td><font color="red">
                      <span id="error_type" class="error">
                          <?php
                              echo "$error_type";
                          ?>
                      </span>
                  </font>
                </td>
              </tr>
                <tr>
                    <td>Referencia: </td>
                    <td><input type="text" id="ref" name="ref" placeholder="Ej: 21" value="<?php echo $travel['ref'];?>"/></td>
                    <td><font color="red">
                        <span id="error_ref" class="error">
                            <?php
                                echo "$error_ref";
                            ?>
                        </span>
                    </font>
                    </td>
                </tr>
                <tr>
                    <td>Precio: </td>
                    <td><input type="text" id="price" name="price" placeholder="Ej: 200" value="<?php echo $travel['price'];?>"/></td>
                    <td><font color="red">
                        <span id="error_price" class="error">
                            <?php
                                echo "$error_price";
                            ?>
                        </span>
                    </font>
                    </td>
                </tr>
                <tr>
                    <td>Pais: </td>
                    <td><input type="text" id="country" name="country" placeholder="Ej: Italia" value="<?php echo $travel['country'];?>"/></td>
                    <td><font color="red">
                        <span id="error_country" class="error">
                            <?php
                                echo "$error_country";
                            ?>
                        </span>
                    </font>
                    </td>
                </tr>
                <tr>
                    <td>Destino: </td>
                    <td><input type="text" id="destination" name="destination" placeholder="Ej: Venecia" value="<?php echo $travel['destination'];?>"/></td>
                    <td><font color="red">
                        <span id="error_destination" class="error">
                            <?php
                                echo "$error_destination";
                            ?>
                        </span>
                    </font>
                    </td>
                </tr>

                <tr>
                    <td>Descuento: </td>
                    <td><select id="discount" name="discount">
                        <?php
                            if($travel['discount']==="5"){
                        ?>
                          <option value="5">5</option>
                          <option value="10">10</option>
                          <option value="15">15</option>
                          <option value="25">25</option>
                          <option value="50">50</option>
                        <?php
                      }else if($travel['discount']==="10"){
                        ?>
                          <option value="5">5</option>
                          <option value="10">10</option>
                          <option value="15">15</option>
                          <option value="25">25</option>
                          <option value="50">50</option>
                        <?php
                      }else if($travel['discount']==="15"){
                        ?>
                          <option value="5">5</option>
                          <option value="10">10</option>
                          <option value="15">15</option>
                          <option value="25">25</option>
                          <option value="50">50</option>
                        <?php
                      }else if($travel['discount']==="25"){
                        ?>
                          <option value="5">5</option>
                          <option value="10">10</option>
                          <option value="15">15</option>
                          <option value="25">25</option>
                          <option value="50">50</option>
                        <?php
                            }else{
                        ?>
                          <option value="5">5</option>
                          <option value="10">10</option>
                          <option value="15">15</option>
                          <option value="25">25</option>
                          <option value="50">50</option>
                        <?php
                            }
                        ?>
                        </select></td>
                    <td><font color="red">
                        <span id="error_discount" class="error">
                            <?php
                                echo "$error_discount";
                            ?>
                        </span>
                    </font>
                  </td>
                </tr>

                <tr>
                    <td>Servicios: </td>
                    <?php
                        $car=explode(",", $travel['services']);
                    ?>
                    <td>
                        <?php
                            $busca_array=in_array("wifi", $car);
                            // print_r($car);
                            if($busca_array){
                        ?>
                            <input type="checkbox" id= "services[]" name="services[]" value="wifi" checked/>Wifi
                        <?php
                            }else{
                        ?>
                            <input type="checkbox" id= "services[]" name="services[]" value="wifi"/>Wifi
                        <?php
                            }
                        ?>
                        <?php
                            $busca_array=in_array("piscina", $car);
                            if($busca_array){
                        ?>
                            <input type="checkbox" id= "services[]" name="services[]" value="piscina" checked/>Piscina
                        <?php
                            }else{
                        ?>
                            <input type="checkbox" id= "services[]" name="services[]" value="piscina"/>Piscina
                        <?php
                            }
                        ?>
                        <?php
                            $busca_array=in_array("parking", $car);
                            if($busca_array){
                        ?>
                            <input type="checkbox" id= "services[]" name="services[]" value="parking" checked/>Parking
                        <?php
                            }else{
                        ?>
                        <input type="checkbox" id= "services[]" name="services[]" value="parking"/>Parking
                        <?php
                            }
                        ?>
                        <?php
                            $busca_array=in_array("gimnasio", $car);
                            if($busca_array){
                        ?>
                            <input type="checkbox" id= "services[]" name="services[]" value="gimnasio" checked/>Gimnasio
                        <?php
                            }else{
                        ?>
                            <input type="checkbox" id= "services[]" name="services[]" value="gimnasio"/>Gimnasio
                        <?php
                            }
                        ?>
                        <?php
                            $busca_array=in_array("spa", $car);
                            if($busca_array){
                        ?>
                            <input type="checkbox" id= "services[]" name="services[]" value="spa" checked/>Spa
                        <?php
                            }else{
                        ?>
                            <input type="checkbox" id= "services[]" name="services[]" value="spa"/>Spa
                        <?php
                            }
                        ?>
                        <?php
                            $busca_array=in_array("mascotas", $car);
                            if($busca_array){
                        ?>
                            <input type="checkbox" id= "services[]" name="services[]" value="mascotas" checked/>Mascotas</td>
                        <?php
                            }else{
                        ?>
                            <input type="checkbox" id= "services[]" name="services[]" value="mascotas"/>Mascotas</td>
                        <?php
                            }
                        ?>
                    </td>
                    <td><font color="red">
                        <span id="error_services" class="error">
                            <?php
                                echo "$error_services";
                            ?>
                        </span>
                    </font>
                  </td>
                </tr>
                <tr>
                    <td class="text-black">Fechas: </td>
                    <td><input type="text" id="date" name="date" value="<?php echo $travel['date'];?>"></td>
                </tr>
                <tr>
                    <td>Imagen: </td>
                    <td><input type="text" id="img" name="img" placeholder="Ej: Venecia.jpg" value="<?php echo $travel['img'];?>"/></td>
                    <td><font color="red">
                        <span id="error_img" class="error">
                            <?php
                                echo "$error_img";
                            ?>
                        </span>
                    </font>
                    </td>
                </tr>
                <tr>
                    <td><input class="btn btn-success" type="button" name="update" id="update" value="Enviar" onclick="validate_travel_update()"/></td>
                    <td align="right"><a class="btn btn-danger" href="index.php?page=controller_travel&op=list">Volver</a></td>
                </tr>
            </table>
        </form>
    </div>
</div>
