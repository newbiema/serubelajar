<?php
include 'services/db.php';

// Proses pengiriman form
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = htmlspecialchars($_POST['nama']);
    $topik = htmlspecialchars($_POST['topik']);
    $komentar = htmlspecialchars($_POST['komentar']);

    $sql = "INSERT INTO diskusi (nama, topik, komentar) VALUES ('$nama', '$topik', '$komentar')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Komentar berhasil dikirim!');</script>";
        // Redirect untuk menghindari pengiriman ulang data
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Ambil data diskusi
$result = $conn->query("SELECT * FROM diskusi ORDER BY tanggal DESC");
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SeruBelajar.id</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Fredoka', sans-serif;
    }
  </style>
</head>
<body class="bg-gray-100">
  <nav class="bg-green-500 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-16">
        <!-- Logo -->
        <div class="flex-shrink-0 text-lg font-bold flex items-center gap-2">
          <img src="img/logo.png" alt="Logo" class="rounded-full w-8 h-8">
          SeruBelajar.id
        </div>

        <!-- Menu for desktop -->
        <div class="hidden md:flex space-x-4">
          <a href="#" class="hover:text-yellow-400 hover:bg-green-600 px-3 py-2 rounded-lg transition duration-300">
            Home
          </a>
          <a href="#" class="hover:text-yellow-400 hover:bg-green-600 px-3 py-2 rounded-lg transition duration-300">
            Materi
          </a>
          <a href="#" class="hover:text-yellow-400 hover:bg-green-600 px-3 py-2 rounded-lg transition duration-300">
            Profil
          </a>
          <a href="#" class="hover:text-yellow-400 hover:bg-green-600 px-3 py-2 rounded-lg transition duration-300">
           Contact
          </a>
          <a href="" class="hover:text-yellow-400 hover:bg-green-600 px-3 py-2 rounded-lg transition duration-300">
            <img class="h-5" src="img/logout.png" alt="">
          </a>
        </div>

        <!-- Hamburger button -->
        <div class="md:hidden flex items-center">
          <button id="menu-btn" class="focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile menu -->
    <div id="mobile-menu" class="md:hidden hidden">
      <a href="#" class="block px-4 py-2 hover:bg-green-600 rounded-lg transition duration-300">
        Home
      </a>
      <a href="#" class="block px-4 py-2 hover:bg-green-600 rounded-lg transition duration-300">
        Materi
      </a>
      <a href="#" class="block px-4 py-2 hover:bg-green-600 rounded-lg transition duration-300">
        Contact
      </a>
    </div>
  </nav>


  <!-- Hero Section -->
  <section class="bg-gradient-to-r from-green-400 to-blue-500 text-white">
    <div class="max-w-7xl mx-auto px-6 sm:px-12 lg:px-16 py-20 flex flex-col-reverse lg:flex-row items-center">
      <!-- Left content -->
      <div class="lg:w-1/2">
        <h1 class="text-4xl sm:text-5xl font-bold mb-6">
          Belajar Jadi Lebih <span class="text-yellow-300">Menyenangkan</span>!
        </h1>
        <p class="text-lg sm:text-xl mb-8">
          SeruBelajar.id menghadirkan materi menarik, seru, dan mudah dipahami untuk membantu anak-anak Indonesia meraih mimpi.
        </p>
        <div class="flex space-x-4">
          <a href="#materi" class="bg-yellow-400 text-green-800 hover:bg-yellow-300 px-6 py-3 rounded-lg font-semibold shadow-lg transition duration-300">
            Mulai Belajar
          </a>
          <a href="#contact" class="bg-transparent border border-white hover:bg-white hover:text-green-800 px-6 py-3 rounded-lg font-semibold shadow-lg transition duration-300">
            Hubungi Kami
          </a>
        </div>
      </div>

      <!-- Right image -->
      <div class="lg:w-1/2 mb-12 lg:mb-0">
        <img src="img/hero.png" alt="Belajar Seru" class="rounded-lg w-full">
      </div>
    </div>
  </section>



  <!-- Section Materi -->
