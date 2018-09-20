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
			<th>TANGGAL</th>
			<th>KODE BARANG</th>
			<th>KODE SUPPLIER</th>
			<th>JUMLAH BARANG</th>
			<th>SATUAN</th>
			<th>KETERANGAN</th>
		</tr>
	</thead>
	
	<tbody>
		<?php $i=1; foreach($barang_masuk->result() as $row){ ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo date("Y-m-d", strtotime($row->tanggal)); ?></td>
			<td><?php echo $row->kode_barang; ?></td>
			<td><?php echo $row->kode_supplier; ?></td>
			<td><?php echo $row->jumlah_barang; ?></td>
			<td><?php echo $row->satuan; ?></td>
			<td><?php echo $row->keterangan; ?></td>
		</tr>
		<?php $i++; } ?>
	</tbody>
</table>