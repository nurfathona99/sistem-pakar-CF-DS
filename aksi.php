<?php
require_once'functions.php';
/** LOGIN */ 
if ($mod=='login'){
    $user = esc_field($_POST[user]);
    $pass = esc_field($_POST[pass]);
    
    $row = $db->get_row("SELECT * FROM tb_admin WHERE user='$user' AND pass='$pass'");
    if($row){
        $_SESSION[login] = $row->user;
	    sweet_alert_direct("Anda Berhasil Login", "Anda akan diarahkan ke sistem dalam waktu 2 detik...", "success", "2000", "false", "index.php");
    } else {
        sweet_alert_direct("Gagal Login", "Salah kombinasi username dan password.", "error", "4000", "true", "?m=login");
    }          
}else if ($mod=='password'){
    $pass1 = $_POST[pass1];
    $pass2 = $_POST[pass2];
    $pass3 = $_POST[pass3];
    
    $row = $db->get_row("SELECT * FROM tb_admin WHERE user='$_SESSION[login]' AND pass='$pass1'");        
    
    if($pass1=='' || $pass2=='' || $pass3=='')
        print_msg('Field bertanda * harus diisi.');
    elseif(!$row)
        print_msg('Password lama salah.');
    elseif( $pass2 != $pass3 )
        print_msg('Password baru dan konfirmasi password baru tidak sama.');
    else{        
        $db->query("UPDATE tb_admin SET pass='$pass2' WHERE user='$_SESSION[login]'");                    
        print_msg('Password berhasil diubah.', 'success');
    }
} elseif($act=='logout'){
    unset($_SESSION['login']);
    header("location:index.php");
}

/** DIAGNOSA CF*/
elseif($mod=='diagnosaCF_tambah'){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $keterangan = $_POST['keterangan'];
    if($kode=='' || $nama=='')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    elseif($db->get_results("SELECT * FROM tb_diagnosacf WHERE kode_diagnosa='$kode'"))
        print_msg("Kode sudah ada!");
    else{
        $db->query("INSERT INTO tb_diagnosacf (kode_diagnosa, nama_diagnosa, keterangan) VALUES ('$kode', '$nama', '$keterangan')");                       
        redirect_js("index.php?m=diagnosaCF");
    }
} else if($mod=='diagnosaCF_ubah'){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $keterangan = $_POST['keterangan'];
    if($kode=='' || $nama=='')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    else{
        $db->query("UPDATE tb_diagnosacf SET nama_diagnosa='$nama', keterangan='$keterangan' WHERE kode_diagnosa='$_GET[ID]'");
        redirect_js("index.php?m=diagnosaCF");
    }
} else if ($act=='diagnosaCF_hapus'){
    $db->query("DELETE FROM tb_diagnosacf WHERE kode_diagnosa='$_GET[ID]'");
    $db->query("DELETE FROM tb_relasicf WHERE kode_diagnosa='$_GET[ID]'");
    header("location:index.php?m=diagnosaCF");
} 

