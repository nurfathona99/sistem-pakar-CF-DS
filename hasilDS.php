<div class="panel panel-primary row">
<div class="page-header">
    <h1><center>Hasil Diagnosa <i>Dempster Shafer</i></center></h1>
</div>
<?php
$selected = (array) $_POST[gejala1];
if(empty($selected)):
    print_msg('Tidak ada pemilihan gejala berdasarkan metode <i>Dempster Shafer</i> terpilih. <a href="?m=konsultasiCF">Kembali</a>');
else:
    $rows = $db->get_results("SELECT * FROM tb_gejalacf WHERE kode_gejalacf IN ('".implode("','", $selected)."')");
    ?>
    <div class="panel panel-default">
        <div class="panel-heading">        
            <h3 class="panel-title">Gejala Terpilih</h3>
        </div>
        <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
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
    $GEJALA = DS_gejala();
    $DIAGNOSA = DS_diagnosa();  
            
    $hasil[] = array(
        'arr' => array_keys($DIAGNOSA),
        'name' => implode(',', array_keys($DIAGNOSA)),
        'value' => 1,
    );
    
    
    foreach ($selected as $kode):
        $new_hasil = array();
        $arr_diagnosa = DS_get_diagnosa($kode);                                        
        ?>    
        <div class="panel panel-primary">
            <div class="panel-heading"><h3 class="panel-title"><?=$GEJALA[$kode][nama] .' ( ' . implode(', ', $arr_diagnosa) .' )'?></h3></div>
            <table class="table table-bordered table-hover table-striped">
                <thead><tr>
                    <th>#</th>
                    <th><?=implode(',', $arr_diagnosa) .' &raquo; ' . $GEJALA[$kode][bobot]?></th>
                    <th>&oslash; &raquo; <?=1 - $GEJALA[$kode][bobot]?></th>
                </tr></thead>
                <?php foreach($hasil as $row): 
                $arr = array_intersect($row[arr], $arr_diagnosa); 
                $name =  implode(',', $arr);
                $value = $row[value] * $GEJALA[$kode][bobot];
                $new_hasil[] = array(
                    'arr' => $arr,
                    'name' => $name,
                    'value' => $value,
                );
                
                $arr2 = array_intersect($row[arr], array_keys($DIAGNOSA)); 
                $name2 =  implode(',', $arr2);
                $value2 = $row[value] * (1 - $GEJALA[$kode][bobot]);
                
                $new_hasil[] = array(
                    'arr' => $arr2,
                    'name' => $name2,
                    'value' => $value2,
                );
                
                $hasil = $new_hasil;
                ?>
                <tr>
                    <td><?=$row['name']?> &raquo; <?=round($row[value], 4)?></td>
                    <td><?=$name?> &raquo; <?=round($value, 4)?></td>
                    <td><?=$name2?> &raquo; <?=round($value2, 4)?></td>
                </tr>
                <?php endforeach;?>
            </table>
            <?php            
            $unik = array();
            foreach($hasil as $row){
                $unik[$row['name']] = $row['arr'];
            }              
                
            $new_hasil = DS_hitung($unik, $hasil);
            $hasil = $new_hasil;
            ?>
            <div class="panel-body">            
                <table class="table table-bordered aw">
                    <tr>
                        <th>Kombinasi Diagnosa</th>
                        <th>Rumus</th>
                        <th>Nilai</th>
                    </tr>
                    <?php foreach($hasil as $key => $val):
                    
                    ?>
                    <tr>
                        <td><?=$val['name']?></td>
                        <td><?=$val['desc']?></td>
                        <td>: <?=round($val['value'], 4)?></td>
                    </tr>
                    <?php endforeach?>
                </table>
            </div>
        </div>
    <?php endforeach;
       
    function DS_get_best($hasil){
        $num = 0;
        $max = array();
        foreach($hasil as $val){
            if($val['value'] > $num){
                $num = $val['value'];
                $max = $val;
            }
        }
        return $max;
    }
    
    $best = DS_get_best($hasil);
    
    $diags = array();
    //print_r($best);
    foreach($best[arr] as $val){
        $diags[] = ' '. $DIAGNOSA[$val]['nama'] . '</a>';
    }       
    ?>
    <div class="panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">Kesimpulan</h3></div>
        <div class="panel-body">
            <p>Berdasarkan gejala yang terpilih maka diagnosa paling akurat adalah <strong><?=implode(', ', $diags)?></strong> dengan tingkat kepercayaan <strong><?=round($best['value'] * 100) ?>%</strong>.</p>
        </div>
		<a class="btn btn-success" href="?m=konsultasiCF"><span class="glyphicon glyphicon-refresh"></span> Ulang</a>
        <a class="btn btn-success" href="?m=home" onclick="return confirm('Yakin Ingin Kembali Ke Halaman Beranda?')" title="Kembali Ke Beranda"><span class="glyphicon glyphicon-arrow-left"></span> Beranda </a>
    </div>
<?php endif; ?>
</div>

<?php 
    // Simpan Biodata
    $post = $_POST;
    $nama = isset($post['nama']) ? $post['nama'] : null;
    $nik = isset($post['nik']) ? $post['nik'] : null;
    $alamat = isset($post['alamat']) ? $post['alamat'] : null;
    $usia = isset($post['usia']) ? $post['usia'] : null;

    if(empty($nik)) 
        print_msg('Masukkan NIK untuk menyimpan riwayat');
    $gejala = implode(';', $selected);
    $hasilAnalisis = implode(';', $hasilAnalisis);
    $kesimpulan = implode(', ', $diags) . ':' . round($best['value'] * 100);

    $db->query("INSERT INTO tb_riwayat(nik, nama, alamat, usia, gejala, hasil, kesimpulan) VALUES ('$nik', '$nama', '$alamat', $usia, '$gejala', '$hasilAnalisis', '$kesimpulan')")

?>