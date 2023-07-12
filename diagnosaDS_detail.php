<?php
    $row = $db->get_row("SELECT * FROM tb_diagnosads WHERE kode_diagnosa='$_GET[ID]'"); 
?>
<div class="page-header">
    <h1><?=$row->nama_diagnosa?></h1>
</div>
<div>
<?=br_to_enter($row->keterangan)?>
</div>