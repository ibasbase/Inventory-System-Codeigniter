<!DOCTYPE html>
<html>
<head>
	<title>Edit Purchas Receiving Reture</title>
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
			      <h1>Edit Purchas Receiving Reture</h1>
			        <small>PT. Hofz Indonesia</small>
			        <ol class="breadcrumb">
			        	<li class="fa fa-pencil-square-o">Purchasing</li>
			        	<li class="active">Purchas Receiving Reture</li>
			        	<li class="active">Edit Purchas Receiving Reture</li>
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
			               <form method="POST" action="<?php echo base_url(). "purchas_receivingrtr/controller_purchas_receivingrtr/do_edit"; ?>"> 

							<tr>
								<td width="110" hidden="hidden">NOMER RECEIVING RETURE</td>
								<td>
								<input type="text" name="nomer_receivingrtr" size="30" hidden="hidden" value="<?php echo $nomer_receivingrtr; ?>">
								</td>
							</tr>

							<tr>
								<td width="110" hidden="hidden">NOMER RETURE</td>
								<td>
								<input type="text" name="nomer_reture" size="30" hidden="hidden" value="<?php echo $nomer_reture; ?>">
								</td>
							</tr>

							<tr>
								<td width="110">TANGGAL</td>
								<td>
								<input type="date" name="tanggal" size="30" value="<?php echo $tanggal; ?>" required/>
								</td>
							</tr>

							<tr>
								<td width="110">KODE BARANG</td>
								<td>
								<input type="text" name="kode_barang" size="30" value="<?php echo $kode_barang; ?>" required/>
								</td>
							</tr>

							<tr>
								<td width="110">JUMLAH BARANG</td>
								<td>
								<input type="text" name="jumlah_barang" size="30" value="<?php echo $jumlah_barang; ?>" required/>
								</td>
							</tr>

							<tr>
								<td width="110">KETERANGAN</td>
								<td>
								<input type="text" name="keterangan_barang" size="30" value="<?php echo $keterangan_barang; ?>" required/>
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