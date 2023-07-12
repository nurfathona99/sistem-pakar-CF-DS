<div class="page-header">
    <h1>Tambah Relasi <i>Certainty Factor</i></h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksi.php'?>
        <form method="post" action="?m=relasiCF_tambah">
            <div class="form-group">
                <label>Diagnosa <span class="text-danger">*</span></label>
                <select class="form-control" name="kode_diagnosa">
                    <option value=""></option>
                    <?=get_diagnosaCF_option($_POST[kode_diagnosa])?>
                </select>
            </div>
            <div class="form-group">
                <label>Gejala <span class="text-danger">*</span></label>
                <select class="form-control" name="kode_gejala">
                    <option value=""></option>
                    <?=get_gejalaCF_option($_POST[kode_gejalacf])?>
                </select>
            </div>
            <div class="form-group">
                <label>MB <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="mb" value="<?=$_POST[mb]?>" />
            </div>
            <div class="form-group">
                <label>MD <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="md" value="<?=$_POST[md]?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success" onclick="return confirm('Yakin Ingin Menyimpan Data Relasi?')" title="Simpan Data Relasi"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-success" href="?m=relasiCF" onclick="return confirm('Yakin Ingin Kembali Ke Halaman Data Relasi?')" title="Kembali Ke Data Relasi"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>