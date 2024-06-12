<section>
    <div class="container py-5">
        <div class="card">
            <div class="card-body">
                <h1 class="fs-4 mb-4">Tambah Kategori</h1>
                <div class="mb-3">
                    <a href="index.php?page=barang/index" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                </div>
                <div>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama kategori</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= isset($_POST['nama']) ? $_POST['nama'] :'' ?>" required>
                        </div>
                      
                     
                        <div class="mb-3">
                            <label for="gambar" class="form-label">gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" required>
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
    $gambar = $_FILES['gambar'];

    $ext = pathinfo($gambar['name'], PATHINFO_EXTENSION);
    $gambar_name = uniqid() . "." . $ext;
    $gambar_tmpname = $gambar["tmp_name"];

    $simpan = mysqli_query($conn,"INSERT INTO kategori (id_kategori, nama_kategori,  gambar_kategori) VALUES (Null,  '$nama', '$gambar_name')");

    if($simpan){
        $dest = "assets/images/kategori/$gambar_name";
        move_uploaded_file($gambar_tmpname,$dest);
        echo "<script>alert('Kategori berhasil disimpan');window.location='index.php?page=kategori/index'</script>";
    } else {
        echo "<script>alert('Kategori gagal disimpan')</script>";
    }

}