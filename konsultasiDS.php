<!-- <div class="page-header">
    <h1><center>Konsultasi <i>Dempster Shafer</i></center></h1>
</div>
<form action="?m=hasilDS" method="post">
    <input type="hidden" name="m" value="hasilDS" />
    <div class="panel panel-default">
        <div class="panel-heading">        
            <h3 class="panel-title"><strong>Pilih Gejala</strong></h3>
        </div>
        <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr class="bg-info">
                <th width="4%">No</th>
                <th>Nama Gejala</th>
				<th width="5%"><center><!--<input type="checkbox" id="checkAll" />-->YA/TIDAK</center></th>
            </tr>
        </thead>
        <?php
        $q = esc_field($_GET['q']);
        $rows = $db->get_results("SELECT * FROM tb_gejalads ORDER BY kode_gejala");
        $no=1;
        foreach($rows as $row):?>
        <tr>
            <td><?=$no++?></td>
            <td>Apakah <?=$row->nama_gejala?> ?</td>
			<td><center><input type="checkbox" name="gejala[]" value="<?=$row->kode_gejala?>" /></center></td>
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
</script> -->