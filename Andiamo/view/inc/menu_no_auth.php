<header class="site-navbar" role="banner">
  <div class="site-navbar-top">
    <div class="container">
      <div class="row align-items-center">

        <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
          <form action="" class="site-block-top-search">
            <span class="icon icon-search2"></span>
            <input type="text" class="form-control border-0" placeholder="Search">
          </form>
        </div>

        <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
          <div class="site-logo">
            <a href="index.php?page=controller_home&op=list" class="js-logo-clone">Andiamo</a>
          </div>
        </div>

        <div class="col-6 col-md-4 order-3 order-md-3 text-right">
          <div class="site-top-icons">
            <ul>
              <!-- <li>
                 <select class="roundborders" id="lang" name="lang">
                	   <option value="es">Español</option>
                	  	<option value="en">English</option>
                	  	<option value="val">Valencià</option>
                  </select>
	            </li> -->
              <a id="spanish"><img src="view/assets/images/flags/es.png" width="22px"></a>
              <a id="english"><img src="view/assets/images/flags/en.png" width="22px"></a>
              <a id="valencia"><img src="view/assets/images/flags/ca.png" width="22px"></a>
              <li><a href="#"><span class="icon icon-person"></span></a></li>
              <li><a class="redheart" href="index.php?page=controller_like&op=view"><span class="icon icon-heart"></span></a></li>
              <li>
                <a href="index.php?page=controller_cart&op=view" class="site-cart">
                  <span class="icon icon-shopping_cart"></span>
                  <!-- <span class="count">2</span> -->
                </a>
              </li>
              <li id="avatar"></li>
              <li><a class="redheart" href="index.php?page=controller_login&op=logout"><span class="icon icon-exit_to_app"></span></a></li>
              <li class="d-inline-block d-md-none ml-md-0"><a href="index.php?page=controller_cart&op=view" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <nav class="site-navigation text-right text-md-center" role="navigation">
    <div class="container">
      <ul class="site-menu js-clone-nav d-none d-md-block">
        <!-- <li class="has-children active">
          <a href="index.php?page=controller_inicio&op=travels">Inicio</a>
          <ul class="dropdown">
            <li><a href="index.php?page=controller_inicio&op=travels">Menu One</a></li>
            <li class="has-children">
              <a href="index.php?page=controller_inicio&op=travels">Sub Menu</a>
              <ul class="dropdown">
                <li><a href="index.php?page=controller_inicio&op=travels">Menu One</a></li>
              </ul>
            </li>
          </ul>
        </li> -->
        <li><a data-tr="home" href="index.php?page=controller_home&op=list"></a></li>
        <li><a data-tr="shop" href="index.php?page=controller_shop&op=list"></a></li>
        <!-- <li><a data-tr="crud" href="index.php?page=controller_travel&op=list"></a></li> -->
        <li><a data-tr="contact" href="index.php?page=controller_contact&op=view"></a></li>
        
        <!-- <li><form method="POST">
                	<select name="lang">
                		<option value="es">Español</option>
                		<option value="en">English</option>
                	</select>
            	 <button type="submit">Cambiar</button>
	         </form></li> -->
      </ul>
    </div>
  </nav>
</header>
