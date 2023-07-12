<?php
$isLogin = isset($_SESSION['login']) && !empty($_SESSION['login']);
$nik = isset($_POST['nik']) && !empty($_POST['nik']) ? $_POST['nik'] : null;

?>
<?php if ($isLogin && empty($nik)) : ?>
    <div class="page-header">
        <h1>
            <center>Masukkan NIK untuk melacak riwayat konsultasi</center>
        </h1>
    </div>
    <form action="?m=riwayat" method="post">
        <div class="panel panel-default">

            <div class="panel-body">
                <div class="row ">
                    <div class="form-group">
                        <input type="text" name="nik" id="" class="form-control">
                    </div>
                </div>
                <button class="btn btn-primary btn-block"><span class="glyphicon glyphicon-ok"></span> Cek Riwayat</button>
            </div>
        </div>
    </form>
<?php elseif ($isLogin && !empty($nik)) : ?>
    <?php
    $riwayat = $db->get_results("SELECT * FROM tb_riwayat WHERE nik='$nik' ORDER BY dibuat DESC");
    ?>
    <div class="page-header">
        <h1>
            <center>Riwayat Konsultasi <?= $nik ?></center>
        </h1>
        
    </div>
    <div class="panel panel-default">
        <?php if (empty($riwayat)) : ?>
            <div class="panel-header">
                <h5>Tidak ada riwayat pemeriksaan untuk: <strong><?= $nik ?></strong></h5>
            </div>
        <?php else : ?>
            <div style="margin: 10px;" class="panel-header">
                <p>Nama: <?= $riwayat[0]->nama ?></p>
                <p>Alamat: <?= $riwayat[0]->alamat ?></p>
                <p>Usia: <?= $riwayat[0]->usia ?> thn</p>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr class="bg-success">
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Gejala</th>
                            <th>Hasil Diagnosa CF</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($riwayat as $k => $v) : ?>
                            <?php 
                                $tmp = explode(';', $v->gejala);
                                $tmp = $db->get_results("SELECT nama_gejalacf nama FROM tb_gejalacf  WHERE kode_gejalacf IN ('".implode("','", $tmp)."')");
                                $gejala = null;
                                foreach($tmp as $t){
                                    $gejala .= '<li>' . $t->nama . '</li>';
                                }
                                $hasil = null;
                                foreach(explode(';', $v->hasil) as $t){
                                    $hasil.= '<li>' . str_replace(':', '= ', $t) . '</li>';
                                }
                            ?>
                            <tr>
                                <td><?=$k +1 ?></td>
                                <td><?= $v->dibuat ?></td>
                                <td><ul><?= $gejala ?></ul></td>
                                <td><ul><?= $hasil ?></ul></td>
                            </tr>
                            <tr>
                                <td> Hasil Diagnosa DS </td>
                                <td colspan="4"><?= str_replace(':', '= ', $v->kesimpulan ) . '%' ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        <?php endif ?>
    <?php endif ?>