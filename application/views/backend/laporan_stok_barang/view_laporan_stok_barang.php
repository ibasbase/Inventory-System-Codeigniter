<!DOCTYPE html>
<html>
<head>
	<title>View Laporan Stok Barang</title>
	<!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url()."bootstrap/css/bootstrap.min.css"; ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(). "dist/css/AdminLTE.min.css"; ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(). "dist/css/skins/_all-skins.min.css"; ?>">


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
			<div class="content-wrapper">
			    <!-- Content Header (Page header) -->
			    <section class="content-header">
			      <h1>Laporan Stok Barang</h1>
			      <small>PT. Hofz Indonesia</small>
			      	<i style="float: right;">&nbsp;</i>
	          		<button style="float: right;" class="btn btn-sm btn-info" onclick="btnPrint()"><span class="fa fa-print">Print Out</span></button>
			    </section>

			    <!-- Main content -->
			    <section class="content">
			      <div class="box">
			            <!-- Validasi Hapus Data -->
			    <script type="text/javascript" language="JavaScript">
			         function konfirmasi()
			         {
			         tanya = confirm("Apakah anda yakin ingin menghapus data ?");
			         if (tanya == true) return true;
			         else return false;
			         }
			     </script>
			            <!-- Validasi Tutup Delete -->
			            <!-- /.box-header -->
			            <div class="box-body">
			              <table id="tbl_produk" class="table table-bordered table-striped tbl_produk">
			              	<table id="tbl_stok_barang" class="table table-bordered table-striped tbl_stok_barang">
			                <thead>
			                <tr>
			                  <th>No</th>
			                  <th>Kode Barang</th>
			                  <th>Nama Barang</th>
			                  <th>Jenis Barang</th>
			                  <th>Stok</th>
			                  <!-- <th class="no-print"> -->
			                    		<!-- Untuk Print -->
			                    <!-- <button class="btn btn-primary pull-center" onclick="btnPrint()"><span class="fa fa-print">Print Out</span></button> -->
			                    	
									
			                    		<!-- Untuk Print -->

			                  	</div>
			                  </div>
			                  </th>
			                </tr>
			                </thead>

			                <tbody>
			                <?php $i = 1; foreach ($stok_barang->result() as $d) { ?>
			                <tr>
			                  <td><?php echo $i; ?></td>
			                  <td><?php echo $d->kode_barang ?></td>
			                  <td><?php echo $d->nama_barang ?></td>
			                  <td><?php echo $d->jenis_barang ?></td>
			                  <td><?php echo $d->stok ?></td>
			                  <!-- <td align="center" class="no-print">
			                  <a onclick="return konfirmasi()" href="<?php echo base_url(). "laporan_stok_barang/controller_laporan_stok_barang/do_delete/".$d->kode_barang; ?>"><button class="btn btn-danger btn-sm">DELETE</button></a> -->
			                  </td>
			                </tr>
			                <?php $i++; } ?>
			                </tbody>
			              </table>
			            </div>
			            <!-- /.box-body -->
			          </div>

			          <script>
						function btnPrint(){
				        var divToPrint  = document.getElementById('tbl_stok_barang');
				        var popupWin    = window.open('', '_blank', 'width=700, height=500');
				        popupWin.document.open();
				        popupWin.document.write('<html>\n\
				                                    <head>\n\
				                                    </head>\n\n\
				                                    <body onload="window.print()">\n\
				                                        <h2 align="center">Report stok_barang</h2>\n\
				                                        <table align="center" border="1" style="border-collapse: collapse;">\n\
				                                            '+ divToPrint.innerHTML +'\n\
				                                        </table>\n\
				                                    </body>\n\
				                                </html>');
				        popupWin.document.close();

				    }
				    </script>
			    </section>
			</div>
		<!-- end CONTENT -->

		<!-- start FOOTER -->
		<div>
			<?php $this->load->view('backend/template/footer.php'); ?>
		</div>
		<!-- end FOOTER -->
	</div>
	<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(). "plugins/jQuery/jquery-2.2.3.min.js"; ?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(). "bootstrap/js/bootstrap.min.js"; ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url(). "plugins/fastclick/fastclick.js"; ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(). "dist/js/app.min.js"; ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(). "dist/js/demo.js"; ?>"></script>
</body>
</html>