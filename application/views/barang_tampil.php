<?php ?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css') ?>">

    <title>Barang</title>
</head>
<body>

    <div class="container">   
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Stok awal</th>
                    <th scope="col">Stok Tersedia</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list_barang as $i => $row): ?>
                    <tr>
                        <td scope="row"><?php echo 'BHP-' . str_pad($row->id_barang, 6, 0, STR_PAD_LEFT) ?></td>
                        <td><?php echo $row->nm_barang ?></td>
                        <td><?php echo $row->stok ?></td>
                        <td><?php echo $row->stok_tidakdigunakan ?></td>
                        <td>
                            <a class="btn btn-primary" href="<?php echo site_url('barang/tambah_stok/' . $row->id_barang ) ?>">Tambah Stok</a>
                            <a class="btn btn-primary" href="<?php echo site_url('barang/riwayat_stok/' . $row->id_barang ) ?>">Riwayat Stok</a>
                            <a class="btn btn-primary" href="<?php echo site_url('barang/ambil/' . $row->id_barang ) ?>">Ambil Barang</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>