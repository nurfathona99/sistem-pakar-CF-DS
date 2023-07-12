<div class="page-header">
    <h1>Tambah Diagnosa <i>Certainty Factor</i></h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksi.php'?>
        <form method="post" action="?m=diagnosaCF_tambah">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode" value="<?=$_POST[kode]?>"/>
            </div>
            <div class="form-group">
                <label>Nama Diagnosa <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama" value="<?=$_POST[nama]?>"/>
            </div>
			<div class="form-group">
                <label>Keterangan</label>
                <textarea class="form-control" name="keterangan"><?=$_POST[keterangan]?></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-success" onclick="return confirm('Yakin Ingin Menyimpan Data Diagnosa?')" title="Simpan Data Diagnosa"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-success" href="?m=diagnosaCF" onclick="return confirm('Yakin Ingin Kembali Ke Halaman Data Diagnosa?')" title="Kembali Ke Data Diagnosa"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>