<?php
  
  include_once ("../scripts/db_connection.php");
  $pdo = pdo_connect_mysql();
  
  if(isset($_POST["slide2_id"])) {

    $slide2_judul   = isset($_POST['slide2_judul']) ? $_POST['slide2_judul'] : '';
    $slide2_isi1    = isset($_POST['slide2_isi1']) ? $_POST['slide2_isi1'] : '';
    $slide2_isi2    = isset($_POST['slide2_isi2']) ? $_POST['slide2_isi2'] : '';
    $slide2_isi3    = isset($_POST['slide2_isi3']) ? $_POST['slide2_isi3'] : '';
    $slide2_status  = isset($_POST['slide2_status']) ? $_POST['slide2_status'] : '';

    $query = $pdo->prepare("UPDATE slides2 SET slide2_judul=?,slide2_isi1=?,slide2_isi2=?,slide2_isi3=?,slide2_status=? WHERE slide2_id=?");
    $query->execute([$slide2_judul,$slide2_isi1,$slide2_isi2,$slide2_isi3,$slide2_status,$_POST['slide2_id']]); 

    if(!empty($query)) {
      echo "<script>alert('Data berhasil disimpan.');</script>"; 
    }  
    
  }  
    
  //--Load Table--//
  include('view_slides2.php');    

?>