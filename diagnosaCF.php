<div class="page-header">
    <h1><center>Diagnosa <i>Certainty Factor & Dempster Shafer</i> Penyakit</center></h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="diagnosaCF" />
            <div class="form-group">
                <input class="form-control" type="text" title="Pencarian Data Diagnosa" placeholder="Pencarian. . ." name="q" value="<?=$_GET['q']?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
            </div>
            <div class="form-group">
                <a class="btn btn-success" href="?m=diagnosaCF_tambah" title="Tambah Data Diagnosa"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr class="nw bg-success">
                <th>Kode</th>
                <th width="35%">Nama Diagnosa</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php
        $q = esc_field($_GET['q']);
        $rows = $db->get_results("SELECT * FROM tb_diagnosacf 
            WHERE kode_diagnosa LIKE '%$q%' OR nama_diagnosa LIKE '%$q%' OR keterangan LIKE '%$q%' 
            ORDER BY kode_diagnosa");
        $no=0;
        
        foreach($rows as $row):?>
        <tr>
            <td><?=$row->kode_diagnosa?></td>
            <td><?=$row->nama_diagnosa?></td>
            <td align="justify"><?=$row->keterangan?></td>
            <td class="nw">
                <a class="btn btn-xs btn-success" href="?m=diagnosaCF_ubah&ID=<?=$row->kode_diagnosa?>" title="Ubah"><span class="glyphicon glyphicon-edit"></span></a>
                <a class="btn btn-xs btn-success" href="aksi.php?act=diagnosaCF_hapus&ID=<?=$row->kode_diagnosa?>" title="Hapus" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>
        <?php endforeach;?>
        </table>
    </div>    
</div>