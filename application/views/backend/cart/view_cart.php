<!DOCTYPE html>
<html>
<head>
	<title>View Cart</title>
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
			      <h1>Cart</h1>
			        <small>PT. Hofz Indonesia</small>

			        <!-- Print Manual -->	
          		  <button style="float: right;" style="margin-right: 5px" onclick="javascript:window.print();" class="btn btn-sm btn-info fa fa-print" title="PRINT"></button>
          		  <!-- End Print Manual -->

          		  <!-- Print Excel -->
          		  <i style="float: right;">&nbsp;</i>
          		  <a href="<?php echo base_url(). "cart/controller_cart/export_excel"; ?>" target = "_blank">
            	  <button style="float: right;" class="btn btn-sm btn-success fa fa-file-excel-o" title="EXCEL"></button>
          		  </a>
          		  <!-- End Print Excel -->

          		  <!-- Print Pdf -->
          		  <i style="float: right;">&nbsp;</i>
		          <a href="<?php echo base_url(). "cart/controller_cart/export_pdf"; ?>" target = "_blank">
		            <button style="float: right;" class="btn btn-sm btn-danger fa fa-file-pdf-o" title="PDF"></button>
		          </a>
		          <!-- End Print Pdf -->

			    </section>

			    <!-- Main content -->
			    <section class="content">
			      <div class="box">
			            <!-- Validasi Hapus Data -->
			    <script type="text/javascript" language="JavaScript">
			         function konfirmasi()
			         {
			         tanya = confirm("Konfirmasi data ?");
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
			                  <th class="no-print"></th>
			                </tr>
			                </thead>

			                <tbody>
			                <?php $i = 1; foreach ($cart->result() as $d) { ?>
			                <tr>
			                  <td><?php echo $i; ?></td>
			                  <td><?php echo $d->nomer_transaksi ?></td>
			                  <td><?php echo $d->tanggal ?></td>
			                  <td><?php echo $d->kode_barang ?></td>
			                  <td><?php echo $d->jumlah_barang ?></td>
			                  <td><?php echo $d->satuan ?></td>
			                  <td><?php echo $d->keterangan; ?></td>
			                  <td align="center" class="no-print">
			                    <a onclick="return konfirmasi()" href="<?php echo base_url(). "cart/controller_cart/do_delete/".$d->nomer_transaksi; ?>"><button class="btn btn-info btn-sm">Confirm</button></a>
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