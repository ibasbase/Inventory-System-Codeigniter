<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(). "css/main_user.css"; ?>">
	<title>Struktur Organisasi</title>
	<?php $this->load->view('backend/template/link.php'); ?>
</head>


<body class="hold-transition skin-purple-light sidebar-mini">
	<div class="wrapper">
		<!-- start HEADER -->
		<div>
			<?php $this->load->view('backend/template/header.php'); ?>
		</div>
		<!-- end HEADER -->

		<!-- start SIDEBAR -->
		<div>
			<?php $this->load->view('backend/template/sidebar.php'); ?>
		</div>
		<!-- end SIDEBAR -->

		<!-- start CONTENT -->
		<div>
			<div class="content-wrapper">
		    <!-- Content Header (Page header) -->
		    <section class="content-header">
		      <h1>
		        STRUKTUR ORGANISASI
		      </h1>
		    </section>

		    <!-- Main content -->
		    <section class="content">
		    	<h1 align="center">PT HOFZ INDONESIA</h1>

		    	<p class="lead">
    				<b>PT. Hofz Indonesia</b> adalah perusahaan multinasional Indonesia dan Asia, didirikan tahun 2009 di Indonesia, Awalnya merupakan suatu perusahaan yang bergerak di mesin CNC, dan sekarang perusahaan ini dikembangkan, sehingga <b>PT. Hofz Indonesia</b> juga memproduksi berbagai macam kebutuhan Truck Double Gardan 4 x 4 dengan performa tinggi.
				</p>


				<div class="row">
    
				    <div class="col-sm-12">
				      <div class="box box-primary">
				        
				        <div class="box-header with-border">
				          <h3 class="box-title"><b>Struktur Organisasi</b></h3>
				          <span class="label label-primary pull-right"></span>
				        </div><!-- /.box-header -->
				        <div class="box-body">
				          <p>
				          	<img src="<?php echo base_url(). "assets/dist/img/struktur3.jpg"; ?>">
				          </p>
				        </div><!-- /.box-body -->

				      </div><!-- /.box -->
				    </div><!-- /.col -->

				   

				    

				    
				</div><!-- /.row -->

				</div><!-- /.row -->


		    <!-- <img src="<?php echo base_url(). "assets/dist/img/hofzdashboard.jpg"; ?>"> -->
		    
		    <!-- <div id=slidercontainer>
				<div id=css3slider>
				    <img src="<?php echo base_url(). "a.jpg"; ?>">
					<img src="<?php echo base_url(). "b.jpg"; ?>">
					<img src="<?php echo base_url(). "c.jpg"; ?>">
					<img src="<?php echo base_url(). "d.jpg"; ?>">
					<img src="<?php echo base_url(). "e.jpg"; ?>">
				</div>
			</div> -->

		    </section>
		    <!-- /.content -->
		  </div>
		  <!-- /.content-wrapper -->
		</div>
		<!-- end CONTENT -->

		<!-- start FOOTER -->
		<div>
			<?php $this->load->view('backend/template/footer.php'); ?>
		</div>
		<!-- end FOOTER -->
	</div>
</body>
</html>