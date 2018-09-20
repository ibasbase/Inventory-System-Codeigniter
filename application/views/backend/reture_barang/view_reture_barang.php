<!DOCTYPE html>
<html>
<head>
	<title>View Reture Barang</title>
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
			      <h1>Reture Barang</h1>
			        <small>PT. Hofz Indonesia</small>
			        <ol class="breadcrumb">
			        	<li class="fa fa-pencil-square-o">&nbsp; Transaksi</li>
			        	<li class="active">Reture Barang</li>
			        	
			        </ol>
			     <div>
			      <p></p>
			      <a href="<?php echo base_url(). "reture_barang/controller_reture_barang/add_data"; ?>">
            		<button class="btn btn-primary fa fa-plus">Add Data</button>
          		  </a>

          		  <!-- Print Manual -->
          		  <button style="float: right;" style="margin-right: 5px" onclick="javascript:window.print();" class="btn btn-sm btn-info fa fa-print" title="Print"></button>
          		  <!-- End Print Manual -->

          		  <!-- Print Excel -->
          		  <i style="float: right;">&nbsp;</i>
          		  <a href="<?php echo base_url(). "reture_barang/controller_reture_barang/export_excel"; ?>" target = "_blank">
            	  <button style="float: right;" class="btn btn-sm btn-success fa fa-file-excel-o" title="EXCEL"></button>
          		  </a>
          		  <!-- End Print Excel -->

          		  <!-- Print Pdf -->
          		  <i style="float: right;">&nbsp;</i>
		          <a href="<?php echo base_url(). "reture_barang/controller_reture_barang/export_pdf"; ?>" target = "_blank">
		            <button style="float: right;" class="btn btn-sm btn-danger fa fa-file-pdf-o" title="PDF"></button>
		          </a>
		          <!-- End Print Pdf -->

          		 </div>
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
			                  <th>Nomer Reture</th>
			                  <th>Tanggal</th>
			                  <th>Kode Barang</th>
			                  <th>Nama Barang</th>
			                  <th>Jumlah Reture</th>
			                  <th>Jumlah Kedatangan</th>
			                  <th>Ket</th>
			                  <th>Status</th>
			                  <th class="no-print">Action</th>
			                </tr>
			                </thead>

			                <tbody>
			                <?php $i = 1; foreach ($reture_barang->result() as $d) { ?>
			                	<?php
			                		if($d->jumlah_reture > $d->jumlah_kedatangan){
			                			$ketwarna='On Proses';
			                			$warna='label-danger';
			                		}else{
			                			$ketwarna='Close';
			                			$warna='label-success';
			                		}
			                	?>

			                <tr>
			                  <td><?php echo $i; ?></td>
			                  <td><?php echo $d->nomer_reture ?></td>
			                  <td><?php echo $d->tanggal ?></td>
			                  <td><?php echo $d->kode_barang ?></td>
			                  <td><?php echo $d->nama_barang ?></td>
			                  <td><?php echo $d->jumlah_reture ?></td>
			                  <td><?php echo $d->jumlah_kedatangan ?></td>
			                  <td><?php echo $d->keterangan ?></td>
			                  <td style="text-align: center;" class="<?php echo $warna; ?>"><?php echo $ketwarna ?></td>
			                  <td align="center" class="no-print">
			                    <a href="<?php echo base_url(). "reture_barang/controller_reture_barang/edit_data/".$d->nomer_reture; ?>"><button class="fa fa-pencil btn btn-sm btn-info" title="Edit"></button></a>
			                    <a onclick="return konfirmasi()" href="<?php echo base_url(). "reture_barang/controller_reture_barang/do_delete/".$d->nomer_reture; ?>"><button class="fa fa-trash btn btn-sm btn-danger" title="Delete"></button></a>
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