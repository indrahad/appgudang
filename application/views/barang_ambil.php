<?php ?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css') ?>">

	<title>Tambah Stok</title>
</head>
<body>
	<!-- Konten dimulai -->
	<div class="container">
		<form action="<?php echo site_url('barang/act_ambil/') ?>" method="post" >
			<div class="form-group">
				<label for="dept">Departement</label>
				<select class="form-control" name="dept" id="dept">
					<?php foreach ($list_dept as $i => $row): ?>
						<option value="<?php echo $row->id_dept?>">
							<?php echo $row->nm_dept ?>
						</option>
					<?php endforeach ?>
				</select>
				<label for="barang"> Barang</label>
				<select class="form-control" name="barang" id="barang">
					<?php foreach ($list_barang as $i => $row): ?>
						<?php if ($row->stok_tidakdigunakan == 0): ?>
						<option value="<?php echo $row->id_barang?>" disabled>
							<?php echo $row->nm_barang ?> (Habis)
						</option>
						<?php else: ?>
						<option value="<?php echo $row->id_barang?>">
							<?php echo $row->nm_barang ?> (<?php echo $row->stok_tidakdigunakan ?>)
						</option>
						<?php endif ?>
					<?php endforeach ?>
				</select>
				<label for="jumlah"> Jumlah </label>
				<input class="form-control" type="number" name="jumlah" id="jumlah">
			</div>
				<button type="submit" class="btn btn-primary"> Ambil </button>
		</form>			
	</div>

	
	<!-- Konten Berakhir -->
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>