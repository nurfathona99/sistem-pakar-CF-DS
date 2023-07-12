<div class="page-header">
    <h1><center>Relasi Gejala & Diagnosa <i>(Dempster Shafer)</i></center></h1>
</div>
<div class="panel panel-default">
<div class="panel-heading">
    <form class="form-inline">
        <input type="hidden" name="m" value="relasiDS" />
        <div class="form-group">
            <input class="form-control" type="text" title="Pencarian Data Relasi" placeholder="Pencarian. . ." name="q" value="<?=$_GET['q']?>" />
        </div>
        <div class="form-group">
            <button class="btn btn-primary"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
        </div>
        <div class="form-group">
            <a class="btn btn-primary" href="?m=relasiDS_tambah" title="Tambah Data Relasi"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
        </div>
    </form>
</div>
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped">
<thead>
    <tr class="nw bg-info">
        <th width="5%">No</th>
		<th>Gejala</th>
        <th width="39%">Diagnosa</th>
        <th width="5%">Bobot</th>
        <th width="6%">Aksi</th>
    </tr>
</thead>
<?php
$q = esc_field($_GET['q']);
$rows = $db->get_results("SELECT r.ID, r.kode_gejalads, d.kode_diagnosa, g.nama_gejalads, d.nama_diagnosa, g.bobot
    FROM tb_relasids r INNER JOIN tb_diagnosads d ON d.`kode_diagnosa`=r.`kode_diagnosa` INNER JOIN tb_gejalads g ON g.`kode_gejalads`=r.`kode_gejalads`
    WHERE r.kode_gejalads LIKE '%$q%'
        OR r.kode_diagnosa LIKE '%$q%'
        OR g.nama_gejalads LIKE '%$q%'
        OR d.nama_diagnosa LIKE '%$q%' 
    ORDER BY r.kode_diagnosa, r.kode_gejalads");
$no=0;

foreach($rows as $row):?>
<tr>
    <td><?=++$no ?></td>
	<td>[<?=$row->kode_gejalads . '] ' . $row->nama_gejalads?></td>
    <td>[<?=$row->kode_diagnosa . '] ' . $row->nama_diagnosa?></td>
    <td><?=$row->bobot?></td>
    <td class="nw">
        <a class="btn btn-xs btn-primary" href="?m=relasiDS_ubah&ID=<?=$row->ID?>" title="Ubah"><span class="glyphicon glyphicon-edit"></span></a>
        <a class="btn btn-xs btn-primary" href="aksi.php?act=relasiDS_hapus&ID=<?=$row->ID?>" title="Hapus" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
    </td>
</tr>
<?php endforeach;
?>
</table>
</div>
</div>