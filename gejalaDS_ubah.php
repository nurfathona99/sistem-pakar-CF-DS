<?php
    $row = $db->get_row("SELECT * FROM tb_gejalads WHERE kode_gejalads='$_GET[ID]'"); 
?>
<div class="page-header">
    <h1>Ubah Gejala <i>Dempster Shafer</i></h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksi.php'?>
        <form method="post">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode" readonly="readonly" value="<?=$row->kode_gejalads?>"/>
            </div>
            <div class="form-group">
                <label>Nama Gejala <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama" value="<?=$row->nama_gejalads?>"/>
            </div>
            <div class="form-group">
                <label>Bobot<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="bobot" value="<?=$row->bobot?>"/>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" onclick="return confirm('Yakin Ingin Mengubah Data Gejala?')" title="Ubah Data Gejala"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-primary" href="?m=gejalaDS" onclick="return confirm('Yakin Ingin Kembali Ke Halaman Data Gejala?')" title="Kembali Ke Data Gejala"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>