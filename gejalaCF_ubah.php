<?php
    $row = $db->get_row("SELECT * FROM tb_gejalacf WHERE kode_gejalacf='$_GET[ID]'"); 
?>
<div class="page-header">
    <h1>Ubah Gejala <i>Certainty Factor</i></h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksi.php'?>
        <form method="post" action="?m=gejalaCF_ubah&ID=<?=$row->kode_gejalacf?>">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode" readonly="readonly" value="<?=$row->kode_gejalacf?>"/>
            </div>
            <div class="form-group">
                <label>Nama Gejala <span class="text-danger">*</span></label>
                <textarea class="form-control" type="text" name="nama"><?=$row->nama_gejalacf?></textarea>
            </div>
            <div class="form-group">
                <label>Keterangan <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="keterangan" value="<?=$row->keterangan?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success" onclick="return confirm('Yakin Ingin Mengubah Data Gejala?')" title="Ubah Data Gejala"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-success" href="?m=gejalaCF" onclick="return confirm('Yakin Ingin Kembali Ke Halaman Data Gejala?')" title="Kembali Ke Data Gejala"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>