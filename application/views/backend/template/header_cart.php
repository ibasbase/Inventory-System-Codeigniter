<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>I</b>BR</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Inventory </b>Barang</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"><!-- Tanggal, -->
                    <?php 
                      $now = date('l, Y-m-d'); 
                      echo $now;
                    ?>
              </span>
            </a>
          </li>
          <?php $url_cart = '' ;?>
          <li class="tasks-menu notifications-menu">
            <a href="<?php echo base_url(). "cart/controller_cart"; ?>">
              <i class="fa fa-shopping-cart"></i>
              <span class="label label-danger">
                <?php echo $masuk; ?>
              </span>
            </a>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url(). "assets/dist/img/admin.jpg"; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs">Welcome, <?php echo $this->session->userdata('username'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url(). "assets/dist/img/admin.jpg"; ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata('username'); ?> - Web Developer
                  <small>STMIK PRANATA INDONESIA 2014</small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <!-- <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div> -->
                <div class="pull-right">
                  <a href="<?php echo base_url(). "controller_login/logout"; ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        
        </ul>
      </div>
    </nav>
  </header>