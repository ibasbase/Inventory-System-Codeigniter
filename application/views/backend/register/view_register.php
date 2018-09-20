<!DOCTYPE html>
<html>
<head>
	<title>View Register</title>
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
			        Register
			        <small>PT. Hofz Indonesia</small>
			      </h1>
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
			                  <th>Nama Depan</th>
			                  <th>Nama Belakang</th>
			                  <th>Tanggal</th>
			                  <th>Username</th>
			                  <th>Password</th>
			                  <th>Status</th>
			                  <th>Foto</th>
			                  <th>Action</th>
			                  <!-- <th>
			                    <a href="<?php echo base_url(). "register/controller_register/add_data"; ?>"> 
			                    <button class="btn-sm btn btn-success">Tambah Data</button>
			                    </a>
			                  </th> -->
			                </tr>
			                </thead>

			                <tbody>
			                <?php $i = 1; foreach ($register->result() as $d) { ?>
			                <tr>
			                  <td><?php echo $i; ?></td>
			                  <td><?php echo $d->nama_depan ?></td>
			                  <td><?php echo $d->nama_belakang ?></td>
			                  <td><?php echo $d->tanggal ?></td>
			                  <td><?php echo $d->username ?></td>
			                  <td><?php echo $d->password ?></td>
			                  <td><?php echo $d->status ?></td>
			                  <td>
								<img src="<?php echo base_url(). "gambar_upload/".$d->foto ?>" width="60" height="60">
							  </td>
			                  <td align="center">
			                    <a onclick="return konfirmasi()" href="<?php echo base_url(). "register/controller_register/do_delete/".$d->nama_depan; ?>"><button class="btn btn-danger btn-sm">DELETE</button></a>
			                  </td>
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