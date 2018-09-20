<!DOCTYPE html>
<html>
<head>
	<title>Tambah Reture Barang</title>
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
			      <h1>Tambah Reture Barang</h1>
			        <small>PT. Hofz Indonesia</small>
			        <ol class="breadcrumb">
			        	<li class="fa fa-pencil-square-o">Transaksi</li>
			        	<li class="active">Reture Barang</li>
			        	<li class="active">Tambah Reture Barang</li>
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
				        $kode = generate_reture_barang('nomer_reture', 'reture_barang', 'RTR');
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
			                <form method="POST" action="<?php echo base_url(). "reture_barang/controller_reture_barang/do_add"; ?>">

							<tr>
								<td width="130" hidden="hidden">NOMER RETURE</td>
								<td>
									<input type="hidden" value="<?php echo $kode; ?>" class="form-control" name="nomer_reture" size="10">
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
								<td width="110">NAMA BARANG</td>	
								<td>
								<select name="nama_barang" id="nama_barang">
									<?php if(count($stok_barang)){ ?>
										<option value=''>-- Select Nama Barang --</option>
										<?php foreach ($stok_barang as $list){ ?>
											<?php
												echo "<option value='".$list['nama_barang']."'>".$list['nama_barang']. ' - ' .$list['kode_barang']."</option>";
											?>
										<?php } ?>
									<?php } ?>

								</select>
								</td>
							</tr>

							<tr>
								<td width="110">JUMLAH RETURE</td>
								<td>
									<input type="text" name="jumlah_reture" size="30" placeholder="Jumlah Reture" required/>
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