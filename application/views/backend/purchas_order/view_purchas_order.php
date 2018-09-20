<!DOCTYPE html>
<html>
<head>
	<title>View Purchas Order</title>
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
			      <h1>Purchas Order</h1>
			        <small>PT. Hofz Indonesia</small>
			        <ol class="breadcrumb">
			        	<li class="fa fa-pencil-square-o">&nbsp; Purchasing</li>
			        	<li class="active">Purchas Order</li>
			        </ol>
			        <button style="float: right;" style="margin-right: 5px" onclick="javascript:window.print();" class="btn btn-sm btn-info fa fa-print" title="Print"></button>
          		  <!-- End Print Manual -->

          		  <!-- Print Excel -->
          		  <i style="float: right;">&nbsp;</i>
          		  <a href="<?php echo base_url(). "purchas_order/controller_purchas_order/export_excel"; ?>" target = "_blank">
            	  <button style="float: right;" class="btn btn-sm btn-success fa fa-file-excel-o" title="EXCEL"></button>
          		  </a>
          		  <!-- End Print Excel -->

          		  <!-- Print Pdf -->
          		  <i style="float: right;">&nbsp;</i>
		          <a href="<?php echo base_url(). "purchas_order/controller_purchas_order/export_pdf"; ?>" target = "_blank">
		            <button style="float: right;" class="btn btn-sm btn-danger fa fa-file-pdf-o" title="PDF"></button>
		          </a>
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
			                  <th>Nomer Order</th>
			                  <th>Tanggal</th>
			                  <th>Kode Barang</th>
			                  <th>Nama Barang</th>
			                  <th>Jumlah Order</th>
			                  <th>Jumlah Kedatangan</th>
			                  <th>Ket</th>
			                  <th>Status</th>
			                  <!-- <th class="no-print">Action</th> -->
			                </tr>
			                </thead>

			                <tbody>
			                <?php $i = 1; foreach ($order_barang->result() as $d) { ?>
			                	<?php
			                		if($d->jumlah_order > $d->jumlah_kedatangan){
			                			$ketwarna='On Proses';
			                			$warna='label-danger';
			                		}else{
			                			$ketwarna='Close';
			                			$warna='label-success';
			                		}
			                	?>

			                <tr>
			                  <td><?php echo $i; ?></td>
			                  <td><?php echo $d->nomer_order ?></td>
			                  <td><?php echo $d->tanggal ?></td>
			                  <td><?php echo $d->kode_barang ?></td>
			                  <td><?php echo $d->nama_barang ?></td>
			                  <td><?php echo $d->jumlah_order ?></td>
			                  <td><?php echo $d->jumlah_kedatangan ?></td>
			                  <td><?php echo $d->keterangan ?></td>
			                  <td style="text-align: center;" class="<?php echo $warna; ?>"><?php echo $ketwarna ?></td>
			                  <!-- <td align="center" class="no-print">
			                    <a href="<?php echo base_url(). "purchas_order/controller_purchas_order/edit_data/".$d->nomer_order; ?>"><button class="fa fa-pencil btn btn-sm btn-info" title="Edit"></button></a>
			                    <a onclick="return konfirmasi()" href="<?php echo base_url(). "purchas_order/controller_purchas_order/do_delete/".$d->nomer_order; ?>"><button class="fa fa-trash btn btn-sm btn-danger" title="Delete"></button></a> -->
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