<?php
error_reporting(~E_NOTICE & ~E_DEPRECATED);
session_start();

include'config.php';
include'includes/ez_sql_core.php';
include'includes/ez_sql_mysqli.php';
$db = new ezSQL_mysqli($config['username'], $config['password'], $config['database_name'], $config['server']);
include'includes/general.php';
    
$mod = $_GET['m'];
$act = $_GET['act'];   

function get_diagnosaCF_option($selected = ''){
    global $db;
    $rows = $db->get_results("SELECT kode_diagnosa, nama_diagnosa FROM tb_diagnosacf ORDER BY kode_diagnosa");
    foreach($rows as $row){
        if($row->kode_diagnosa==$selected)
            $a.="<option value='$row->kode_diagnosa' selected>[$row->kode_diagnosa] $row->nama_diagnosa</option>";
        else
            $a.="<option value='$row->kode_diagnosa'>[$row->kode_diagnosa] $row->nama_diagnosa</option>";
    }
    return $a;
}

function get_gejalaCF_option($selected = ''){
    global $db;
    $rows = $db->get_results("SELECT kode_gejalacf, nama_gejalacf FROM tb_gejalacf ORDER BY kode_gejalacf");
    foreach($rows as $row){
        if($row->kode_gejalacf==$selected)
            $a.="<option value='$row->kode_gejalacf' selected>[$row->kode_gejalacf] $row->nama_gejalacf</option>";
        else
            $a.="<option value='$row->kode_gejalacf'>[$row->kode_gejalacf] $row->nama_gejalacf</option>";
    }
    return $a;
}

function br_to_enter($text){
    return str_replace("\r\n", '<br />', $text);
}

function get_diagnosaDS_option($selected = ''){
    global $db;
    $rows = $db->get_results("SELECT kode_diagnosa, nama_diagnosa FROM tb_diagnosads ORDER BY kode_diagnosa");
    foreach($rows as $row){
        if($row->kode_diagnosa==$selected)
            $a.="<option value='$row->kode_diagnosa' selected>[$row->kode_diagnosa] $row->nama_diagnosa</option>";
        else
            $a.="<option value='$row->kode_diagnosa'>[$row->kode_diagnosa] $row->nama_diagnosa</option>";
    }
    return $a;
}

function get_gejalaDS_option($selected = ''){
    global $db;
    $rows = $db->get_results("SELECT kode_gejalacf, nama_gejalacf FROM tb_gejalacf ORDER BY kode_gejalacf");
    foreach($rows as $row){
        if($row->kode_gejalacf==$selected)
            $a.="<option value='$row->kode_gejalacf' selected>[$row->kode_gejalacf] $row->nama_gejalacf</option>";
        else
            $a.="<option value='$row->kode_gejalacf'>[$row->kode_gejalacf] $row->nama_gejalacf</option>";
    }
    return $a;
}

function DS_gejala(){
    global $db;
    $rows = $db->get_results("SELECT * 
    FROM tb_relasicf r INNER JOIN tb_diagnosacf d ON d.kode_diagnosa = r.kode_diagnosa      
   ");
    $data = array();
    foreach($rows as $row){
        $data[$row->kode_gejalacf][kode] = $row->kode_gejalacf;
        $data[$row->kode_gejalacf][nama] = $row->nama_gejala;
        $data[$row->kode_gejalacf][bobot] = $row->mb;                
    }
    return $data;
}

function DS_diagnosa(){
    global $db;
    $rows = $db->get_results("SELECT * 
    FROM tb_relasicf r INNER JOIN tb_diagnosacf d ON d.kode_diagnosa = r.kode_diagnosa");
    $data = array();
    foreach($rows as $row){
        $data[$row->kode_diagnosa][kode] = $row->kode_diagnosa;
        $data[$row->kode_diagnosa][nama] = $row->nama_diagnosa;    
    }
    return $data;
}

function DS_get_diagnosa($kode){
    global $db;
    $rows = $db->get_results("SELECT kode_diagnosa FROM tb_relasicf WHERE kode_gejalacf='$kode' ORDER BY kode_diagnosa");
    $data = array();
    foreach($rows as $row){
        $data[] = $row->kode_diagnosa;
    }
    return $data;
}

function DS_hitung($unik, $data){
    $arr = array();
    $kosong = DS_total_nilai('', $data);    
    foreach($unik as $key => $val){
        if($key!=''){      
            $arr_x = DS_total_nilai($key, $data);
            $arr[] = array(
                'arr' => $val,
                'name' => $key,
                'value' =>  array_sum($arr_x) / (1 - array_sum($kosong)),
                'desc' => '( ' . implode(' + ', array_round($arr_x)) . ' ) / ( 1 - [ ' . implode(' + ', array_round($kosong)) . ' ] )',
            );    
        }        
    }
    return $arr;
}

function array_round($arr){
    $arr_round = array();
    foreach($arr as $key => $val){
        $arr_round[$key] = round($val, 3);
    }
    return $arr_round;
}

function DS_total_nilai($name, $data){
    $arr = array();
    foreach($data as $val){
        if($val['name']==$name){
            $arr[]=$val['value'];
        }    
    }
    return $arr;
}