<section id="materi" class="py-16 bg-white">
  <div class="max-w-7xl mx-auto px-6 sm:px-12 lg:px-16">
    <div class="text-center mb-12">
      <h2 class="text-3xl sm:text-4xl font-bold text-green-600">Materi Seru</h2>
      <p class="text-gray-600 mt-4">Temukan berbagai materi menarik yang dirancang khusus untuk anak-anak.</p>
    </div>

    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
      <!-- Card 1 -->
      <div class="bg-gray-100 rounded-lg shadow-lg overflow-hidden">
        <img src="img/MATEMATIKA.jpg" alt="Matematika" class="w-full h-48 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-semibold text-green-800 mb-2">Matematika</h3>
          <p class="text-gray-600 mb-4">Belajar berhitung jadi menyenangkan dengan soal-soal interaktif.</p>
          <a href="matematika.html" class="bg-yellow-400 hover:bg-yellow-300 text-green-800 font-bold px-4 py-2 rounded-lg transition duration-300">
            Lihat Materi
          </a>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="bg-gray-100 rounded-lg shadow-lg overflow-hidden">
        <img src="img/Math.png" alt="Huruf Abjad " class="w-full h-48 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-semibold text-green-800 mb-2">Huruf Abjad </h3>
          <p class="text-gray-600 mb-4">Belajar Menghafal huruf abjad dengan gambar lucu</p>
          <a href="abjad.php" class="bg-yellow-400 hover:bg-yellow-300 text-green-800 font-bold px-4 py-2 rounded-lg transition duration-300">
            Lihat Materi
          </a>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="bg-gray-100 rounded-lg shadow-lg overflow-hidden">
        <img src="img/english.png" alt="Bahasa Inggris" class="w-full h-48 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-semibold text-green-800 mb-2">Bahasa Inggris</h3>
          <p class="text-gray-600 mb-4">Latihan percakapan dan kosa kata yang seru.</p>
          <a href="#" class="bg-yellow-400 hover:bg-yellow-300 text-green-800 font-bold px-4 py-2 rounded-lg transition duration-300">
            Lihat Materi
          </a>
        </div>
      </div>
    </div>
  </div>
</section>




<!-- Section Profil Developer -->
<section id="profil" class="py-16 bg-gray-50">
  <div class="max-w-7xl mx-auto px-6 sm:px-12 lg:px-16">
    <div class="text-center mb-12">
      <h2 class="text-3xl sm:text-4xl font-bold text-green-600">Profil Developer</h2>
      <p class="text-gray-600 mt-4">Kenali siapa yang ada di balik SeruBelajar.id</p>
    </div>

    <div class="flex flex-col md:flex-row items-center justify-center gap-8">
      <!-- Foto Developer -->
      <div class="w-40 h-40 md:w-48 md:h-48">
        <img src="img/april.jpg" alt="Foto Developer" class="w-full h-full object-cover rounded-full shadow-lg">
      </div>

      <!-- Deskripsi Developer -->
      <div class="text-center md:text-left max-w-md">
        <h3 class="text-2xl font-semibold text-green-800">Aprilia</h3>
        <p class="text-gray-600 mt-4">
          Hai! Saya adalah pengembang di balik <span class="text-green-600 font-bold">SeruBelajar.id</span>. 
          Website ini dibuat untuk membantu anak-anak belajar dengan cara yang menyenangkan dan interaktif. 
          Dengan passion dalam coding dan pendidikan, saya berharap website ini bermanfaat untuk semua!
        </p>
        <div class="mt-6 flex justify-center md:justify-start gap-4">
          <a href="https://github.com" target="_blank" class="bg-red-700 hover:bg-gray-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition duration-300">
            Instagram
          </a>
          <a href="https://linkedin.com" target="_blank" class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded-lg text-sm font-semibold transition duration-300">
            LinkedIn
          </a>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Form Diskusi -->
<section class="mb-12 mt-8" id="diskusi">
  <h2 class="text-2xl text-center font-bold text-green-500 mb-4">Yuk, Diskusi!</h2>
  <form action="" method="POST" class="bg-yellow-100 p-6 rounded-lg shadow-xl max-w-2xl mx-auto">
    <div class="mb-6">
      <label for="nama" class="block text-lg font-semibold text-gray-700 mb-2">Nama Kamu:</label>
      <input type="text" id="nama" name="nama" required class="w-full p-3 border border-green-500 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-300">
    </div>
    <div class="mb-6">
      <label for="topik" class="block text-lg font-semibold text-gray-700 mb-2">Topik Diskusi:</label>
      <input type="text" id="topik" name="topik" required class="w-full p-3 border border-green-500 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-300">
    </div>
    <div class="mb-6">
      <label for="komentar" class="block text-lg font-semibold text-gray-700 mb-2">Pesan Kamu:</label>
      <textarea id="komentar" name="komentar" required class="w-full p-3 border border-green-500 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-300"></textarea>
    </div>
    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-green-300 transition">Kirim Diskusi</button>
  </form>
</section>

<!-- Hasil Diskusi -->
<section class="mt-8">
  <h2 class="text-2xl text-center font-bold text-blue-500 mb-6">Hasil Diskusi Seru!</h2>
  <div class="space-y-6">
    <?php while ($row = $result->fetch_assoc()): ?>
      <div class="bg-white p-6 rounded-lg shadow-lg border border-green-200">
        <h3 class="text-xl font-semibold text-green-600"><?= $row['topik'] ?></h3>
        <p class="mt-3 text-gray-700"><?= $row['komentar'] ?></p>
        <p class="mt-4 text-sm text-gray-500">Oleh: <span class="font-bold text-green-500"><?= $row['nama'] ?></span> pada <?= $row['tanggal'] ?></p>
      </div>
    <?php endwhile; ?>
  </div>
