
<?php
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