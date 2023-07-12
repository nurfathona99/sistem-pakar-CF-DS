<div class="page-header">
    <h1><center>Gejala Penyakit <i>(Certainty Factor)</i></center></h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">        
        <form class="form-inline">
            <input type="hidden" name="m" value="gejalaCF" />
            <div class="form-group">
                <input class="form-control" type="text" title="Pencarian Data Gejala" placeholder="Pencarian. . ." name="q" value="<?=$_GET['q']?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
            </div>
            <div class="form-group">
                <a class="btn btn-success" href="?m=gejalaCF_tambah" title="Tambah Data Gejala"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr class="bg-success">
                <th>Kode</th>
                <th>Nama Gejala</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php
        $q = esc_field($_GET['q']);
        $rows = $db->get_results("SELECT * FROM tb_gejalacf 
        WHERE kode_gejalacf LIKE '%$q%' OR nama_gejalacf LIKE '%$q%' OR keterangan LIKE '%$q%' 
        ORDER BY kode_gejalacf");        
        foreach($rows as $row):?>
        <tr>
            <td><?=$row->kode_gejalacf?></td>
            <td><?=$row->nama_gejalacf?></td>
            <td><?=$row->keterangan?></td>
            <td class="nw">
                <a class="btn btn-xs btn-success" href="?m=gejalaCF_ubah&ID=<?=$row->kode_gejalacf?>" title="Ubah"><span class="glyphicon glyphicon-edit"></span></a>
                <a class="btn btn-xs btn-success" href="aksi.php?act=gejalaCF_hapus&ID=<?=$row->kode_gejalacf?>" title="Hapus" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>
        <?php endforeach;?>
        </table>
    </div>
</div>