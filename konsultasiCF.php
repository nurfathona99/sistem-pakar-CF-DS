<div class="page-header">
    <h1><center>Konsultasi <i>Certainty Factor & Dempster Shafer</i></center></h1>
</div>
<form action="?m=hasilCF" method="post">
    <div class="row">
        <div class="col-sm-12">
            <h3>Masukkan Biodata</h3>
        </div>
       <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label for="">NIK <span class="text-danger ml-2">*</span></label>
            <input type="text" name="nik" id="nik" required maxlength="16" class="form-control">
        </div>
       </div>
       <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label for="">Nama Lengkap <span class="text-danger ml-2">*</span></label>
            <input type="text" name="nama" id="nama" required maxlength="46" class="form-control">
        </div>
       </div>
       <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label for="">Usia (dalam tahun)</label>
            <input type="number" name="usia" id="usia" class="form-control">
        </div>
       </div>
       <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label for="">Alamat</label>
            <input type="text" name="alamat" id="alamat" maxlength="92" class="form-control">
        </div>
       </div>
    </div>
    <input type="hidden" name="m" value="hasilCF" />
    <div class="panel panel-default">
        <div class="panel-heading">        
            <h3 class="panel-title"><strong>Pilih Gejala</strong></h3>
        </div>
        <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr class="bg-success">
                <th>No</th>
                <th>Nama Gejala</th>
				<th><center><!--<input type="checkbox" id="checkAll" />-->YA/TIDAK (CF & DS)</center></th>
				
            </tr>
        </thead>
        <?php
        $q = esc_field($_GET['q']);
        $rows = $db->get_results("SELECT tb_gejalacf.kode_gejalacf, tb_gejalacf.nama_gejalacf, tb_gejalads.kode_gejalads, tb_gejalads.nama_gejalads
		FROM tb_gejalacf, tb_gejalads WHERE tb_gejalacf.nama_gejalacf=tb_gejalads.nama_gejalads
        ORDER BY tb_gejalacf.kode_gejalacf");
        $no=1;
        foreach($rows as $row):?>
        <tr>
            <td><?=$no++?></td>
            <td>Apakah <?=$row->nama_gejalacf?> ?</td>
			<td><center><input type="checkbox" name="gejala1[]" value="<?=$row->kode_gejalacf?>"/></center></td>
			
        </tr>
        <?php endforeach;
        ?>
        </table>
		
        <div class="panel-body">
            <button class="btn btn-primary btn-block"><span class="glyphicon glyphicon-ok"></span> Submit Diagnosa</button>
        </div>
    </div>
</form>
<script>
$(function(){
    $("#checkAll").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
});
</script>