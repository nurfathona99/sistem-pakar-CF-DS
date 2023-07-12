<div class="page-header">
    <h1><center>Gejala Penyakit <i>(Dempster Shafer)</center></h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">        
        <form class="form-inline">
            <input type="hidden" name="m" value="gejalaDS" />
            <div class="form-group">
                <input class="form-control" type="text" title="Pencarian Data Gejala" placeholder="Pencarian. . ." name="q" value="<?=$_GET['q']?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="?m=gejalaDS_tambah" title="Tambah Data Gejala"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
        </form>
    </div>
	<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
    <thead>
        <tr class="bg-info">
            <th width="5%">Kode</th>
            <th>Nama Gejala</th>
            <th width="17%">Bobot</th>
            <th width="9%">Aksi</th>
        </tr>
    </thead>
    <?php
    $q = esc_field($_GET['q']);
    $rows = $db->get_results("SELECT * FROM tb_gejalads 
    WHERE kode_gejalads LIKE '%$q%' OR nama_gejalads LIKE '%$q%' 
    ORDER BY kode_gejalads");
    $no=0;
    foreach($rows as $row):?>
    <tr>
        <td><?=$row->kode_gejalads?></td>
        <td><?=$row->nama_gejalads?></td>
        <td><?=$row->bobot?></td>
        <td class="nw">
            <a class="btn btn-xs btn-primary" href="?m=gejalaDS_ubah&ID=<?=$row->kode_gejalads?>" title="Ubah"><span class="glyphicon glyphicon-edit"></span></a>
            <a class="btn btn-xs btn-primary" href="aksi.php?act=gejalaDS_hapus&ID=<?=$row->kode_gejalads?>" title="Hapus" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
        </td>
    </tr>
    <?php endforeach;
    ?>
    </table>
	</div>
</div>