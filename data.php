<?php
include 'koneksi.php';
include 'fungsi.php';
?>
<h3 align="center" class="bg-success pb-1 pt-1 text-white">Data Setelah Di Deskripsi</h3>
<table id="example1" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <td>No</td>
            <td>Nama Mahasiswa</td>
            <td>Alamat</td>
            <td>Jurusan</td>
            <td>Jenis Kelamin</td>
            <td>Tanggal Masuk</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        <?php
            $no = 1;
            $query = "SELECT * FROM tbl_mahasiswa_enkripsi ORDER BY id DESC";
            $dewan1 = $db1->prepare($query);
            $dewan1->execute();
            $res1 = $dewan1->get_result();
            
            if ($res1->num_rows > 0) {
                while ($row = $res1->fetch_assoc()) {
                    $id = $row['id'];
                    $nama_mahasiswa = convert("decrypt", $row['nama_mahasiswa']);
                    $alamat = convert("decrypt", $row['alamat']);
                    $jurusan = convert("decrypt", $row['jurusan']);
                    $jenis_kelamin = convert("decrypt", $row['jenis_kelamin']);
                    $tgl_masuk = $row['tgl_masuk'];
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $nama_mahasiswa; ?></td>
                <td><?php echo $alamat; ?></td>
                <td><?php echo $jurusan; ?></td>
                <td><?php echo $jenis_kelamin; ?></td>
                <td><?php echo $tgl_masuk; ?></td>
                <td>
                    <button id="<?php echo $id; ?>" class="btn btn-success btn-sm edit_data"> <i class="fa fa-edit"></i> Edit </button>
                    <button id="<?php echo $id; ?>" class="btn btn-danger btn-sm hapus_data"> <i class="fa fa-trash"></i> Hapus </button>
                </td>
            </tr>
        <?php } } else { ?> 
            <tr>
                <td colspan='7'>Tidak ada data ditemukan</td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<h3 align="center" class="bg-danger pb-1 pt-1 text-white">Data Sebelum Di Deskripsi (Yang Tersimpan pada Database)</h3>
<div class="table-responsive">
    <table id="example2" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <td>No</td>
                <td>Nama Mahasiswa</td>
                <td>Alamat</td>
                <td>Jurusan</td>
                <td>Jenis Kelamin</td>
                <td>Tanggal Masuk</td>
            </tr>
        </thead>
        <tbody>
            <?php
                $no = 1;
                $query = "SELECT * FROM tbl_mahasiswa_enkripsi ORDER BY id DESC";
                $dewan1 = $db1->prepare($query);
                $dewan1->execute();
                $res1 = $dewan1->get_result();

                if ($res1->num_rows > 0) {
                    while ($row = $res1->fetch_assoc()) {
                        $id = $row['id'];
                        $nama_mahasiswa = $row['nama_mahasiswa'];
                        $alamat = $row['alamat'];
                        $jurusan = $row['jurusan'];
                        $jenis_kelamin = $row['jenis_kelamin'];
                        $tgl_masuk = $row['tgl_masuk'];
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $nama_mahasiswa; ?></td>
                    <td><?php echo $alamat; ?></td>
                    <td><?php echo $jurusan; ?></td>
                    <td><?php echo $jenis_kelamin; ?></td>
                    <td><?php echo $tgl_masuk; ?></td>
                </tr>
            <?php } } else { ?> 
                <tr>
                    <td colspan='7'>Tidak ada data ditemukan</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example1').DataTable();

        $('#example2').DataTable();
    });
    
    function reset(){
        document.getElementById("err_nama_mahasiswa").innerHTML = "";
        document.getElementById("err_alamat").innerHTML = "";
        document.getElementById("err_jurusan").innerHTML = "";
        document.getElementById("err_tanggal_masuk").innerHTML = "";
        document.getElementById("err_jenkel").innerHTML = "";
    }

    $(document).on('click', '.edit_data', function(){
        var id = $(this).attr('id');
        $.ajax({
            type: 'POST',
            url: "get_data.php",
            data: {id:id},
            dataType:'json',
            success: function(response) {
                reset();
                $('html, body').animate({ scrollTop: 50 }, 'slow');
                document.getElementById("id").value = response.id;
                document.getElementById("nama_mahasiswa").value = response.nama_mahasiswa;
                document.getElementById("tanggal_masuk").value = response.tgl_masuk;
                document.getElementById("alamat").value = response.alamat;
                document.getElementById("jurusan").value = response.jurusan;
                if (response.jenis_kelamin=="Laki-laki") {
                    document.getElementById("jenkel1").checked = true;
                } else {
                    document.getElementById("jenkel2").checked = true;
                }
            }, error: function(data) {
                console.log(data.responseText)
            }
        });
    });

    $(document).on('click', '.hapus_data', function(){
        var id = $(this).attr('id');
        $.ajax({
            type: 'POST',
            url: "hapus_data.php",
            data: {id:id},
            success: function(data) {
                $('.data').load("data.php");
            }, error: function(data) {
                console.log(data.responseText)
            }
        });
    });
</script>