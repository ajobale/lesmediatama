<?php 
if(!isset($_GET['id'])|| $_GET['id'] == ''){
    echo "<script>alert('id kategori dibutuhkan!')</script> ";
   echo "<script>window.location='index.php?page=kategori/index'</script> ";
}

$id = $_GET['id'];
$rawkategori = mysqli_query($conn, "SELECT * FROM kategori WHERE id_kategori='$id'");
$kategori = mysqli_fetch_assoc($rawkategori);

?>



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
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $kategori['nama_kategori'] ?>" required>
                        </div>
                      
                     
                        <div class="mb-3">
                            <label for="gambar" class="form-label">gambar</label><br>
                            <img src="assets/images/kategori/<?= $kategori['gambar_kategori']?>" width="100" alt="">
                            
                            <input type="hidden" name="gambar" value="<?= $kategori['gambar_kategori'] ?>">
                            <input type="file" class="form-control" id="gambar_baru" name="gambar_baru" >
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
    print_r($_POST);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $gambar = $_POST['gambar'];
    $gambar_baru = $_FILES['gambar_baru'];

    $hasimage = false;

    if($gambar_baru['name'] !== '') {
        $hasimage = true; 
           $ext = pathinfo($gambar_baru['name'], PATHINFO_EXTENSION);
        $gambar_name = uniqid() . "." . $ext;
        $gambar_tmpname = $gambar_baru["tmp_name"];
    } else {
        $gambar_name = $gambar;
    }
     

    $update = mysqli_query($conn,"UPDATE kategori  SET nama_kategori='$nama', gambar_kategori='$gambar_name' WHERE id_kategori='$id'");

    if($update){
        if($hasimage){
            $dest = "assets/images/kategori/";
            move_uploaded_file($gambar_tmpname,$dest.$gambar_name);
            if(file_exists($dest.$gambar)){
              unlink($dest.$gambar);  
            }
            
        }

       
        echo "<script>alert('Kategori berhasil disimpan');window.location='index.php?page=kategori/index'</script>";
    } else {
        echo "<script>alert('Kategori gagal disimpan')</script>";
    }

}