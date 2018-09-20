<?php  
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=$title.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
?>

<table border="1" width="100%">
	<thead>
		<tr>
			<th>NO</th>
			<th>NOMER PURCHAS RETURE</th>
			<th>NOMER RETURE</th>
			<th>TANGGAL</th>
			<th>KODE BARANG</th>
			<th>JUMLAH BARANG</th>
			<th>SATUAN</th>
			<th>KETERANGAN BARANG</th>
		</tr>
	</thead>
	
	<tbody>
		<?php $i=1; foreach($purchas_receivingrtr->result() as $row){ ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $row->nomer_receivingrtr; ?></td>
			<td><?php echo $row->nomer_reture; ?></td>
			<td><?php echo date("Y-m-d", strtotime($row->tanggal)); ?></td>
			<td><?php echo $row->kode_barang; ?></td>
			<td><?php echo $row->jumlah_barang; ?></td>
			<td><?php echo $row->keterangan_barang; ?></td>
		</tr>
		<?php $i++; } ?>
	</tbody>
</table>