<!DOCTYPE html>
<html>
<head>
	<title>View Stok Barang</title>
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
			      <h1>Data Barang</h1>
			        <small>PT. Hofz Indonesia</small>
			        <ol class="breadcrumb">
		              <li class="fa fa-database">&nbsp; Inventory</li>
		              <li class="active">Data Barang</li>
		            </ol>

		        <!-- Print Manual -->
          		  <button style="float: right;" style="margin-right: 5px" onclick="javascript:window.print();" class="btn btn-sm btn-info fa fa-print" title="Print"></button>
          		  <!-- End Print Manual -->

          		  <!-- Print Excel -->
          		  <i style="float: right;">&nbsp;</i>
          		  <a href="<?php echo base_url(). "stok_barang_wp/controller_stok_barang_wp/export_excel"; ?>">
            	  <button style="float: right;" class="btn btn-sm btn-success fa fa-file-excel-o" title="EXCEL"></button>
          		  </a>
          		  <!-- End Print Excel -->

          		  <!-- Print Pdf -->
          		  <i style="float: right;">&nbsp;</i>
          		  <a href="<?php echo base_url(). "stok_barang_wp/controller_stok_barang_wp/export_pdf"; ?>" target = "_blank">
          		  <button style="float: right;" class="btn btn-sm btn-danger fa fa-file-pdf-o" title="PDF"></button>
          		  </a>
          		  <!-- End Print Pdf -->
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
			                <thead>
			                <tr>
			                  <th>No</th>
			                  <th>Kode Barang</th>
			                  <th>Nama Barang</th>
			                  <th>Jenis Barang</th>
			                  <th>Stok</th>
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
			                </tr>
			                <?php $i++; } ?>
			                </tbody>
			              </table>
			            </div>
			            <!-- /.box-body -->
			          </div>
			    </section>
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