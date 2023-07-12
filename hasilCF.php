<!-- HASIL CERTAINTY FACTOR -->
<div class="panel panel-primary row">
<div class="page-header">
    <h1><center>Hasil Diagnosa <i>Certainty Factor</i></center></h1>
</div>
<?php
$selected = (array) $_POST[gejala1];
if(!$selected):
    print_msg('Tidak ada pemilihan gejala berdasarkan metode <i>Certainty Factor</i> terpilih. <a href="?m=konsultasiCF">Kembali</a>');
else:
$rows = $db->get_results("SELECT * FROM tb_gejalacf WHERE kode_gejalacf IN ('".implode("','", $selected)."')");
?>
<div class="panel panel-default">
    <div class="panel-heading">        
        <h3 class="panel-title">Gejala Terpilih</h3>
    </div>
    <table class="table table-bordered table-hover table-striped">
    <thead>
        <tr class="bg-success">
            <th>No</th>
            <th>Nama Gejala</th>
        </tr>
    </thead>
    <?php
    $no=1;
    foreach($rows as $row):?>
    <tr>
        <td><?=$no++?></td>
        <td><?=$row->nama_gejalacf?></td>
    </tr>
    <?php endforeach;
    ?>
    </table>
</div>
<?php
$rows = $db->get_results("SELECT * 
    FROM tb_relasicf r INNER JOIN tb_diagnosacf d ON d.kode_diagnosa = r.kode_diagnosa      
    WHERE r.kode_gejalacf IN ('".implode("','", $selected)."') ORDER BY r.kode_diagnosa, r.kode_gejalacf");

foreach($rows as $row){
    $diagnosa[$row->kode_diagnosa][mb] = $diagnosa[$row->kode_diagnosa][mb] + $row->mb * (1 - $diagnosa[$row->kode_diagnosa][mb]);
    $diagnosa[$row->kode_diagnosa][md] = $diagnosa[$row->kode_diagnosa][md] + $row->md * (1 - $diagnosa[$row->kode_diagnosa][md]);
    
    $diagnosa[$row->kode_diagnosa][cf] = $diagnosa[$row->kode_diagnosa][mb] -  $diagnosa[$row->kode_diagnosa][md];

	$diagnosa[$row->kode_diagnosa][cf-presentase] = $diagnosa[$row->kode_diagnosa][cf] *  100; 	
    
    $diagnosa[$row->kode_diagnosa][nama_diagnosa] = $row->nama_diagnosa;
    $diagnosa[$row->kode_diagnosa][solusi] = $row->keterangan;
}
?>
<div class="panel panel-default">
    <div class="panel-heading">        
        <h3 class="panel-title">Hasil Analisa</h3>
    </div>
    <table class="table table-bordered table-hover table-striped">
    <thead>
        <tr class="bg-success">
            <th>No</th>
            <th>Diagnosa Penyakit</th>
            <th>Faktor Kepastian</th>
        </tr>
    </thead>
    <?php
    $no=1;
    function ranking($array){
        $new_arr = array();
        foreach($array as $key => $value) {
            $new_arr[$key] = $value[cf];
        }
        arsort($new_arr);
        
        $result = array();    
        foreach($new_arr as $key => $value){
            $result[$key] = ++$no;
        }    
        return $result;
    }    
    
    $rank = ranking($diagnosa);
    $hasilAnalisis = [];
    foreach($rank as $key => $value):?>
    <?php $hasilAnalisis[] = $diagnosa[$key]['nama_diagnosa'] . ':' . $diagnosa[$key]['cf'] ?>
    <tr class="<?=($value==1) ? 'text-success' : ''?>">
        <td><?=$no++?></td>
        <td><strong><?=$diagnosa[$key][nama_diagnosa]?></strong></td>
        <td><strong><?=$diagnosa[$key][cf]?></strong></td>
    </tr>
    <?php endforeach;
    reset($rank);
    $_SESSION[gejala] = $gejala;
    ?>
    </table>
    <div class="panel-body">
        <table class="table table-bordered">
            <tr>
                <center><h2><strong><?=$diagnosa[key($rank)][nama_diagnosa]?> <?=$diagnosa [key($rank)][cf-presentase]?> %</strong></h2></center>
            </tr>
            <tr>
                <td>Ketarangan</td>
                <td align="justify"><?=$diagnosa[key($rank)][solusi]?></td>
            </tr>
        </table>
        <!-- <a class="btn btn-success" href="?m=konsultasiCF"><span class="glyphicon glyphicon-refresh"></span> Ulang</a> -->
        <!--<a class="btn btn-default" href="cetak.php?m=konsultasi" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>-->
    </div>
</div>
<?php endif; ?>
</div>
<!-- END HASIL CERTAINTY FACTOR -->
<?php require_once "hasilDS.php"?>