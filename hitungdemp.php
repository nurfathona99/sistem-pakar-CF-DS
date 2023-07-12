<thead><tr>
                    <th>#</th>
                    <th><?=implode(',', $arr_diagnosa) .' &raquo; ' . $GEJALA[$kode][bobot]?></th>
                    <th>&oslash; &raquo; <?=1 - $GEJALA[$kode][bobot]?></th>
        </tr></thead>

        <tr>
                    <td><?=$row['name']?> &raquo; <?=round($row[value], 4)?></td>
                    <td><?=$name?> &raquo; <?=round($value, 4)?></td>
                    <td><?=$name2?> &raquo; <?=round($value2, 4)?></td>
      //          </tr>

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
     //       </div>