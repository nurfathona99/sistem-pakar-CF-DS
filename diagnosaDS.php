<div class="page-header">
    <h1><center>Diagnosa <i>Dempster Shafer</i> Penyakit</center></h1>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
		<form class="form-inline">
				<input type="hidden" name="m" value="diagnosaDS" />
				<div class="form-group">
					<input class="form-control" type="text" title="Pencarian Data Diagnosa" placeholder="Pencarian. . ." name="q" value="<?=$_GET['q']?>" />
				</div>
				<div class="form-group">
					<button class="btn btn-primary"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
				</div>
				<div class="form-group">
					<a class="btn btn-primary" href="?m=diagnosaDS_tambah" title="Tambah Data Diagnosa"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
				</div>
		</form>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered table-hover table-striped">
			<thead>
				<tr class="nw bg-info">
					<th>No</th>
					<th>Kode</th>
					<th>Nama Diagnosa</th>
					<th>Keterangan</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<?php
				$q = esc_field($_GET['q']);
				$rows = $db->get_results("SELECT * FROM tb_diagnosads 
						WHERE kode_diagnosa LIKE '%$q%' OR nama_diagnosa LIKE '%$q%' OR keterangan LIKE '%$q%' 
						ORDER BY kode_diagnosa");
				$no=0;

				foreach($rows as $row):?>
				<tr>
					<td><?=++$no ?></td>
					<td><?=$row->kode_diagnosa?></td>
					<td><?=$row->nama_diagnosa?></td>
					<td><?=get_words($row->keterangan)?></td>
					<td class="nw">
						<a class="btn btn-xs btn-primary" href="?m=diagnosaDS_ubah&ID=<?=$row->kode_diagnosa?>" title="Ubah"><span class="glyphicon glyphicon-edit"></span></a>
						<a class="btn btn-xs btn-primary" href="aksi.php?act=diagnosaDS_hapus&ID=<?=$row->kode_diagnosa?>" title="Hapus" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
					</td>
				</tr>
				<?php endforeach; ?>
		</table>
	</div>
</div>