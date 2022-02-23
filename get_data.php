<?php
    include 'koneksi.php';
    include 'fungsi.php';
    include 'csrf.php';

    $id = $_POST['id'];
    $query = "SELECT * FROM tbl_mahasiswa_enkripsi WHERE id=? ORDER BY id DESC";
    $dewan1 = $db1->prepare($query);
    $dewan1->bind_param('i', $id);
    $dewan1->execute();
    $res1 = $dewan1->get_result();
    while ($row = $res1->fetch_assoc()) {
        $h['id'] = $row["id"];
        $h['nama_mahasiswa'] = convert("decrypt", $row["nama_mahasiswa"]);
        $h['alamat'] = convert("decrypt", $row["alamat"]);
        $h['jurusan'] = convert("decrypt", $row["jurusan"]);
        $h['jenis_kelamin'] = convert("decrypt", $row["jenis_kelamin"]);
        $h['tgl_masuk'] = $row["tgl_masuk"];
    }
    echo json_encode($h);
?>