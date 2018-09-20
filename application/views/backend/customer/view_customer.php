<!DOCTYPE html>
<html>
<head>
	<title>View Customer</title>
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
			      <h1>Data Customer</h1>
			        <small>PT. Hofz Indonesia</small>
			        <ol class="breadcrumb">
		              <li class="fa fa-database">&nbsp; Master Barang</li>
		              <li class="active">Data Customer</li>
		            </ol>
			        <p></p>
			       <div>
			        <a href="<?php echo base_url(). "customer/controller_customer/add_data"; ?>">
            		<button class="btn btn-primary fa fa-plus">Add Data</button>
          		    </a>

          		    <!-- Print Manual -->
          		    <button style="float: right;" style="margin-right: 5px" onclick="javascript:window.print();" class="btn btn-sm btn-info fa fa-print" title="Print"></button>
           		    <!-- End Print Manual -->

          		    <!-- Print Excel -->
          		    <i style="float: right;">&nbsp;</i>
          		    <a href="<?php echo base_url(). "customer/controller_customer/export_excel"; ?>">
            	    <button style="float: right;" class="btn btn-sm btn-success fa fa-file-excel-o" title="EXCEL"></button>
          		    </a>
          		    <!-- End Print Excel -->

          		    <!-- Print Pdf -->
          		    <i style="float: right;">&nbsp;</i>
          		    <a href="<?php echo base_url(). "customer/controller_customer/export_pdf"; ?>" target ="_blank">
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
			                  <th>Kode Customer</th>
			                  <th>Nama Customer</th>
			                  <th>Alamat</th>
			                  <th>Kota</th>
   			                  <th>Email</th>
			                  <th>Telp</th>
			                  <th>Fax</th>
			                  <th class="no-print">Action</th>
			                </tr>
			                </thead>

			                <tbody>
			                <?php $i = 1; foreach ($customer->result() as $d) { ?>
			                <tr>
			                  <td><?php echo $i; ?></td>
			                  <td><?php echo $d->kode_customer; ?></td>
			                  <td><?php echo $d->nama_customer; ?></td>
			                  <td><?php echo $d->alamat; ?></td>
			                  <td><?php echo $d->kota; ?></td>
			                  <td><?php echo $d->email; ?></td>
			                  <td><?php echo $d->telp; ?></td>
			                  <td><?php echo $d->fax; ?></td>
			                  <td align="center" class="no-print">
			                    <a href="<?php echo base_url(). "customer/controller_customer/edit_data/".$d->kode_customer; ?>"><button class="fa fa-pencil btn btn-sm btn-info" title="Edit"></button></a>
			                    <a onclick="return konfirmasi()" href="<?php echo base_url(). "customer/controller_customer/do_delete/".$d->kode_customer; ?>"><button class="fa fa-trash btn btn-sm btn-danger" title="Delete"></button></a>
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