</section>


<!-- Footer Section -->
<footer class="bg-green-500 text-white py-8">
  <div class="max-w-7xl mx-auto px-6 sm:px-12 lg:px-16">
    <div class="flex flex-col md:flex-row justify-between items-center">
      <!-- Logo dan Deskripsi -->
      <div class="mb-6 md:mb-0 text-center md:text-left">
        <h3 class="text-xl font-bold">SeruBelajar.id</h3>
        <p class="text-sm mt-2">
          Belajar jadi lebih menyenangkan dan mudah bersama SeruBelajar.id! 
          Mari wujudkan mimpi menuju Indonesia emas.
        </p>
      </div>

      <!-- Menu Navigasi -->
      <div class="flex flex-wrap justify-center md:justify-start gap-4 text-sm">
        <a href="#home" class="hover:text-yellow-300 transition">Home</a>
        <a href="#materi" class="hover:text-yellow-300 transition">Materi</a>
        <a href="#profil" class="hover:text-yellow-300 transition">Profil Developer</a>
        <a href="#contact" class="hover:text-yellow-300 transition">Contact</a>
      </div>

      <!-- Social Media Links -->
      <div class="mt-6 md:mt-0 flex gap-4">
        <a href="https://facebook.com" target="_blank" class="hover:text-yellow-300 transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M22.676 0h-21.352c-.731 0-1.324.592-1.324 1.323v21.353c0 .731.593 1.324 1.324 1.324h11.506v-9.294h-3.128v-3.623h3.128v-2.672c0-3.1 1.892-4.788 4.657-4.788 1.325 0 2.465.099 2.797.143v3.243h-1.917c-1.503 0-1.794.715-1.794 1.763v2.311h3.589l-.467 3.623h-3.122v9.293h6.117c.731 0 1.324-.593 1.324-1.324v-21.352c0-.731-.593-1.324-1.324-1.324z"/>
          </svg>
        </a>
        <a href="https://twitter.com" target="_blank" class="hover:text-yellow-300 transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-2.72 0-4.92 2.2-4.92 4.917 0 .385.043.76.127 1.122-4.09-.205-7.719-2.166-10.141-5.144-.424.728-.667 1.573-.667 2.476 0 1.71.87 3.214 2.188 4.099-.807-.026-1.566-.247-2.229-.616-.001.021-.001.042-.001.063 0 2.388 1.699 4.384 3.953 4.836-.414.113-.851.173-1.302.173-.317 0-.626-.031-.927-.088.626 1.956 2.444 3.38 4.6 3.421-1.685 1.32-3.809 2.107-6.115 2.107-.397 0-.788-.023-1.175-.067 2.179 1.396 4.768 2.212 7.548 2.212 9.051 0 14-7.496 14-13.986 0-.214-.005-.426-.014-.637.961-.695 1.796-1.562 2.457-2.549z"/>
          </svg>
        </a>
        <a href="https://instagram.com" target="_blank" class="hover:text-yellow-300 transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M7.75 2h8.5c3.02 0 5.25 2.229 5.25 5.25v8.5c0 3.02-2.229 5.25-5.25 5.25h-8.5c-3.021 0-5.25-2.229-5.25-5.25v-8.5c0-3.021 2.229-5.25 5.25-5.25zm0 2c-1.773 0-3.25 1.477-3.25 3.25v8.5c0 1.773 1.477 3.25 3.25 3.25h8.5c1.773 0 3.25-1.477 3.25-3.25v-8.5c0-1.773-1.477-3.25-3.25-3.25h-8.5zm6.15 3h1.7v1.7h-1.7v-1.7zm-3.9 1.7c2.347 0 4.25 1.903 4.25 4.25s-1.903 4.25-4.25 4.25-4.25-1.903-4.25-4.25 1.903-4.25 4.25-4.25zm0 2c-1.241 0-2.25 1.009-2.25 2.25s1.009 2.25 2.25 2.25 2.25-1.009 2.25-2.25-1.009-2.25-2.25-2.25z"/>
          </svg>
        </a>
      </div>
    </div>
    <div class="text-center mt-8 text-sm text-gray-200">
      &copy; 2024 SeruBelajar.id. Semua Hak Dilindungi.
    </div>
  </div>
</footer>



  <script>
    // JavaScript for hamburger menu toggle
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    menuBtn.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });
  </script>
</body>
</html>
