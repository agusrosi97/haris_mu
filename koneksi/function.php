<?php
$conn = new mysqli("localhost", "root", "", "db_sindycart");
if ($conn->connect_errno) {
  printf("Koneksi gagal: %s\n", $conn->connect_error);
  exit();
}
function tgl_indo($tanggal, $cetak_hari = false)
{
  $hari = array(
    1 =>    'Senin',
    'Selasa',
    'Rabu',
    'Kamis',
    'Jumat',
    'Sabtu',
    'Minggu'
  );

  $bulan = array(
    1 =>   'Januari',
    'Feb',
    'Mar',
    'Apr',
    'Mei',
    'Jun',
    'Jul',
    'Agu',
    'Sep',
    'Okt',
    'Nov',
    'Des'
  );
  $split    = explode('-', $tanggal);
  $tgl_indo = $split[2] . ' ' . $bulan[(int) $split[1]] . ', ' . $split[0];

  if ($cetak_hari) {
    $num = date('N', strtotime($tanggal));
    return $hari[$num] . ', ' . $tgl_indo;
  }
  return $tgl_indo;
};
?>