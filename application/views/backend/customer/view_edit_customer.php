<!DOCTYPE html>
<html>
<head>
	<title>Edit Customer</title>
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
			      <h1>Edit Customer</h1>
			        <small>PT. Hofz Indonesia</small>
			        <ol class="breadcrumb">
			        	<li class="fa fa-database">&nbsp;Master Barang</li>
			        	<li class="active">Data Customer</li>
			        	<li class="active">Edit Customer</li>
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
			               <form method="POST" action="<?php echo base_url(). "customer/controller_customer/do_edit"; ?>"> 

							<tr>
								<td width="110">KODE CUSTOMER</td>
								<td>
								<input type="text" name="kode_customer" size="30" value="<?php echo $kode_customer; ?>" required/>
								</td>
							</tr>

							<tr>
								<td width="110">NAMA CUSTOMER</td>
								<td>
								<input type="text" name="nama_customer" size="30" value="<?php echo $nama_customer; ?>" required/>
								</td>
							</tr>

							<tr>
								<td width="110">ALAMAT</td>
								<td>
								<input type="text" name="alamat" size="30" value="<?php echo $alamat; ?>" required/>
								</td>
							</tr>

							<tr>
								<td width="110">KOTA</td>
								<td>
								<input type="text" name="kota" size="30" value="<?php echo $kota; ?>" required/>
								</td>
							</tr>

							<tr>
								<td width="110">EMAIL</td>
								<td>
								<input type="text" name="email" size="30" value="<?php echo $email; ?>" required/>
								</td>
							</tr>

							<tr>
								<td width="110">TELP</td>
								<td>
								<input type="text" name="telp" size="30" value="<?php echo $telp; ?>" required/>
								</td>
							</tr>

							<tr>
								<td width="110">FAX</td>
								<td>
								<input type="text" name="fax" size="30" value="<?php echo $fax; ?>" required/>
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