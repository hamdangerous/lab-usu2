<?php

if(!empty($_FILES['csv_file']['name']))
{
 $file_data = fopen($_FILES['csv_file']['tmp_name'], 'r');
 $column = fgetcsv($file_data);
 while($row = fgetcsv($file_data))
 {
  $row_data[] = array(
    'no_urut' => $row[0],
    'nama' => $row[1],
    'jk_umur' => $row[2],
    'jenis_spesimen' => $row[3],
    'sampel_ke' => $row[4],
    'diagnosa_followup' => $row[5],
    'asal_faskes' => $row[6],
    'pengirim' => $row[7],
    'id_lab' => $row[8],
    'tgl_ambil_sampel' => $row[9],
    'tgl_terima_sampel' => $row[10],
    'tgl_keluar_hasil' => $row[11],
    'hasil_pcr' => $row[12],
    'nik' => $row[13],
    'ct_value' => $row[14],
    'keterangan' => $row[15]
  );
 }
 $output = array(
  'column'  => $column,
  'row_data'  => $row_data
 );

 echo json_encode($output);

}

?>