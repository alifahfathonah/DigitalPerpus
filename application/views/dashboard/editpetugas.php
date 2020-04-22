<div id="page-wrapper">
	<br />
<legend><?php echo $title;?></legend>
<?php echo validation_errors(); echo $message;?>
<form class="form-horizontal" action="" method="post">
	<div class="form-group">
		<label class="col-lg-3 control-label">Username</label>
		<div class="col-lg-5">
			<input type="hidden" name="id" value="<?php echo $petugas['id_petugas']?>" >
			<input type="text" name="user" class="form-control" readonly="readonly" value="<?php echo $petugas['user']?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-lg-2 control-label">Password</label>
		<div class="col-lg-5">
			<input type="password" name="password" class="form-control" value="<?php echo $petugas['password']?>">
		</div>
	</div>
	<div class="form-group well">
		<div class="col-lg-5">
			<button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
			<a href="<?php echo site_url('dashboard/petugas');?>" class="btn btn-default">Kembali</a>
		</div>	
	</div>
</form>
</div>