<?php

$barang = mysqli_query($conn,"SELECT * FROM barang RIGHT JOIN kategori ON barang.id_kategori=kategori.id_kategori" );


?>

<section>
    <div class="container py-5">
        <div class="card">
            <div class="card-body">
                <h1 class="fs-4 mb-4">Barang</h1>
                <div class="mb-3">
                    <a href="index.php?page=barang/tambah" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah</a>
                </div>
                <div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Gambar Barang</th>
                            <th>Nama Barang</th>
                            <th>Kategori Barang</th>
                            <th>Stok Barang</th>
                            <th>Harga Barang</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                            $no = 1;
                            foreach($barang as $item){ ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $item['id_barang']?></td>
                                    <td><img src="assets/images/barang/<?= $item['gambar_barang']?>" width="100" alt=""></td>
                                    <td><?= $item['nama_barang']?></td>
                                    <td><?= $item['nama_kategori']?></td>
                                    <td><?= $item['stok_barang']?></td>
                                    <td><?= $item['harga_barang']?></td>
                                    <td><?= $item['status']?></td>
                                    <td>
                                        <a href="index.php?page=barang/edit" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="index.php?page=barang/hapus&id=<?= $item['id_barang']?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                    </td>
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>  
    </div>
</section>