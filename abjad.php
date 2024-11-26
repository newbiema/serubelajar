<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Membaca Dasar - A sampai Z</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nunito:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        h1 {
            font-family: 'Fredoka One', cursive;
        }
        .letter-box {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: linear-gradient(to bottom right, #cfe0f3, #aacbff);
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            gap: 15px;
        }
        .letter-box img {
            width: 80px;
            height: 80px;
        }
        .letter-box h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #4A90E2;
        }
        .letter-box p {
            font-size: 1.2rem;
            color: #555555;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-yellow-200 to-pink-200 min-h-screen flex flex-col items-center p-5">

    <!-- Tambahkan Elemen Audio untuk memutar musik otomatis -->
    <audio autoplay loop>
        <source src="audio/Lagu abc Lagu anak Lagu anak Indonesia.mp3" type="audio/mp3">
        Your browser does not support the audio element.
    </audio>

    <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-3xl text-center">
        <h1 class="text-4xl text-pink-600 font-bold mb-6">Belajar Membaca Dasar</h1>
        <p class="text-gray-700 mb-4">Ayo belajar membaca semua huruf dari A sampai Z dengan gambar yang lucu!</p>

        <!-- Content Section -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <!-- Loop for Each Letter -->
            <?php
            $dataHuruf = [
                ['A', 'img/abjad/apel.png', 'Apel'],
                ['B', 'img/abjad/bola.png', 'Bola'],
                ['C', 'img/abjad/ceri.png', 'Ceri'],
                ['D', 'img/abjad/domba.png', 'Domba'],
                ['E', 'img/abjad/elang.png', 'Elang'],
                ['F', 'img/abjad/fanta.png', 'Fanta'],
                ['G', 'img/abjad/gitar.png', 'Gitar'],
                ['H', 'img/abjad/harimau.png', 'Harimau'],
                ['I', 'img/abjad/ikan.png', 'Ikan'],
                ['J', 'img/abjad/jambu.png', 'Jambu'],
                ['K', 'img/abjad/kuda.png', 'Kuda'],
                ['L', 'img/abjad/lemur.png', 'Lemur'],
                ['M', 'img/abjad/mangga.png', 'Mangga'],
                ['N', 'img/abjad/nanas.png', 'Nanas'],
                ['O', 'img/abjad/jeruk.png', 'Jeruk'],
                ['P', 'img/abjad/pisang.png', 'Pisang'],
                ['Q', 'img/abjad/queen.png', 'Ratu'],
                ['R', 'img/abjad/rusa.png', 'Rusa'],
                ['S', 'img/abjad/singa.png', 'Singa'],
                ['T', 'img/abjad/tikus.png', 'Tikus'],
                ['U', 'img/abjad/uang.png', 'Uang'],
                ['V', 'img/abjad/vas.png', 'Vas'],
                ['W', 'img/abjad/walrus.png', 'Walrus'],
                ['X', 'img/abjad/xylophone.png', 'Xylophone'],
                ['Y', 'img/abjad/yoyo.png', 'Yoyo'],
                ['Z', 'img/abjad/zebra.png', 'Zebra']
            ];

            foreach ($dataHuruf as $item) {
                echo '<div class="letter-box">';
                echo '<div class="flex items-center">';
                echo '<img src="' . $item[1] . '" alt="Gambar ' . $item[2] . '">';
                echo '<div>';
                echo '<h2>' . $item[0] . '</h2>';
                echo '<p>' . $item[0] . ' untuk ' . $item[2] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>

                <!-- Tombol Back ke Homepage -->
                <div class="mt-6 text-center">
            <a href="homepage.php" class="text-green-600 hover:text-green-800 font-bold text-lg underline transition duration-200 ease-in-out">
                ← Kembali ke Homepage
            </a>
        </div>

        <!-- Footer -->
        <div class="mt-6">
            <p class="text-xs text-gray-500">© 2024 AyoBelajar.id</p>
        </div>
    </div>

</body>
</html>
