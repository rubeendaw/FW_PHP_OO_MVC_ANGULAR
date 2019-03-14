<div class="container">
  <div class="row">
    <!-- <div class="col-md-6"> -->
	    <br/>
    <div id="contenido" style="margin: auto;">
        <form autocomplete="on" method="post" name="alta_travel" id="alta_travel">
            <?php
        		if(isset($error)){
                    print ("<BR><span CLASS='styerror'>" . "* ".$error . "</span><br/>");
        		}?>
            <h1 class="text-black" style="text-align: center;" >Viaje nuevo</h1>
            <div class="p-3 p-lg-5 border">
            <table border='0'>
              <tr>
                  <td class="text-black">Tipo de viaje: </td>
                  <td>
                      <input type="radio" id="type" name="type" checked="checked" value="Nacional"/> Nacional
                      <input type="radio" id="type" name="type" value="Europeo"/> Europeo
                      <input type="radio" id="type" name="type" value="Internacional"/> Internacional
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
                    <td class="text-black" >Referencia: </td>
                    <td><input class="form-control" type="text" id="ref" name="ref" placeholder="Ej: 21" value=""/></td>
                    <td><font color="red">
                        <span id="error_ref" class="error">
                            <?php
                            echo "<pre>";
                            //print_r($_POST);
                            //print_r($error);
                            //print_r($error_ref);
                            echo "</pre><br>";
                                // echo $_POST?$_POST['ref']:"";
                            ?>
                        </span>
                    </font>
                  </td>
                </tr>
                <tr>
                    <td class="text-black">Precio: </td>
                    <td><input class="form-control" type="text" id="price" name="price" placeholder="Ej: 200" value=""/></td>
                    <td><font color="red">
                        <span id="error_price" class="error">
                            <?php
                                print_r($error_price);
                            ?>
                        </span>
                    </font>
                    </td>
                </tr>
                <tr>
                    <td class="text-black">Pais: </td>
                    <td><input class="form-control" type="text" id="country" name="country" placeholder="Ej: Italia" value=""/></td>
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
                    <td class="text-black">Destino: </td>
                    <td><input class="form-control" type="text" id="destination" name="destination" placeholder="Ej: Venecia" value=""/></td>
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
                    <td class="text-black">Descuento: </td>
                    <td><select id="discount" name="discount">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
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
                    <td class="text-black">Servicios: </td>
                    <td>
                        <input type="checkbox" id= "services[]" name="services[]" value="wifi"/>Wifi
                        <input type="checkbox" id= "services[]" name="services[]" value="piscina"/>Piscina
                        <input type="checkbox" id= "services[]" name="services[]" value="parking"/>Parking
                        <input type="checkbox" id= "services[]" name="services[]" value="gimnasio"/>Gimnasio
                        <input type="checkbox" id= "services[]" name="services[]" value="spa"/>Spa
                        <input type="checkbox" id= "services[]" name="services[]" value="mascotas"/>Admite mascotas
                    </td>
                    <td><font color="red">
                        <span id="error_servicios[]" class="error">
                            <?php
                                echo "$error_servicios";
                            ?>
                        </span>
                    </font>
                  </td>
                </tr>
                <tr>
                    <td class="text-black">Fechas: </td>
                    <td><input type="text" id="date" name="date" class="form-control" readonly="readonly"></td>
                </tr>
                <tr>
                    <td class="text-black">Imagen: </td>
                    <td><input class="form-control" type="text" id="img" name="img" placeholder="Ej: venecia.jpg" value=""/></td>
                </tr>
                <tr>
                    <td><input class="btn btn-success" type="button" name="create" id="create" value="Enviar" onclick="validate_travel()"/></td>
                    <td align="right"><a class="btn btn-danger" href="index.php?page=controller_travel&op=list">Volver</a></td>
                </tr>
            </table>
            </div>
        </form>
    </div>
  </div>
</div>
