<!DOCTYPE html>
<html>
<head>
	<title>View Barang Keluar</title>
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
			      <h1>Barang Keluar</h1>
			        <small>PT. Hofz Indonesia</small>
			      <p></p>
			     <div> 
			      <a href="<?php echo base_url(). "barang_keluar/controller_barang_keluar/add_data"; ?>">
            		<button class="btn btn-primary fa fa-plus">Add Data</button>
          		  </a>

          		  <!-- Print Manual -->	
          		  <button style="float: right;" style="margin-right: 5px" onclick="javascript:window.print();" class="btn btn-sm btn-info fa fa-print" title="PRINT"></button>
          		  <!-- End Print Manual -->

          		  <!-- Print Excel -->
          		  <i style="float: right;">&nbsp;</i>
          		  <a href="<?php echo base_url(). "barang_keluar/controller_barang_keluar/export_excel"; ?>" target = "_blank">
            	  <button style="float: right;" class="btn btn-sm btn-success fa fa-file-excel-o" title="EXCEL"></button>
          		  </a>
          		  <!-- End Print Excel -->

          		  <!-- Print Pdf -->
          		  <i style="float: right;">&nbsp;</i>
		          <a href="<?php echo base_url(). "barang_keluar/controller_barang_keluar/export_pdf"; ?>" target = "_blank">
		            <button style="float: right;" class="btn btn-sm btn-danger fa fa-file-pdf-o" title="PDF"></button>
		          </a>
		          <!-- End Print Pdf -->

				 </div>
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
			                  <th>Nomer Transaksi</th>
			                  <th>Tanggal</th>
			                  <th>Kode Barang</th>
			                  <th>Jumlah Barang</th>
			                  <th>Satuan</th>
			                  <th>Keterangan</th>
			                  <th class="no-print">Action</th>
			                </tr>
			                </thead>

			                <tbody>
			                <?php $i = 1; foreach ($barang_keluar->result() as $d) { ?>
			                <tr>
			                  <td><?php echo $i; ?></td>
			                  <td><?php echo $d->nomer_transaksi ?></td>
			                  <td><?php echo $d->tanggal ?></td>
			                  <td><?php echo $d->kode_barang ?></td>
			                  <td><?php echo $d->jumlah_barang ?></td>
			                  <td><?php echo $d->satuan ?></td>
			                  <td><?php echo $d->keterangan ?></td>
			                  <td align="center" class="no-print">
			                    <a href="<?php echo base_url(). "barang_keluar/controller_barang_keluar/edit_data/".$d->nomer_transaksi; ?>"><button class="fa fa-pencil btn btn-sm btn-info" title="Edit"></button></a>
			                    <a onclick="return konfirmasi()" href="<?php echo base_url(). "barang_keluar/controller_barang_keluar/do_delete/".$d->nomer_transaksi; ?>"><button class="fa fa-trash btn btn-sm btn-danger" title="Delete"></button></a>
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