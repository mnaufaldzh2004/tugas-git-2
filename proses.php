<?php
// Koneksi ke database
$db = mysqli_connect('localhost', 'root', '', 'form_kontak');

// Cek koneksi
if (!$db) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

/**
 * Fungsi untuk menambahkan data ke database
 *
 * @param array $post Data dari formulir
 * @return int Jumlah baris yang terpengaruh
 */
function tambah_data($post)
{
    global $db;

    // Mengambil data dari formulir dan menghindari XSS dengan strip_tags
    $nim = strip_tags($post['nim']);
    $nama = strip_tags($post['nama']);
    $kelas = strip_tags($post['kelas']);
    $jenis_kelamin = strip_tags($post['jenis_kelamin']);
    $email = strip_tags($post['email']);
    $pesan = strip_tags($post['pesan']);

    // Menyiapkan query dengan prepared statement
    $stmt = $db->prepare("INSERT INTO kontak (nim, nama, kelas, jenis_kelamin, email, pesan) VALUES (?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Prepare failed: " . $db->error);
    }

    // Mengikat parameter
    $stmt->bind_param('ssssss', $nim, $nama, $kelas, $jenis_kelamin, $email, $pesan);

    // Menjalankan query dan memeriksa kesalahan
    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }

    // Mengambil jumlah baris yang terpengaruh
    $affected_rows = $stmt->affected_rows;

    // Menutup statement
    $stmt->close();

    return $affected_rows;
}

// Cek apakah tombol submit ditekan
if (isset($_POST['submit'])) {
    if (tambah_data($_POST) > 0) {
        echo "<script>
                alert('Data berhasil ditambahkan');
                document.location.href = 'index.php'; // Ganti dengan halaman yang sesuai
            </script>";
    } else {
        echo "<script>
                alert('Data gagal ditambahkan');
                document.location.href = 'data-form.php'; // Ganti dengan halaman yang sesuai
            </script>";
    }
}

// Menutup koneksi database
mysqli_close($db);
?>
