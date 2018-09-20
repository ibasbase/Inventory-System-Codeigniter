<!DOCTYPE html>
<html>
<head>
	<title>View Laporan Barang Masuk</title>
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
			      <h1>Laporan Barang Masuk</h1>
			        <small>PT. Hofz Indonesia</small>
			        <i style="float: right;">&nbsp;</i>
			        <button style="float: right;" class="btn btn-sm btn-info" onclick="btnPrint()"><span class="fa fa-print">Print Out</span></button>
			        <br>
			        <center>
			        	 <div class="row">
        <div class="col-sm-12"> 
             <div class="card">
                <div class="card-body">
                        <?=  form_open('laporan_barang_masuk/controller_laporan_barang_masuk/print_periode') ?>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">Start Date</label>
                                            <input type="date" class="form-control" name="tanggal1">
                                        <span class="material-input"></span></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">End Date</label>
                                            <input type="date" class="form-control" name="tanggal2">
                                        <span class="material-input"></span></div>
                                    </div>
                                    <div class="col-md-6">
                                    	<br>
                                        <button style="float: right;" type="submit" name="submit" class="btn btn-danger btn-raised"><i class="material-icons">Search</i>
                                        </button>
                                    </div>
                                </div>
                            </form>
			        <a href="<?php echo base_url(). "laporan_barang_masuk/controller_laporan_barang_masuk"; ?>"><button style="float: right;" class="btn btn-primary">Refresh</button></a>
                   </div>
                </div>
        </div>
    </div>
			        </center>
			    </section>

			    <!-- Main content -->
			    <section class="content">
			      <div class="box">
			            <div class="box-header">
			              <h3 class="box-title">Data Table With Full Features</h3>
			            </div>
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
			            	<!-- untuk manggil print out menggunakan id --> 
			              <table id="tbl_barang_masuk" class="table table-bordered table-striped">
			                <thead>
			                <tr>
			                  <th>No</th>
			                  <th>Tanggal</th>
			                  <th>Kode Barang</th>
			                  <th>Kode Supplier</th>
			                  <th>Jumlah Barang</th>
			                  <th>Satuan</th>
			                  <th>Keterangan</th>
			                  <!-- <th class="no-print"> -->
			                    <!-- <a href="#"> 
			                    <button class="btn btn-primary pull-center"><span class="fa fa-print">Print Out</span></button> -->

			                    <!-- <button class="btn btn-primary pull-center" onclick="btnPrint()"><span class="fa fa-print">Print Out</span></button> -->

			          
							</div>

			                    </a>
			                  </th>
			                </tr>
			                </thead>

			                <tbody>
			                <?php $i = 1; foreach ($barang_masuk->result() as $d) { ?>
			                <tr>
			                  <td><?php echo $i; ?></td>
			                  <td><?php echo $d->tanggal ?></td>
			                  <td><?php echo $d->kode_barang ?></td>
			                  <td><?php echo $d->kode_supplier ?></td>
			                  <td><?php echo $d->jumlah_barang ?></td>
			                  <td><?php echo $d->satuan ?></td>
			                  <td><?php echo $d->keterangan ?></td>
			                  <!-- <td align="center" class="no-print">
			                    <a onclick="return konfirmasi()" href="<?php echo base_url(). "laporan_barang_masuk/controller_laporan_barang_masuk/do_delete/".$d->kode_barang; ?>"><button class="btn btn-danger btn-sm">DELETE</button></a> -->
			                  </td>
			                </tr>
			                <?php $i++; } ?>
			                </tbody>
			              </table>
			            </div>
			            <!-- /.box-body -->
			          </div>

			         <script>
						function btnPrint(){
				        var divToPrint  = document.getElementById('tbl_barang_masuk');
				        var popupWin    = window.open('', '_blank', 'width=700, height=500');
				        popupWin.document.open();
				        popupWin.document.write('<html>\n\
				                                    <head>\n\
				                                    </head>\n\n\
				                                    <body onload="window.print()">\n\
				                                        <h2 align="center">Report barang_masuk</h2>\n\
				                                        <table align="center" border="1" style="border-collapse: collapse;">\n\
				                                            '+ divToPrint.innerHTML +'\n\
				                                        </table>\n\
				                                    </body>\n\
				                                </html>');
				        popupWin.document.close();

				    }
				    </script>

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