<?php
include 'koneksi.php';
include 'fungsi.php';
include 'csrf.php';

$id = anti($_POST['id']);
$nama_mahasiswa = convert("encrypt", anti($_POST['nama_mahasiswa']));
$jenkel = convert("encrypt", anti($_POST['jenkel']) );
$alamat = convert("encrypt", anti($_POST['alamat']) );
$jurusan = convert("encrypt", anti($_POST['jurusan']) );
$tanggal_masuk = anti($_POST['tanggal_masuk']);

if ($id == "") {
	$query = "INSERT into tbl_mahasiswa_enkripsi (nama_mahasiswa, alamat, jurusan, jenis_kelamin, tgl_masuk) VALUES (?, ?, ?, ?, ?)";
	$dewan1 = $db1->prepare($query);
	$dewan1->bind_param("sssss", $nama_mahasiswa, $alamat, $jurusan, $jenkel, $tanggal_masuk);
	$dewan1->execute();
} else {
	$query = "UPDATE tbl_mahasiswa_enkripsi SET nama_mahasiswa=?, alamat=?, jurusan=?, jenis_kelamin=?, tgl_masuk=? WHERE id=?";
	$dewan1 = $db1->prepare($query);
	$dewan1->bind_param("sssssi", $nama_mahasiswa, $alamat, $jurusan, $jenkel, $tanggal_masuk, $id);
	$dewan1->execute();
}
echo json_encode(['success' => 'Sukses']);
$db1->close();
?>