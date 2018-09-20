<!DOCTYPE html>
<html>
<head>
	<title>Tambah Cart</title>
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
			        Tambah Cart
			        <small>PT. Hofz Indonesia</small>
			      </h1>
			      
			    </section>

			    <!-- Main content -->
			    <section class="content">
			      <div class="box">
			            <div class="box-header">
			              <h3 class="box-title">Data Table With Full Features</h3>
			            </div>
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
			                <form method="POST" action="<?php echo base_url(). "cart/controller_cart/do_add"; ?>">

							<tr>
								<td width="110">NOMER TRANSAKSI</td>
								<td>
									<input type="text" name="nomer_transaksi" size="30" readonly="readonly" placeholder="tidak wajib diisi">
								</td>
							</tr>

							<tr>
								<td width="110">TANGGAL</td>
								<td>
									<input type="date" name="tanggal" size="30" required/>
								</td>
							</tr>

							<tr>
								<td width="110">KODE BARANG</td>
								<!-- <td>
									<input type="text" name="kode_barang" size="30" placeholder="Kode Barang" required/>
								</td> -->
								<!-- Data Combo -->	
								<td>
								<select name="kode_barang" id="kode_barang">
									<?php if(count($stok_barang)){ ?>
										<option value=''>-- Select Kode Barang --</option>
										<?php foreach ($stok_barang as $list){ ?>
											<?php
												echo "<option value='".$list['kode_barang']."'>".$list['kode_barang']. ' - ' .$list['nama_barang']."</option>";
											?>
										<?php } ?>
									<?php } ?>

								</select>
								</td>
							</tr>

							<tr>
								<td width="110">JUMLAH BARANG</td>
								<td>
									<input type="text" name="jumlah_barang" size="30" placeholder="Jumlah Barang" required/>
								</td>
							</tr>

							<tr>
								<td width="110">SATUAN</td>
								<td>
									<input type="text" name="satuan" size="30" placeholder="satuan" required/>
								</td>
							</tr>

							<tr>
								<td width="110">KETERANGAN</td>
								<td>
									<input type="text" name="keterangan" size="30" placeholder="Keterangan" required/>
								</td>
							</tr>

							<tr>
								<td></td>
								<td>
									<button type="submit" class="btn btn-info">SAVE</button>
									<button type="reset" class="btn btn-danger">CANCEL</button>
								</td>
							</tr>

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