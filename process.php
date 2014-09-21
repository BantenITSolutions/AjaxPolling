<?php
include('koneksi.php');
$id = $_POST['id_soal'];
$idj = $_POST['name'];
$soal = $_POST['soal'];
$jum = 0;
	$qjum = mysql_query("select * from tbl_jwb_poll where id_soal='$id'");
	while($rjum=mysql_fetch_array($qjum))
	{
		$jum += $rjum['vote'];
	}
setcookie("pengunjung", "sudah berkunjung", time() + 200 * 24);
if (!isset($_COOKIE["pengunjung"])) 
{
	echo '<h4>'.$soal.'</h4><br>';
	$q = mysql_query("update tbl_jwb_poll set vote=vote+1 where id_jwb='$idj'");
	$qj = mysql_query("select * from tbl_jwb_poll where id_soal='$id'");
	while($rj=mysql_fetch_array($qj))
	{
	$pr = sprintf("%2.1f",(($rj['vote']/$jum)*100));
	$gbr = $pr * 3;
	echo ''.$rj['jawaban'].'<br>
	<div style="padding:10px; float:none; margin-bottom:5px; background-color:#000; width:'.$gbr.'px; color:#fff;" >'.$rj['vote'].'%</div>';
	}
}
else
{
	echo "<h4>Anda sudah melakukan voting sebelumnya..!!!<br>Terima Kasih telah melakukan voting.</h4>";
}

$id = "";

?>
