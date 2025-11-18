<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nama = trim($_POST["nama"]);

    if ($nama === "") {
        echo "Input nama tidak boleh kosong!";
        exit;
    }

    echo "Halo, $nama! Selamat datang di AJAX!";
}
?>