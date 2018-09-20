<!DOCTYPE html>
<html>
<head>
	<title>Tambah Barang Masuk</title>
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
			      <h1>Tambah Barang Masuk</h1>
			        <small>PT. Hofz Indonesia</small>
			        <ol class="breadcrumb">
			        	<li class="fa fa-pencil-square-o">Transaksi</li>
			        	<li class="active">Barang Masuk</li>
			        	<li class="active">Tambah Barang Masuk</li>
			        </ol>
			   
			      
			    </section>

			    <!-- Main content -->
			    <section class="content">
			      <div class="box">

			      	<?php 
				      $kode = "";
				      if($this->uri->segment(3) == "edit"){
				        $kode = $rc->position_kode;
				      }else{
				        $kode = generate_barang_masuk('nomer_transaksi', 'barang_masuk', 'RCV');
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
			                <form method="POST" action="<?php echo base_url(). "barang_masuk/controller_barang_masuk/do_add"; ?>">

							<tr>
								<td width="130" hidden="hidden">NOMER TRANSAKSI</td>
								<td>
									<input type="hidden" value="<?php echo $kode; ?>" class="form-control" name="nomer_transaksi" size="10">
								</td>
							</tr>

							<tr>
								<td width="110">TANGGAL</td>
								<td>
									<input type="date" name="tanggal" size="30">
								</td>
							</tr>

							<tr>
								<td width="110">KODE BARANG</td>	
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
								<td width="110">SUPPLIER</td>	
								<td>
								<select name="kode_supplier" id="kode_supplier">
									<?php if(count($supplier)){ ?>
										<option value=''>-- Select Supplier --</option>
										<?php foreach ($supplier as $list){ ?>
											<?php
												echo "<option value='".$list['kode_supplier']."'>".$list['kode_supplier']. ' - ' .$list['nama_supplier']."</option>";
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
										<option value="Pemasukan" required/>Pemasukan</option>
										<option value="Pemasukan" required/>Pengembalian</option>
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