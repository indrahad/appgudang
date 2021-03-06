<?php ?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css') ?>">

	<title>Tambah Barang</title>
</head>
<body>
	<!-- konten dimulai -->
	<div class="container">
		<form action="<?php echo site_url('barang/act_tambah') ?>" method="post"  >
			<div class="form-group">
				<label for="nmbrg"> Nama </label>
				<input type="text" class="form-control" name="nmbrg" id="nmbrg" placeholder="Masukan Nama Barang" >	
			</div>
			<div class="form-group">
				<label for="satuan"> Satuan </label>
				<!-- <input type="text" class="form-control" name="satuan" id="satuan">	
				<pre>
					<?php 
						print_r($list_satuan);
					 ?>
				</pre> -->
				<select class="form-control" name="satuan" id="satuan">
					<?php foreach ($list_satuan as $i => $row): ?>
						<option value="<?php echo $row->id_satuan ?>">
							<?php echo $row->nm_satuan ?>
						</option>
						<?php endforeach ?>
				</select>
			</div>
			<div class="form-group">
				<label for="merk"> Merk </label>
				<input type="text" class="form-control" name="merk" id="merk">	
			</div>
			<div class="form-group">
				<label for="spesifikasi"> Spesifikasi </label>
				<input type="text" class="form-control" name="spesifikasi" id="spesifikasi">	
			</div>			
			<div class="form-group">	
			<label for="stok"> Stok </label>
			<input type="number" class="form-control" name="stok" id="stok" placeholder="Jumlah Stok">
			</div>		
			<button type="submit" class="btn btn-primary"> Tambah </button>
		</form>
	</div>
	<!-- konten berakhir -->
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>