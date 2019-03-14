<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="view/assets/images/carousel1.jpg">
    </div>

    <div class="item">
      <img src="view/assets/images/carousel2.png">
    </div>

    <div class="item">
      <img src="view/assets/images/carousel3.jpg">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="site-section block-3 site-blocks-2 bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-7 site-section-heading text-center pt-4">
          <h2>Los Más Destacados</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="nonloop-block-3 owl-carousel">
        <?php                   
        if ($rdo->num_rows === 0){
           echo '<h3 align="center"  colspan="3">NO HAY NINGUN VIAJE</h3>';
        }else{
            foreach ($rdo as $row) {
              echo '<div class="item">';
                echo '<div class="block-4 text-center">';
                  echo '<figure class="block-4-image">';
                    echo '<img src="view/assets/images/'. $row['img'] . '" alt="Image placeholder" class="img-fluid">';
                  echo '</figure>';
                  echo '<div class="block-4-text p-4">';
                    echo '<h3><a href="#">'. $row['country'] . '</a></h3>';
                    echo '<p class="mb-0">'. $row['destination'] . '</p>';
                    echo '<p class="text-primary font-weight-bold">'. $row['price'] . '€</p>';
                    echo '<button id="'. $row['id'] . '" class="btn InsertCarr btn-success">Add<span class="icon icon-shopping_cart"></span></button>';
                    echo '<a id='. $row['id'] .' class="sumlike btn text-white btn-info">Like</a>';
                  echo '</div>';
                echo '</div>';
              echo '</div>';
            }
        }
      ?>
        </div>
        <div class="container">
		      <div class="drop1">
			      <select id="cboTypes">
				      <option value="0">Type</option>
			      </select>
		      </div>
          <div class="drop2">
            <select id="cboCountry">
              <option value="0">Country</option>
            </select>
          </div>
          <div class="auto">
            <input  type="text" size="40" id="service" name="service" />
            <div id="suggestions"></div>
          </div>
	      </div>
      </div>
    </div>
  </div>
</div>
