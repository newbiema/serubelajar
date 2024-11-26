<?php
include 'services/db.php';

// Handle login request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query menggunakan prepared statement untuk keamanan
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Mulai sesi
            session_start();
            $_SESSION['username'] = $user['username'];

            // Redirect ke homepage.php dengan query string
            header("Location: home.php?welcome=1");
            exit();
        } else {
            echo "<script>alert('Invalid password.');</script>";
        }
    } else {
        echo "<script>alert('User not found.');</script>";
    }
}
?>


<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@400;700&display=swap" rel="stylesheet">
  <title>Login</title>
</head>
<body class="h-screen flex justify-center items-center bg-gradient-to-br from-pink-300 via-purple-300 to-blue-300">
<div class="relative py-3 sm:max-w-xs sm:mx-auto">
  <div class="min-h-96 px-8 py-6 mt-4 text-left bg-white rounded-xl shadow-lg">
    <div class="flex flex-col justify-center items-center h-full select-none">
      <div class="flex flex-col items-center justify-center gap-2 mb-8">
        <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white text-2xl font-bold">😊</div>
        <p class="m-0 text-[18px] font-bold text-blue-700">Selamat Datang!</p>
        <span class="m-0 text-xs max-w-[90%] text-center text-gray-500">Ayo belajar sambil bermain di SeruBelajar.id!</span>
      </div>
      <form method="POST" class="w-full flex flex-col gap-4">
        <div class="w-full flex flex-col gap-2">
          <label class="font-semibold text-sm text-gray-700">Username</label>
          <input
            name="username"
            type="text"
            placeholder="Masukkan username"
            required
            class="border rounded-lg px-3 py-2 text-gray-700 text-sm w-full outline-none focus:ring-2 focus:ring-blue-300"
          />
        </div>
        <div class="w-full flex flex-col gap-2">
          <label class="font-semibold text-sm text-gray-700">Password</label>
          <input
            name="password"
            type="password"
            placeholder="••••••••"
            required
            class="border rounded-lg px-3 py-2 text-gray-700 text-sm w-full outline-none focus:ring-2 focus:ring-blue-300"
          />
        </div>
        <div>
          <button
            type="submit"
            class="py-2 px-8 bg-blue-500 hover:bg-blue-600 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg cursor-pointer select-none"
          >
            Login
          </button>
          <div class="text-gray-700 mt-4 text-sm flex justify-between items-center">
            <p>Belum punya akun?</p>
            <a class="underline font-bold text-blue-500 hover:text-blue-700" href="registrasi.php">Daftar Sekarang</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>

