<!DOCTYPE html>
<html>
<head>
	<title>Tambah Supplier</title>
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
			      <h1>Tambah Supplier</h1>
			        <small>PT. Hofz Indonesia</small>
			        <ol class="breadcrumb">
		              <li class="fa fa-database">&nbsp; Master Barang</li>
		              <li class="active">Data Supplier</li>
		              <li class="active">Tambah Supplier</li>
		            </ol>			      
			    </section>

			    <!-- Main content -->
			    <section class="content">
			      <div class="box">
			            <!-- Validasi Tambah Data -->
			     <script type="text/javascript" language="JavaScript">
			         function konfirmasi()
			         {
			         tanya = confirm("Apakah anda yakin ingin menambah data ?");
			         if (tanya == true) return true;
			         else return false;
			         }
			     </script>

			            <div class="box-body">
			              <table id="tbl_produk" class="table table-bordered table-striped tbl_produk">
			                <form method="POST" action="<?php echo base_url(). "supplier/controller_supplier/do_add"; ?>">

							<tr>
								<td width="110">KODE SUPPLIER</td>
								<td>
									<input type="text" name="kode_supplier" size="30" placeholder="Kode Supplier" required/>
								</td>
							</tr>

							<tr>
								<td width="110">NAMA SUPPLIER</td>
								<td>
									<input type="text" name="nama_supplier" size="30" placeholder="Nama Supplier" required/>
								</td>
							</tr>

							<tr>
								<td width="110">PRODUK</td>
								<td>
									<input type="text" name="produk" size="30" placeholder="Produk" required/>
								</td>
							</tr>

							<tr>
								<td width="110">ALAMAT</td>
								<td>
									<input type="text" name="alamat" size="30" placeholder="Alamat" required/>
								</td>
							</tr>

							<tr>
								<td width="110">KOTA</td>
								<td>
									<input type="text" name="kota" size="30" placeholder="Kota" required/>
								</td>
							</tr>

							<tr>
								<td width="110">EMAIL</td>
								<td>
									<input type="text" name="email" size="30" placeholder="Email" required/>
								</td>
							</tr>

							<tr>
								<td width="110">TELP</td>
								<td>
									<input type="text" name="telp" size="30" placeholder="Telp" required/>
								</td>
							</tr>

							<tr>
								<td width="110">FAX</td>
								<td>
									<input type="text" name="fax" size="30" placeholder="fax" required/>
								</td>
							</tr>

							<tr>
								<td></td>
								<td>
									<button type="submit" class="btn btn-info" onclick="return konfirmasi()">SAVE</button>
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