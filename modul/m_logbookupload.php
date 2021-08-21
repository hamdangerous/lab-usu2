<?php

if(isset($_POST["no_urut"]))
{
 $connect = new PDO("mysql:host=localhost;dbname=lab", "root", "");
 $no_urut = $_POST["no_urut"];
 $nama = $_POST["nama"];
 $jk_umur = $_POST["jk_umur"];
 $jenis_spesimen = $_POST["jenis_spesimen"];
 $sampel_ke = $_POST["sampel_ke"];
 $diagnosa_followup = $_POST["diagnosa_followup"];
 $asal_faskes = $_POST["asal_faskes"];
 $pengirim = $_POST["pengirim"];
 $id_lab = $_POST["id_lab"];
 $tgl_ambil_sampel = $_POST["tgl_ambil_sampel"];
 $tgl_terima_sampel = $_POST["tgl_terima_sampel"];
 $tgl_keluar_hasil = $_POST["tgl_keluar_hasil"];
 $hasil_pcr = $_POST["hasil_pcr"];
 $nik = $_POST["nik"];
 $ct_value = $_POST["ct_value"];
 $keterangan = $_POST["keterangan"];
 for($count = 0; $count < count($no_urut); $count++)
 {
  $query .= "
  INSERT INTO logbook(no_urut, nama, jk_umur, jenis_spesimen, sampel_ke, diagnosa_followup, asal_faskes, pengirim, id_lab, tgl_ambil_sampel, tgl_terima_sampel, tgl_keluar_hasil, hasil_pcr, nik, ct_value, keterangan) 
  VALUES ('".$no_urut[$count]."', '".$nama[$count]."', '".$jk_umur[$count]."', '".$jenis_spesimen[$count]."', '".$sampel_ke[$count]."', '".$diagnosa_followup[$count]."', '".$asal_faskes[$count]."', '".$pengirim[$count]."', '".$id_lab[$count]."', '".$tgl_ambil_sampel[$count]."', '".$tgl_terima_sampel[$count]."', '".$tgl_keluar_hasil[$count]."', '".$hasil_pcr[$count]."', '".$nik[$count]."', '".$ct_value[$count]."', '".$keterangan[$count]."');
  
  ";
 }
 $statement = $connect->prepare($query);
 $statement->execute();
}

?>