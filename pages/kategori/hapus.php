<?php 

if(!isset($_GET['id'])|| $_GET['id'] == ''){
    echo "<script>alert('id kategori dibutuhkan!')</script> ";
   echo "<script>window.location='index.php?page=kategori/index'</script> ";
}
$id = $_GET['id'];

$hapus = mysqli_query($conn, "DELETE FROM kategori WHERE id_kategori='$id'");
if(!$hapus) {
    echo "<script>alert('kategori gagal di hapus!')</script> ";
    
} 
echo "<script>alert('kategori berhasil di hapus!')</script> ";
echo "<script>window.location='index.php?page=kategori/index'</script> ";


