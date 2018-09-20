<!DOCTYPE html>
<html>
<head>
	<title>View Laporan Reture Barang</title>
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
			      <h1>Laporan Reture Barang</h1>
			        <small>PT. Hofz Indonesia</small>
			        <ol class="breadcrumb">
			        	<i style="float: right;">&nbsp;</i>
			        		<button style="float: right;" class="btn btn-sm btn-info" onclick="btnPrint()"><span class="fa fa-print">Print Out</span></button>
			        </ol>
			        <br>
			        <center>
			        	 <div class="row">
        <div class="col-sm-12"> 
             <div class="card">
                <div class="card-body">
                        <?=  form_open('laporan_reture_barang/controller_laporan_reture_barang/print_periode') ?>
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
			        <a href="<?php echo base_url(). "laporan_reture_barang/controller_laporan_reture_barang"; ?>"><button style="float: right;" class="btn btn-primary">Refresh</button></a>
                   </div>
                </div>
        </div>
    </div>
			        </center>

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
			              <table id="tbl_reture_barang" class="table table-bordered table-striped tbl_produk">
			                <thead>
			                <tr>
			                  <th>No</th>
			                  <th>Nomer Reture</th>
			                  <th>Tanggal</th>
			                  <th>Kode Barang</th>
			                  <th>Nama Barang</th>
			                  <th>Jumlah Reture</th>
			                  <th>Jumlah Kedatangan</th>
			                  <th>Status</th>
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
			                </tr>
			                <?php $i++; } ?>
			                </tbody>
			              </table>
			            </div>
			            <!-- /.box-body -->
			          </div>

			          <script>
						function btnPrint(){
				        var divToPrint  = document.getElementById('tbl_reture_barang');
				        var popupWin    = window.open('', '_blank', 'width=700, height=500');
				        popupWin.document.open();
				        popupWin.document.write('<html>\n\
				                                    <head>\n\
				                                    </head>\n\n\
				                                    <body onload="window.print()">\n\
				                                        <h2 align="center">Report reture_barang</h2>\n\
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