<section>
    <div class="container py-5">
        <div class="card">
            <div class="card-body">
                <h1 class="fs-4 mb-4">Tambah Barang</h1>
                <div class="mb-3">
                    <a href="index.php?page=barang/index" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                </div>
                <div>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= isset($_POST['nama']) ? $_POST['nama'] :'' ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori Barang</label>
                            <select name="kategori" id="kategori" class="form-control">
                                <option value="">--Pilih Kategori--</option>
                                <option value="1" <?= isset($_POST['kategori']) && $_POST['kategori'] == '1' ? 'selected' : '' ?>>Elektronik</option>
                                <option value="2" <?= isset($_POST['kategori']) && $_POST['kategori'] == '2' ? 'selected' : '' ?>>Pakaian</option>
                                <option value="3" <?= isset($_POST['kategori']) && $_POST['kategori'] == '3' ? 'selected' : '' ?>>Makanan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" value="<?= isset($_POST['harga']) ? $_POST['harga'] :'' ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label">stok</label>
                            <input type="number" class="form-control" id="stok" name="stok" value="<?= isset($_POST['stok']) ? $_POST['stok'] :'' ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="">--Pilih Status--</option>
                                <option value="aktif" <?= isset($_POST['status']) && $_POST['status'] == 'aktif' ? 'selected' :'' ?>>Aktif</option>
                                <option value="tidak aktif" <?= isset($_POST['status']) && $_POST['status'] == 'tidak aktif' ? 'selected' :'' ?>>Tidak Aktif</option>
                            </select>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                        </form>
                </div>
            </div>
        </div>  
    </div>
</section>


<?php 

if(isset($_POST['submit'])){
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $harga = mysqli_real_escape_string($conn, $_POST['harga']);
    $stok = mysqli_real_escape_string($conn, $_POST['stok']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $gambar = $_FILES['gambar'];

    $ext = pathinfo($gambar['name'], PATHINFO_EXTENSION);
    $gambar_name = uniqid() . "." . $ext;
    $gambar_tmpname = $gambar["tmp_name"];

    $simpan = mysqli_query($conn,"INSERT INTO barang (id_kategori, nama_barang, stok_barang, harga_barang, status, gambar_barang) VALUES ('$kategori', '$nama', '$stok', '$harga', '$status','$gambar_name')");

    if($simpan){
        $dest = "assets/images/barang/$gambar_name";
        move_uploaded_file($gambar_tmpname,$dest);
        echo "<script>alert('Barang berhasil disimpan');window.location='index.php?page=barang/index'</script>";
    } else {
        echo "<script>alert('Barang gagal disimpan')</script>";
    }

}