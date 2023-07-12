<?php
    $row = $db->get_row("SELECT * FROM tb_diagnosacf WHERE kode_diagnosa='$_GET[ID]'"); 
?>
<div class="page-header">
    <h1>Ubah Diagnosa <i>Certainty Factor</i></h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksi.php'?>
        <form method="post" action="?m=diagnosaCF_ubah&ID=<?=$row->kode_diagnosa?>">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode" readonly="readonly" value="<?=$row->kode_diagnosa?>"/>
            </div>
            <div class="form-group">
                <label>Nama Alternatif <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama" value="<?=$row->nama_diagnosa?>"/>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea class="form-control" name="keterangan"><?=$row->keterangan?></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-success" onclick="return confirm('Yakin Ingin Mengubah Data Diagnosa?')" title="Ubah Data Diagnosa"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-success" href="?m=diagnosaCF" onclick="return confirm('Yakin Ingin Kembali Ke Halaman Data Diagnosa?')" title="Kembali Ke Data Diagnosa"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>