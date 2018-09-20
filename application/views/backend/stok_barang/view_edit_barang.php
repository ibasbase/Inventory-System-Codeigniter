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
			      <h1>Edit Barang</h1>
			        <small>PT. Hofz Indonesia</small>
			        <ol class="breadcrumb">
		              <li class="fa fa-database">&nbsp; Inventory</li>
		              <li class="active">Data Barang</li>
		              <li class="active">Edit Barang</li>
		            </ol>
			      
			    </section>

			    <!-- Main content -->
			    <section class="content">
			      <div class="box">
			            <!-- Validasi Edit Data -->
			    <script type="text/javascript" language="JavaScript">
			         function konfirmasi()
			         {
			         tanya = confirm("Apakah anda yakin ingin menganti data ?");
			         if (tanya == true) return true;
			         else return false;
			         }
			     </script>
			            <!-- Validasi Tutup Delete -->
			            <!-- /.box-header -->
			            <div class="box-body">
			              <table id="tbl_produk" class="table table-bordered table-striped tbl_produk">
			               <form method="POST" action="<?php echo base_url(). "stok_barang/controller_stok_barang/do_edit"; ?>"> 

							<tr>
								<td width="100">KODE BARANG</td>
								<td>
								<input type="text" name="kode_barang" size="30" value="<?php echo $kode_barang; ?>" required/>
								</td>
							</tr>

							<tr>
								<td width="100">NAMA BARANG</td>
								<td>
								<input type="text" name="nama_barang" size="30" value="<?php echo $nama_barang; ?>" required/>
								</td>
							</tr>

							<tr>
								<td width="100">JENIS BARANG</td>
								<td>
								<input type="text" name="jenis_barang" size="30" value="<?php echo $jenis_barang; ?>" required/>
								</td>
							</tr>

							<tr>
								<td width="100">STOK</td>
								<td>
								<input type="text" name="stok" size="30" value="<?php echo $stok; ?>" required/>
								</td>
							</tr>

							<tr>
								<td></td>
								<td>
									<button type="submit" class="btn btn-info" onclick="return konfirmasi()">UPDATE</button>
									<button type="reset" class="btn btn-danger">CANCEL</button>
								</td>
							</tr>

						   </form>
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