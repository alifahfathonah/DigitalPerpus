<div id="page-wrapper">
	<br />
<div class="nav navbar-nav navbar-right">
	<form class="navbar-form navbar-left" role="search" action="<?php echo site_url('buku/cari');?>" method="post">
		<div class="form-group">
			<label>Cari Buku</label>
			<input type="text" class="form-control" placeholder="Cari..." name="cari">
		</div>
		<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-search"></i> Cari</button>
	</form>
</div>

<a href="<?php echo site_url('buku/tambah');?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
<hr>
<?php echo $message;?>

<table class="table table-striped">
	<thead>
		<tr>
			<td>No.</td>
			<td>Gambar</td>
			<td>Kode Buku</td>
			<td>Judul Buku</td>
			<td>Pengarang</td>
			<td>Klasifikasi</td>
			<td colspan="2"></td>
		</tr>
	</thead>
	<?php $no=0; foreach($buku as $row ): $no++;?>
	<tr>
		<td><?php echo $no;?></td>
		<td><?php if($row->image != "") { ?>
			 	<img src="<?php echo base_url('assets/img/buku/'.$row->image);?>" width="140px" height="190px">
		    <?php }else{ ?>
				<img src="<?php echo base_url('assets/img/buku/image'.rand(1,5).'.jpg');?>" width="140px" height="190px">
			 <?php } ?> 
		</td>
		<td><?php echo $row->kode_buku;?></td>
		<td><?php echo $row->judul;?></td>
		<td><?php echo $row->pengarang;?></td>
		<td><?php echo $row->klasifikasi;?></td>
		<td align="center"><a href="<?php echo site_url('buku/edit/'.$row->kode_buku);?>"><h3><i class="glyphicon glyphicon-edit"></i></h3></a></td>
		<td align="center"><a href="#" class="hapus" kode="<?php echo $row->kode_buku;?>"><h3><i class="glyphicon glyphicon-trash"></i></h3></a></td>
	</tr>
	<?php endforeach;?>
</table>
<?php echo $pagination;?>


<!-- jQuery -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/dist/js/sb-admin-2.js"></script>
<script>
	$(function() {
		$(".hapus").click(function(){
			var kode=$(this).attr("kode");

			$("#idhapus").val(kode);
			$("#myModal").modal("show");
		});

		$("#konfirmasi").click(function(){
			var kode=$("#idhapus").val();

			$.ajax({
				url:"<?php echo site_url('buku/hapus');?>",
				type:"POST",
				data:"kode="+kode,
				cache:false,
				success:function(html){
					location.href="<?php echo site_url('buku/index/delete-success');?>";
				}
			});
		});
	});
</script>
</div>