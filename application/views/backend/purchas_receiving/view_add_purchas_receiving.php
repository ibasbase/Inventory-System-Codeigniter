<!DOCTYPE html>
<html>
<head>
	<title>Tambah Purchas Reveiving</title>
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
			      <h1>Tambah Purchas Receiving</h1>
			        <small>PT. Hofz Indonesia</small>
			        <ol class="breadcrumb">
			        	<li class="fa fa-pencil-square-o">Purchasing</li>
			        	<li class="active">Purchas Reveiving</li>
			        	<li class="active">Tambah Purchas Receiving</li>
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
				        $kode = generate_purchas_receiving('nomer_receiving', 'purchas_receiving', 'RCV');
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
			                <form method="POST" action="<?php echo base_url(). "purchas_receiving/controller_purchas_receiving/do_add"; ?>">

							<tr>
								<td width="130" hidden="hidden">NOMER RECEIVING</td>
								<td>
									<input type="hidden" value="<?php echo $kode; ?>" class="form-control" name="nomer_receiving" size="10">
								</td>
							</tr>

							<tr>
								<td width="110">TANGGAL</td>
								<td>
									<input type="date" name="tanggal" size="30">
								</td>
							</tr>

							<tr>
								<td width="110">NOMER ORDER</td>	
								<td>
								<select name="nomer_order" id="nomer_order">
									<?php if(count($order_barang)){ ?>
										<option value=''>-- Select Nomer Order --</option>
										<?php foreach ($order_barang as $list){ ?>
											<?php
												echo "<option value='".$list['nomer_order']."'>".$list['nomer_order']. ' - ' .$list['nama_barang']."</option>";
											?>
										<?php } ?>
									<?php } ?>

								</select>
								</td>
							</tr>

							<tr>
								<td width="110">KODE SUPPLIER</td>	
								<td>
								<select name="kode_supplier" id="kode_supplier">
									<?php if(count($supplier)){ ?>
										<option value=''>-- Select Kode Supplier --</option>
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
								<td width="110">KETERANGAN BARANG</td>
								<td>
									<input type="text" name="keterangan_barang" size="30" placeholder="Keterangan Barang" required/>
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