<!DOCTYPE html>
<html>
<head>
	<title>Tambah Barang Keluar</title>
	<?php $this->load->view('backend/template/link.php'); ?>
</head>
<body class="hold-transition skin-purple-light sidebar-mini">
	<div class="wrapper">
		<!-- start HEADER -->
		<div>
			<?php $this->load->view('backend/template/header_cart.php'); ?>
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
			      <h1>Tambah Barang Keluar</h1>
			        <small>PT. Hofz Indonesia</small>
			        <ol class="breadcrumb">
			        	<li class="fa fa-pencil-square-o">Transaksi</li>
			        	<li class="active">Barang Keluar</li>
			        	<li class="active">Tambah Barang Keluar</li>
			        </ol>

			        <!-- <?php $url_cart = '' ;?>
			          <li class="tasks-menu notifications-menu">
			            <a href="<?php echo base_url(). "cart/controller_cart"; ?>">
			              <i class="fa fa-shopping-cart"></i>
			              <span class="label label-danger">
			                <?php echo $masuk; ?>
			              </span>
			            </a>
			          </li> -->
			      
			    </section>

			    <!-- Main content -->
			    <section class="content">
			      <div class="box">

			      	<?php 
				      $kode = "";
				      if($this->uri->segment(3) == "edit"){
				        $kode = $rc->position_kode;
				      }else{
				        $kode = generate_barang_keluar('nomer_transaksi', 'barang_keluar', 'OUT');
				      }
				    ?>

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
								<td width="130" hidden="hidden">NOMER TRANSAKSI</td>
								<td>
									<input type="hidden" value="<?php echo $kode; ?>" class="form-control" name="nomer_transaksi" size="30">
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
									<select name="satuan" required/>
										<option>-- Select Satuan --</option>
										<option value="Pcs" required/>Pcs</option>
										<option value="Unit" required/>Unit</option>
										<option value="Kit" required/>Kit</option>
									</select>
								</td>
							</tr>

							<tr>
								<td width="110">KETERANGAN</td>
								<td>
									<select name="keterangan" required/>
										<option>-- Select Keterangan --</option>
										<option value="Pengambilan" required/>Pengambilan</option>
										<option value="Penjualan" required/>Penjualan</option>
										<option value="Reject" required/>Reject</option>
										<option value="NG" required/>NG</option>
									</select>
								</td>
							</tr>

							<tr>
								<td></td>
								<td>
									<button type="submit" class="btn btn-info" onclick="return konfirmasi()">SAVE</button>
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