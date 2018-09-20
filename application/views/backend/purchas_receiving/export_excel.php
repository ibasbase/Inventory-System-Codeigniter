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
			<th>NOMER RECEIVING</th>
			<th>TANGGAL</th>
			<th>NOMER ORDER</th>
			<th>KODE BARANG</th>
			<th>JUMLAH BARANG</th>
			<th>KETERANGAN</th>
		</tr>
	</thead>
	
	<tbody>
		<?php $i=1; foreach($purchas_receiving->result() as $row){ ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $row->nomer_receiving; ?></td>
			<td><?php echo date("Y-m-d", strtotime($row->tanggal)); ?></td>
			<td><?php echo $row->nomer_order; ?></td>
			<td><?php echo $row->kode_barang; ?></td>
			<td><?php echo $row->jumlah_barang; ?></td>
			<td><?php echo $row->keterangan_barang; ?></td>
		</tr>
		<?php $i++; } ?>
	</tbody>
</table>