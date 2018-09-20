<!DOCTYPE html>
<html>
<head>
	<title>Tambah Admin</title>
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
			      <h1>
			        Tambah Admin
			        <small>PT. Hofz Indonesia</small>
			      </h1>
			      
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
			     		<!-- End Validasi Tambah Data -->
			            
			            <div class="box-body">
			              <table id="tbl_produk" class="table table-bordered table-striped tbl_produk">
			                <form enctype="multipart/form-data" method="POST" action="<?php echo base_url(). "register/controller_register/do_add"; ?>">

							<tr>
								<td width="110">NAMA DEPAN</td>
								<td>
									<input type="text" name="nama_depan" size="30" placeholder="nama depan" required/>
								</td>
							</tr>

							<tr>
								<td width="110">NAMA BELAKANG</td>
								<td>
									<input type="text" name="nama_belakang" size="30" placeholder="nama_belakang" required/>
								</td>
							</tr>

							<tr>
								<td width="110">USERNAME</td>
								<td>
									<input type="text" name="username" size="30" placeholder="username" required/>
								</td>
							</tr>

							<tr>
								<td width="110">PASSWORD</td>
								<td>
									<input type="password" name="password" size="30" placeholder="password" required/>
								</td>
							</tr>

							<tr>
								<td width="110">STATUS</td>
								<td>
									<select name="status" required/>
										<option>-- Select Status --</option>
										<option value="admin" required/>admin</option>
										<option value="purchasing" required/>purchasing</option>
										<option value="warehouse" required/>warehouse</option>
										<option value="warehouse" required/>user</option>
									</select>
								</td>
							</tr>

							<tr>
								<td width="100">FOTO</td>
								<td><input type="file" name="file"></td>
							</tr>

							<tr>
								<td></td>
								<td>
									<button type="submit" class="btn btn-info">SAVE</button>
									<button type="reset" class="btn btn-danger">CANCEL</button>
								</td>
							</tr>
							</form>
			              </table>
			            </div>
			            <!-- /.box-body -->
			          </div>
			    </section>
			    <!-- End Mian Content -->

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