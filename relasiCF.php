<div class="page-header">
    <h1><center>Relasi Gejala & Diagnosa <i>(Certainty Factor)</i></strong></center></h1>
</div>
<div class="panel panel-default">
<div class="panel-heading">
    <form class="form-inline">
        <input type="hidden" name="m" value="relasiCF" />
        <div class="form-group">
            <input class="form-control" type="text" title="Pencarian Data Relasi" placeholder="Pencarian. . ." name="q" value="<?=$_GET['q']?>" />
        </div>
        <div class="form-group">
            <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
        </div>
        <div class="form-group">
            <a class="btn btn-success" href="?m=relasiCF_tambah" title="Tambah Data Relasi"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
        </div>
    </form>
</div>

<table class="table table-bordered table-hover table-striped">
<thead>
    <tr class="nw bg-success">
        <th>No</th>
		<th>Gejala</th>
        <th>Diagnosa</th>
        <th>MB</th>
        <th>MD</th>
        <th>Aksi</th>
    </tr>
</thead>
<?php
$q = esc_field($_GET['q']);
$rows = $db->get_results("SELECT r.ID, r.kode_gejalacf, d.kode_diagnosa, r.mb, r.md, g.nama_gejalacf, d.nama_diagnosa 
    FROM tb_relasicf r INNER JOIN tb_diagnosacf d ON d.`kode_diagnosa`=r.`kode_diagnosa` INNER JOIN tb_gejalacf g ON g.`kode_gejalacf`=r.`kode_gejalacf`
    WHERE r.kode_gejalacf LIKE '%$q%'
        OR r.kode_diagnosa LIKE '%$q%'
        OR g.nama_gejalacf LIKE '%$q%'
        OR d.nama_diagnosa LIKE '%$q%' 
    ORDER BY r.kode_diagnosa, r.kode_gejalacf");
$no=0;

foreach($rows as $row):?>
<tr>
    <td><?=++$no ?></td>
	<td><?='['. $row->kode_gejalacf . '] ' . $row->nama_gejalacf?></td>
    <td><?='['. $row->kode_diagnosa . '] ' . $row->nama_diagnosa?></td>
    <td><?=$row->mb?></td>
    <td><?=$row->md?></td>
    <td class="nw">
        <a class="btn btn-xs btn-success" href="?m=relasiCF_ubah&ID=<?=$row->ID?>" title="Ubah"><span class="glyphicon glyphicon-edit"></span></a>
        <a class="btn btn-xs btn-success" href="aksi.php?act=relasiCF_hapus&ID=<?=$row->ID?>" title="Hapus" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
    </td>
</tr>
<?php endforeach;
?>
</table>
</div>