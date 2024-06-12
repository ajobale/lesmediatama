<?php 

if(!isset($_GET['id'])|| $_GET['id'] == ''){
    echo "<script>alert('id barang dibutuhkan!')</script> ";
   echo "<script>window.location='index.php?page=barang/index'</script> ";
}
$id = $_GET['id'];

$hapus = mysqli_query($conn, "DELETE FROM barang WHERE id_barang='$id'");
if(!$hapus) {
    echo "<script>alert('barang gagal di hapus!')</script> ";
    
} 
echo "<script>alert('barang berhasil di hapus!')</script> ";
echo "<script>window.location='index.php?page=barang/index'</script> ";


