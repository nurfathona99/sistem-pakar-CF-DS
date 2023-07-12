<div class="page-header">
    <h1>Tambah Gejala <i>Dempster Shafer</i></h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksi.php'?>
        <form method="post">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode" value="<?=$_POST[kode]?>"/>
            </div>
            <div class="form-group">
                <label>Nama Gejala <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama" value="<?=$_POST[nama]?>"/>
            </div>
            <div class="form-group">
                <label>Bobot <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="bobot" value="<?=$_POST[bobot]?>"/>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" onclick="return confirm('Yakin Ingin Menyimpan Data Gejala?')" title="Simpan Data Gejala"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-primary" href="?m=gejalaDS" onclick="return confirm('Yakin Ingin Kembali Ke Halaman Data Gejala?')" title="Kembali Ke Data Gejala"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>