/** GEJALA CF*/    
if($mod=='gejalaCF_tambah'){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $keterangan = $_POST['keterangan'];
    
    if($kode=='' || $nama=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif($db->get_results("SELECT * FROM tb_gejalacf WHERE kode_gejalacf='$kode'"))
        print_msg("Kode sudah ada!");
    else{
        $db->query("INSERT INTO tb_gejalacf (kode_gejalacf, nama_gejalacf, keterangan) VALUES ('$kode', '$nama', '$keterangan')");
        $id = $db->insert_id;                           
        redirect_js("index.php?m=gejalaCF");
    }                    
} else if($mod=='gejalaCF_ubah'){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $keterangan = $_POST['keterangan'];
    
    if($kode=='' || $nama=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    else{
        $db->query("UPDATE tb_gejalacf SET nama_gejalacf='$nama', keterangan='$keterangan' WHERE kode_gejalacf='$_GET[ID]'");
        redirect_js("index.php?m=gejalaCF");
    }    
} else if ($act=='gejalaCF_hapus'){
    $db->query("DELETE FROM tb_gejalacf WHERE kode_gejalacf='$_GET[ID]'");
    $db->query("DELETE FROM tb_relasicf WHERE kode_gejalacf='$_GET[ID]'");
    header("location:index.php?m=gejalaCF");
} 
    
/** RELASI CF TAMBAH */ 
else if ($mod=='relasiCF_tambah'){
    $kode_diagnosa = $_POST[kode_diagnosa];
    $kode_gejala = $_POST[kode_gejala];
    $mb = $_POST[mb];
    $md = $_POST[md];
    
    $kombinasi_ada = $db->get_row("SELECT * FROM tb_relasicf WHERE kode_diagnosa='$kode_diagnosa' AND kode_gejalacf='$kode_gejala'");
    
    if($kode_diagnosa=='' || $kode_gejala=='' || $mb=='' || $md=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif($kombinasi_ada)
        print_msg("Kombinasi diagnosa dan gejala sudah ada!");
    else{
        $db->query("INSERT INTO tb_relasicf (kode_diagnosa, kode_gejalacf, mb, md) VALUES ('$kode_diagnosa', '$kode_gejala', '$mb', '$md')");
        redirect_js("index.php?m=relasiCF");
    }   
}else if ($mod=='relasiCF_ubah'){
    $kode_diagnosa = $_POST[kode_diagnosa];
    $kode_gejala = $_POST[kode_gejala];
    $mb = $_POST[mb];
    $md = $_POST[md];
    
    $kombinasi_ada = $db->get_row("SELECT * FROM tb_relasicf WHERE kode_diagnosa='$kode_diagnosa' AND kode_gejalacf='$kode_gejala' AND ID<>'$_GET[ID]'");
    
    if($kode_diagnosa=='' || $kode_gejala=='' || $mb=='' || $md=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif($kombinasi_ada)
        print_msg("Kombinasi diagnosa dan gejala sudah ada!");
    else{
        $db->query("UPDATE tb_relasicf SET kode_diagnosa='$kode_diagnosa', kode_gejalacf='$kode_gejala', mb='$mb', md='$md' WHERE ID='$_GET[ID]'");
        redirect_js("index.php?m=relasiCF");
    }  
    header("location:index.php?m=relasiCF");
} else if ($act=='relasiCF_hapus'){
    $db->query("DELETE FROM tb_relasicf WHERE ID='$_GET[ID]'");
    header("location:index.php?m=relasiCF");
}

/** DIAGNOSA DS*/
elseif($mod=='diagnosaDS_tambah'){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $keterangan = $_POST['keterangan'];
    if($kode=='' || $nama=='')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    elseif($db->get_results("SELECT * FROM tb_diagnosads WHERE kode_diagnosa='$kode'"))
        print_msg("Kode sudah ada!");
    else{
        $db->query("INSERT INTO tb_diagnosads (kode_diagnosa, nama_diagnosa, keterangan) VALUES ('$kode', '$nama', '$keterangan')");                       
        redirect_js("index.php?m=diagnosaDS");
    }
} else if($mod=='diagnosaDS_ubah'){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $keterangan = $_POST['keterangan'];
    if($kode=='' || $nama=='')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    else{
        $db->query("UPDATE tb_diagnosads SET nama_diagnosa='$nama', keterangan='$keterangan' WHERE kode_diagnosa='$_GET[ID]'");
        redirect_js("index.php?m=diagnosaDS");
    }
} else if ($act=='diagnosaDS_hapus'){
    $db->query("DELETE FROM tb_diagnosads WHERE kode_diagnosa='$_GET[ID]'");
    $db->query("DELETE FROM tb_relasids WHERE kode_diagnosa='$_GET[ID]'");
    header("location:index.php?m=diagnosaDS");
} 

/** GEJALA DS */    
if($mod=='gejalaDS_tambah'){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $bobot = $_POST['bobot'];
    
    if(!$kode || !$nama || !$bobot)
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif($db->get_results("SELECT * FROM tb_gejalads WHERE kode_gejalads='$kode'"))
        print_msg("Kode sudah ada!");
    else{
        $db->query("INSERT INTO tb_gejalads (kode_gejalads, nama_gejalads, bobot) VALUES ('$kode', '$nama', '$bobot')");
        redirect_js("index.php?m=gejalaDS");            
    }                    
} else if($mod=='gejalaDS_ubah'){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $bobot = $_POST['bobot'];
    
    if(!$kode || !$nama || !$bobot)
        print_msg("Field bertanda * tidak boleh kosong!");
    else{
        $db->query("UPDATE tb_gejalads SET nama_gejalads='$nama', bobot='$bobot' WHERE kode_gejalads='$_GET[ID]'");
        redirect_js("index.php?m=gejalaDS");
    }    
} else if ($act=='gejalaDS_hapus'){
    $db->query("DELETE FROM tb_gejalads WHERE kode_gejalads='$_GET[ID]'");
    $db->query("DELETE FROM tb_relasids WHERE kode_gejalads='$_GET[ID]'");
    header("location:index.php?m=gejalaDS");
} 
    
/** RELASI DS TAMBAH */ 
else if ($mod=='relasiDS_tambah'){
    $kode_diagnosa = $_POST[kode_diagnosa];
    $kode_gejala = $_POST[kode_gejala];
    
    $kombinasi_ada = $db->get_row("SELECT * FROM tb_relasids WHERE kode_diagnosa='$kode_diagnosa' AND kode_gejalads='$kode_gejala'");
    
    if($kode_diagnosa=='' || $kode_gejala=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif($kombinasi_ada)
        print_msg("Kombinasi diagnosa dan gejala sudah ada!");
    else{
        $db->query("INSERT INTO tb_relasids (kode_diagnosa, kode_gejalads) VALUES ('$kode_diagnosa', '$kode_gejala')");
        redirect_js("index.php?m=relasiDS");
    }   
}else if ($mod=='relasiDS_ubah'){
    $kode_diagnosa = $_POST[kode_diagnosa];
    $kode_gejala = $_POST[kode_gejala];
    
    $kombinasi_ada = $db->get_row("SELECT * FROM tb_relasids WHERE kode_diagnosa='$kode_diagnosa' AND kode_gejalads='$kode_gejala' AND ID<>'$_GET[ID]'");
    
    if($kode_diagnosa=='' || $kode_gejala=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif($kombinasi_ada)
        print_msg("Kombinasi diagnosa dan gejala sudah ada!");
    else{
        $db->query("UPDATE tb_relasids SET kode_diagnosa='$kode_diagnosa', kode_gejalads='$kode_gejala' WHERE ID='$_GET[ID]'");
        redirect_js("index.php?m=relasiDS");
    }  
    header("location:index.php?m=relasiDS");
} else if ($act=='relasiDS_hapus'){
    $db->query("DELETE FROM tb_relasids WHERE ID='$_GET[ID]'");
    header("location:index.php?m=relasiDS");
}          
?>
