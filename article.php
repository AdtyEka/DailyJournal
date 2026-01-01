<?php
// Memuat fungsi upload_foto agar bisa dipanggil di file ini
require_once "uploud_foto.php";
?>

<div class="container">
    <!-- Button trigger modal -->
    <button
        type="button"
        class="btn btn-secondary mb-2"
        data-bs-toggle="modal"
        data-bs-target="#modalTambah"
    >
        <i class="bi bi-plus-lg"></i> Tambah Article
    </button>

    <div class="row">
        <div class="table-responsive" id="article_data"></div>

        <!-- Awal Modal Tambah -->
        <div
            class="modal fade"
            id="modalTambah"
            data-bs-backdrop="static"
            data-bs-keyboard="false"
            tabindex="-1"
            aria-labelledby="staticBackdropLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Article</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form method="post" action="admin.php?page=article" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Judul</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="judul"
                                    placeholder="Tuliskan Judul Artikel"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="floatingTextarea2">Isi</label>
                                <textarea
                                    class="form-control"
                                    placeholder="Tuliskan Isi Artikel"
                                    name="isi"
                                    required
                                ></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Gambar</label>
                                <input type="file" class="form-control" name="gambar">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" value="simpan" name="simpan" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Akhir Modal Tambah -->
    </div>
</div>

<script>
    $(document).ready(function () {
        function load_data(hlm) {
            $.ajax({
                url: "article_data.php",
                method: "POST",
                data: {
                    hlm: hlm
                },
                success: function (data) {
                    $("#article_data").html(data);
                }
            });
        }

        load_data();

        $(document).on("click", ".halaman", function () {
            var hlm = $(this).attr("id");
            load_data(hlm);
        });
    });
</script>

<?php
// Jika tombol simpan diklik
if (isset($_POST['simpan'])) {
    $judul    = $_POST['judul'];
    $isi      = $_POST['isi'];
    $tanggal  = date("Y-m-d H:i:s");
    $username = $_SESSION['username'];
    $gambar   = '';
    $nama_gambar = isset($_FILES['gambar']['name']) ? $_FILES['gambar']['name'] : '';

    // Jika ada file yang dikirim
    if ($nama_gambar !== '' && isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0) {
        // Panggil function upload_foto untuk cek spesifikasi file yg dikirimkan user
        // Function ini memiliki 2 keluaran yaitu status dan message
        $cek_upload = upload_foto($_FILES['gambar']);

        // Cek status true/false
        if ($cek_upload['status']) {
            // Jika true maka message berisi nama file gambar
            $gambar = $cek_upload['message'];
        } else {
            // Jika false maka message berisi pesan error, tampilkan dalam alert
            echo "<script>
                alert('" . $cek_upload['message'] . "');
                document.location='admin.php?page=article';
            </script>";
            die;
        }
    }

    // Cek apakah ada id yang dikirimkan dari form
    if (isset($_POST['id'])) {
        // Jika ada id, lakukan update data dengan id tersebut
        $id = $_POST['id'];

        if ($nama_gambar == '') {
            // Jika tidak ganti gambar
            $gambar = $_POST['gambar_lama'];
        } else {
            // Jika ganti gambar, hapus gambar lama jika ada
            if (
                isset($_POST['gambar_lama']) &&
                $_POST['gambar_lama'] !== '' &&
                file_exists("assets/images/article/" . $_POST['gambar_lama'])
            ) {
                unlink("assets/images/article/" . $_POST['gambar_lama']);
            }
        }

        $stmt = $conn->prepare(
            "UPDATE article
             SET
                judul = ?,
                isi = ?,
                gambar = ?,
                tanggal = ?,
                username = ?
             WHERE id = ?"
        );

        $stmt->bind_param("sssssi", $judul, $isi, $gambar, $tanggal, $username, $id);
        $simpan = $stmt->execute();
    } else {
        // Jika tidak ada id, lakukan insert data baru
        $stmt = $conn->prepare(
            "INSERT INTO article (judul, isi, gambar, tanggal, username)
             VALUES (?, ?, ?, ?, ?)"
        );

        $stmt->bind_param("sssss", $judul, $isi, $gambar, $tanggal, $username);
        $simpan = $stmt->execute();
    }

    if ($simpan) {
        echo "<script>
            alert('Simpan data sukses');
            document.location='admin.php?page=article';
        </script>";
    } else {
        echo "<script>
            alert('Simpan data gagal');
            document.location='admin.php?page=article';
        </script>";
    }

    $stmt->close();
    $conn->close();
}

// Jika tombol hapus diklik
if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $gambar = $_POST['gambar'];

    if ($gambar !== '' && file_exists("assets/images/article/" . $gambar)) {
        // Hapus file gambar
        unlink("assets/images/article/" . $gambar);
    }

    $stmt = $conn->prepare("DELETE FROM article WHERE id = ?");

    $stmt->bind_param("i", $id);
    $hapus = $stmt->execute();

    if ($hapus) {
        echo "<script>
            alert('Hapus data sukses');
            document.location='admin.php?page=article';
        </script>";
    } else {
        echo "<script>
            alert('Hapus data gagal');
            document.location='admin.php?page=article';
        </script>";
    }

    $stmt->close();
    $conn->close();
}
?>