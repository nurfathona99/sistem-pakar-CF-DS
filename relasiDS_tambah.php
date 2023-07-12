<div class="page-header">
    <h1>Tambah Relasi <i>Dempster Shafer</i></h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksi.php'?>
        <form method="post">
            <div class="form-group">
                <label>Diagnosa <span class="text-danger">*</span></label>
                <select class="form-control" name="kode_diagnosa">
                    <option value=""></option>
                    <?=get_diagnosaDS_option($_POST[kode_diagnosa])?>
                </select>
            </div>
            <div class="form-group">
                <label>Gejala <span class="text-danger">*</span></label>
                <select class="form-control" name="kode_gejala">
                    <option value=""></option>
                    <?=get_gejalaDS_option($_POST[kode_gejala])?>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" onclick="return confirm('Yakin Ingin Menyimpan Data Relasi?')" title="Simpan Data Relasi"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-primary" href="?m=relasiDS" onclick="return confirm('Yakin Ingin Kembali Ke Halaman Data Relasi?')" title="Kembali Ke Data Relasi"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>