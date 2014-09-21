<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>
<head>
	<title>JQuery Form Example</title> 
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript">
	$(document).ready(function(){
		$("#myform").validate({
			debug: false,
			rules: {
				name: "required"
			},
			messages: {
				name: "Pilih pilihan anda.",
			},
			submitHandler: function(form) {
				$.post("process.php", $("#myform").serialize(), function(data) {
					$('#results').html(data);
				});
			}
		});
	});

	$(function() {
		$('#loading').ajaxStart(function(){
			$(this).fadeIn();
		}).ajaxStop(function(){
			$(this).fadeOut();
		});
	 
		$('#menu a').click(function() {
			var url = $(this).attr('href');
			$('#results').load(url);
			return false;
		});
	});
</script> 
<style>
body{
background-color:#ccc;
margin:0px auto;
font-size:12px;
font-family:Arial
}
#results{
margin:0px auto;
width:400px;
background-color:#fff;
padding:10px;
}
input{
background-color:#000;
color:#fff;
padding:5px;
border:1px solid #ccc;
}
input:hover{
background-color:#ccc;
color:#000;
padding:5px;
border:1px solid #000;
}
#loading{
position:static;
margin:0px auto;
width:400px;
background-color:#000;
color:#fff;
padding:10px;
text-align:center;
}
h4{
margin:0px auto;
font-size:14px;
font-weight:bold;
}
</style>
</head>

<body>
<div id="loading" style="display:none"><img src="images/loading.gif" /><br />Mohon tunggu. Vote anda sedang disimpan.....</div> 
<div id="results">
<h4>
<?php
include('koneksi.php');
$q = mysql_query("select * from tbl_poll where status='Y'");
$id = "";
$soal = "";
while($r=mysql_fetch_array($q))
{
	$id=$r['id_soal'];
	$soal=$r['soal'];
	echo $r['soal'];
}
?>
</h4><br>
<form name="myform" id="myform" action="" method="POST">  
<input type="hidden" value="<?php echo $id; ?>" name="id_soal">
<input type="hidden" value="<?php echo $soal; ?>" name="soal">
<!-- The Name form field -->
<?php
$qj = mysql_query("select * from tbl_jwb_poll where id_soal='$id'");
$id = "";
while($rj=mysql_fetch_array($qj))
{
?>
	<input type="radio" name="name" checked="checked" value="<?php echo $rj['id_jwb']; ?>"/> <?php echo $rj['jawaban']; ?><br>
<?php
}
?>
	<br><input type="submit" name="submit" value="Submit"> 
</form>
<!-- We will output the results from process.php here -->
<div>
</body>
</html>
