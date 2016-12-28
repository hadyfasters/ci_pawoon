<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Pawoon Test</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
</head>
<body onload="loadlist()">

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label for="uuid">ID Customer</label>
				<input type="text" id="uuid" class="form-control" name="uuid" value="<?php echo $id; ?>" readonly>
			</div>
			<div class="form-group">
				<label for="nama">Nama</label>
				<input type="text" id="nama" class="form-control" name="nama" placeholder="Masukkan Nama ...">
			</div>
			<div class="form-group">
				<label for="alamat">Alamat</label>
				<input type="text" id="alamat" class="form-control" name="alamat" placeholder="Masukkan Alamat ...">
			</div>
			<div class="form-group">
				<button id="submit" class="btn btn-primary btn-sm">SUBMIT</button>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h1>Daftar User</h1>
			<table class="table">
				<thead>
					<tr>
						<th>ID Customer</th>
						<th>Nama</th>
						<th>Alamat</th>
					</tr>
				</thead>	
				<tbody id="userlist"></tbody>			
			</table>
		</div>
	</div>
		
</div>

<script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery-3.1.1.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>

<script type="text/javascript">
	/* LOAD THE LIST OF USER */
	function loadlist()
	{
		$.ajax({
			url : "index.php/userlist",
			type : "POST",
			data : '',
			cache : false,
			success : function(data){
				var obj = $.parseJSON(data);

				if(obj.length == '')
				{
					$('tbody#userlist').html('<tr><td colspan="3" class="text-center">- No Data Available -</td></tr>');
				}else{
					$.each(obj.data, function(i,v){
						$('tbody#userlist').prepend('<tr><td>'+v.uuid+'</td><td>'+v.nama+'</td><td>'+v.alamat+'</td></tr>');
					});
				}
			}
		});
	}


	/* SUBMITING THE FORM TO DATABASE */
	$('button#submit').on('click', function(){
		var id = $('input#uuid').val();
		var nama = $('input#nama').val();
		var alamat = $('input#alamat').val();

		$.ajax({
			url : 'index.php/saveuser',
			type : 'POST',
			cache : false,
			data : {
				'uuid' : id,
				'nama' : nama,
				'alamat' : alamat
			},
			success : function(data){
				var obj = $.parseJSON(data);
				console.log(obj);
				if(obj.length == '')
				{
					$('tbody#userlist').html('<tr><td colspan="3" class="text-center">- No Data Available -</td></tr>');
				}else{
					if(obj.response == 'ok')
					{
						alert(obj.message);
						$('tbody#userlist').prepend('<tr><td>'+obj.data.uuid+'</td><td>'+obj.data.nama+'</td><td>'+obj.data.alamat+'</td></tr>');
					}else if(obj.response == 'no')
					{
						alert(obj.message);
					}
				}
			}
		});
	});

</script>
</body>
</html>