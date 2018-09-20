  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(). "assets/dist/img/admin.jpg"; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('username'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <ul class="sidebar-menu">

      <?php $cek = $this->session->userdata('status'); ?>
      <?php if($cek == 'admin'){ ?>

        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="<?php echo base_url(). "dashboard"; ?>">
            <i class="fa fa-home"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <!-- <i class="fa fa-angle-left pull-right"></i> -->
            </span>
          </a>         
        </li>

        <li class="treeview">
          <a href="<?php echo base_url(). "visi_misi"; ?>">
            <i class="fa fa-book"></i> <span>Visi Misi</span>
            <span class="pull-right-container">
              <!-- <i class="fa fa-angle-left pull-right"></i> --> <!-- untuk drop down -->
            </span>
          </a>
        </li>

          <li class="treeview">
          <a href="<?php echo base_url(). "about"; ?>">
            <i class="fa fa-tv"></i> <span>About</span>
            <span class="pull-right-container">
              <!-- <i class="fa fa-angle-left pull-right"></i> --> <!-- untuk drop down -->
            </span>
          </a>
        </li>

        <li class="treeview">
          <a href="<?php echo base_url(). "struktur_organisasi"; ?>">
            <i class="fa fa-map"></i> <span>Structure Organization</span>
            <span class="pull-right-container">
              <!-- <i class="fa fa-angle-left pull-right"></i> --> <!-- untuk drop down -->
            </span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-industry"></i> <span>Inventory</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(). "stok_barang/controller_stok_barang"; ?>"><i class="fa fa-circle-o"></i>Stok Barang</a></li>
          </ul>
        </li>

        <!-- Start Master Barang -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i> <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(). "supplier/controller_supplier"; ?>"><i class="fa fa-circle-o"></i>Data Supplier</a></li>
            <li><a href="<?php echo base_url(). "vendor/controller_vendor"; ?>"><i class="fa fa-circle-o"></i>Data Vendor</a></li>
            <li><a href="<?php echo base_url(). "customer/controller_customer"; ?>"><i class="fa fa-circle-o"></i>Data Customer</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-pencil-square-o"></i> <span>Warehouse</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(). "barang_masuk/controller_barang_masuk"; ?>"><i class="fa fa-circle-o"></i>Barang Masuk</a></li>
            <li><a href="<?php echo base_url(). "barang_keluar/controller_barang_keluar"; ?>"><i class="fa fa-circle-o"></i>Barang Keluar</a></li>
            <li><a href="<?php echo base_url(). "order_barang/controller_order_barang"; ?>"><i class="fa fa-circle-o"></i>Order Barang</a></li>
            <li><a href="<?php echo base_url(). "reture_barang/controller_reture_barang"; ?>"><i class="fa fa-circle-o"></i>Reture Barang</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i> <span>Purchasing</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(). "purchas_order/controller_purchas_order"; ?>"><i class="fa fa-circle-o"></i>Purchash Request</a></li>
            <li><a href="<?php echo base_url(). "purchas_receiving/controller_purchas_receiving"; ?>"><i class="fa fa-circle-o"></i>Purchash Receiving Order</a></li>
            <li><a href="<?php echo base_url(). "purchas_reture/controller_purchas_reture"; ?>"><i class="fa fa-circle-o"></i>Purchash Reture</a></li>
            <li><a href="<?php echo base_url(). "purchas_receivingrtr/controller_purchas_receivingrtr"; ?>"><i class="fa fa-circle-o"></i>Purchash Receiving Reture</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-file"></i> <span>Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(). "laporan_stok_barang/controller_laporan_stok_barang"; ?>"><i class="fa fa-circle-o"></i>Laporan Stok Barang</a></li>
            <li><a href="<?php echo base_url(). "laporan_barang_masuk/controller_laporan_barang_masuk"; ?>"><i class="fa fa-circle-o"></i>Laporan Barang Masuk</a></li>
            <li><a href="<?php echo base_url(). "laporan_barang_keluar/controller_laporan_barang_keluar"; ?>"><i class="fa fa-circle-o"></i>Laporan Barang Keluar</a></li>
            <li><a href="<?php echo base_url(). "laporan_order_barang/controller_laporan_order_barang"; ?>"><i class="fa fa-circle-o"></i>Laporan Order Barang</a></li>
            <li><a href="<?php echo base_url(). "laporan_reture_barang/controller_laporan_reture_barang"; ?>"><i class="fa fa-circle-o"></i>Laporan Reture Barang</a></li>
            <li><a href="<?php echo base_url(). "laporan_supplier/controller_laporan_supplier"; ?>"><i class="fa fa-circle-o"></i>Laporan Supplier</a></li>
            <li><a href="<?php echo base_url(). "laporan_vendor/controller_laporan_vendor"; ?>"><i class="fa fa-circle-o"></i>Laporan Vendor</a></li>
            <li><a href="<?php echo base_url(). "laporan_customer/controller_laporan_customer"; ?>"><i class="fa fa-circle-o"></i>Laporan Customer</a></li>
            <li><a href="<?php echo base_url(). "laporan_purchas_order/controller_laporan_purchas_order"; ?>"><i class="fa fa-circle-o"></i>Laporan Purchas Request</a></li>
            <li><a href="<?php echo base_url(). "laporan_purchas_receiving/controller_laporan_purchas_receiving"; ?>"><i class="fa fa-circle-o"></i>Laporan Purchas Receiv</a></li>
            <li><a href="<?php echo base_url(). "laporan_purchas_reture/controller_laporan_purchas_reture"; ?>"><i class="fa fa-circle-o"></i>Laporan Purchas Reture</a></li>
            <li><a href="<?php echo base_url(). "laporan_purchas_receivingrtr/controller_laporan_purchas_receivingrtr"; ?>"><i class="fa fa-circle-o"></i>Laporan Purchas Receiv Reture</a></li>
          </ul>
        </li>
        <!-- END LAPORAN -->

        <!-- REGISTER -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cubes"></i> <span>Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(). "register/controller_register"; ?>"><i class="fa fa-circle-o"></i>Data Member</a></li>
            <li><a href="<?php echo base_url(). "register/controller_register/add_data"; ?>"><i class="fa fa-circle-o"></i>Register</a></li>
          </ul>
        </li>
        <!-- End Master Barang -->

        <?php }elseif($cek == 'warehouse'){ ?>

        <!-- <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="<?php echo base_url(). "dashboard"; ?>">
            <i class="fa fa-home"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <!-- <i class="fa fa-angle-left pull-right"></i> -->
            </span>
          </a>         
        </li>

        <li class="treeview">
          <a href="<?php echo base_url(). "visi_misi"; ?>">
            <i class="fa fa-book"></i> <span>Visi Misi</span>
            <span class="pull-right-container">
              <!-- <i class="fa fa-angle-left pull-right"></i> --> <!-- untuk drop down -->
            </span>
          </a>
        </li>

          <li class="treeview">
          <a href="<?php echo base_url(). "about"; ?>">
            <i class="fa fa-tv"></i> <span>About</span>
            <span class="pull-right-container">
              <!-- <i class="fa fa-angle-left pull-right"></i> --> <!-- untuk drop down -->
            </span>
          </a>
        </li>

        <li class="treeview">
          <a href="<?php echo base_url(). "struktur_organisasi"; ?>">
            <i class="fa fa-map"></i> <span>Structure Organization</span>
            <span class="pull-right-container">
              <!-- <i class="fa fa-angle-left pull-right"></i> --> <!-- untuk drop down -->
            </span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-industry"></i> <span>Inventory</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(). "stok_barang_wp/controller_stok_barang_wp"; ?>"><i class="fa fa-circle-o"></i>Stok Barang</a></li>
          </ul>
        </li>

        <!-- BARANG -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pencil-square-o"></i> <span>Warehouse</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(). "barang_masuk/controller_barang_masuk"; ?>"><i class="fa fa-circle-o"></i>Barang Masuk</a></li>
            <li><a href="<?php echo base_url(). "barang_keluar/controller_barang_keluar"; ?>"><i class="fa fa-circle-o"></i>Barang Keluar</a></li>
            <li><a href="<?php echo base_url(). "order_barang/controller_order_barang"; ?>"><i class="fa fa-circle-o"></i>Order Barang</a></li>
            <li><a href="<?php echo base_url(). "reture_barang/controller_reture_barang"; ?>"><i class="fa fa-circle-o"></i>Reture Barang</a></li>
          </ul>
        </li>
        <!-- END BARANG -->

        <?php }elseif($cek == 'purchasing'){ ?>

        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="<?php echo base_url(). "dashboard"; ?>">
            <i class="fa fa-home"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <!-- <i class="fa fa-angle-left pull-right"></i> -->
            </span>
          </a>         
        </li>

        <li class="treeview">
          <a href="<?php echo base_url(). "visi_misi"; ?>">
            <i class="fa fa-book"></i> <span>Visi Misi</span>
            <span class="pull-right-container">
              <!-- <i class="fa fa-angle-left pull-right"></i> --> <!-- untuk drop down -->
            </span>
          </a>
        </li>

          <li class="treeview">
          <a href="<?php echo base_url(). "about"; ?>">
            <i class="fa fa-tv"></i> <span>About</span>
            <span class="pull-right-container">
              <!-- <i class="fa fa-angle-left pull-right"></i> --> <!-- untuk drop down -->
            </span>
          </a>
        </li>

        <li class="treeview">
          <a href="<?php echo base_url(). "struktur_organisasi"; ?>">
            <i class="fa fa-map"></i> <span>Structure Organization</span>
            <span class="pull-right-container">
              <!-- <i class="fa fa-angle-left pull-right"></i> --> <!-- untuk drop down -->
            </span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-industry"></i> <span>Inventory</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(). "stok_barang_wp/controller_stok_barang_wp"; ?>"><i class="fa fa-circle-o"></i>Stok Barang</a></li>
          </ul>
        </li>

        <!-- PURCHASING -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i> <span>Purchasing</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(). "purchas_order/controller_purchas_order"; ?>"><i class="fa fa-circle-o"></i>Purchash Request</a></li>
            <li><a href="<?php echo base_url(). "purchas_receiving/controller_purchas_receiving"; ?>"><i class="fa fa-circle-o"></i>Purchash Receiving Order</a></li>
            <li><a href="<?php echo base_url(). "purchas_reture/controller_purchas_reture"; ?>"><i class="fa fa-circle-o"></i>Purchash Reture</a></li>
            <li><a href="<?php echo base_url(). "purchas_receivingrtr/controller_purchas_receivingrtr"; ?>"><i class="fa fa-circle-o"></i>Purchash Receiving Reture</a></li>
          </ul>
        </li>
        <!-- END PURCHAS -->

        <?php }else{ ?>

        <!-- LAPORAN -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-file"></i> <span>Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(). "laporan_stok_barang/controller_laporan_stok_barang"; ?>"><i class="fa fa-circle-o"></i>Laporan Stok Barang</a></li>
            <li><a href="<?php echo base_url(). "laporan_barang_masuk/controller_laporan_barang_masuk"; ?>"><i class="fa fa-circle-o"></i>Laporan Barang Masuk</a></li>
            <li><a href="<?php echo base_url(). "laporan_barang_keluar/controller_laporan_barang_keluar"; ?>"><i class="fa fa-circle-o"></i>Laporan Barang Keluar</a></li>
            <li><a href="<?php echo base_url(). "laporan_order_barang/controller_laporan_order_barang"; ?>"><i class="fa fa-circle-o"></i>Laporan Order Barang</a></li>
             <li><a href="#"><i class="fa fa-circle-o"></i>Laporan Reture Barang</a></li>
            <li><a href="<?php echo base_url(). "laporan_supplier/controller_laporan_supplier"; ?>"><i class="fa fa-circle-o"></i>Laporan Supplier</a></li>
            <li><a href="<?php echo base_url(). "laporan_vendor/controller_laporan_vendor"; ?>"><i class="fa fa-circle-o"></i>Laporan Vendor</a></li>
            <li><a href="<?php echo base_url(). "laporan_customer/controller_laporan_customer"; ?>"><i class="fa fa-circle-o"></i>Laporan Customer</a></li>
            <li><a href="<?php echo base_url(). "laporan_purchas_order/controller_laporan_purchas_order"; ?>"><i class="fa fa-circle-o"></i>Laporan Purchas Request</a></li>
            <li><a href="<?php echo base_url(). "laporan_purchas_receiving/controller_laporan_purchas_receiving"; ?>"><i class="fa fa-circle-o"></i>Laporan Purchas Receiv</a></li>
            <li><a href="<?php echo base_url(). "laporan_purchas_reture/controller_purchas_reture"; ?>"><i class="fa fa-circle-o"></i>Laporan Purchas Reture</a></li>
            <li><a href="<?php echo base_url(). "laporan_purchas_receivingrtr/controller_laporan_purchas_receivingrtr"; ?>"><i class="fa fa-circle-o"></i>Laporan Purchas Receiv Reture</a></li>
          </ul>
        </li>
        <!-- END LAPORAN -->

        <!-- REGISTER -->
<!--         <li class="treeview">
          <a href="#">
            <i class="fa fa-cubes"></i> <span>Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(). "register/controller_register"; ?>"><i class="fa fa-circle-o"></i>Data Member</a></li>
            <li><a href="<?php echo base_url(). "register/controller_register/add_data"; ?>"><i class="fa fa-circle-o"></i>Register</a></li>
          </ul>
        </li> -->
        <!-- END REGISTER -->

        <?php } ?>
          
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>