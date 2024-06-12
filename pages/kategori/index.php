<?php

$kategori = mysqli_query($conn,"SELECT * FROM kategori");

?>

<section>
    <div class="container py-5">
        <div class="card">
            <div class="card-body">
                <h1 class="fs-4 mb-4">Kategori</h1>
                <div class="mb-3">
                    <a href="index.php?page=kategori/tambah" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah Kategori</a>
                </div>
                <div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id</th>
                            <th>Nama Kategori</th>
                            <th>Gambar Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                            $no = 1;
                            foreach($kategori as $item){ ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $item['id_kategori']?></td>
                                    <td><?= $item['nama_kategori']?></td>
                                    <td><img src="assets/images/kategori/<?= $item['gambar_kategori']?>" width="100" alt=""></td>
                                    <td>
                                        <a href="index.php?page=kategori/edit&id=<?= $item['id_kategori']?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="index.php?page=kategori/hapus&id=<?= $item['id_kategori']?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
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