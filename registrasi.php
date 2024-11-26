<?php
include 'services/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validasi input
    if ($password !== $confirm_password) {
        echo "<script>alert('Password dan konfirmasi password tidak cocok!');</script>";
    } else {
        // Hashing password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Simpan data ke database
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hashed_password);

        if ($stmt->execute()) {
            echo "<script>alert('Registrasi berhasil! Silakan login.');</script>";
                        // Redirect ke homepage.php dengan query string
                        header("Location: index.php");
                        exit();

        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }
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
  <title>Register</title>
</head>
<body class="h-screen flex justify-center items-center bg-gradient-to-br from-yellow-300 via-orange-300 to-pink-300">
<div class="relative py-3 sm:max-w-xs sm:mx-auto">
  <div class="min-h-96 px-8 py-6 mt-4 text-left bg-white rounded-xl shadow-lg">
    <div class="flex flex-col justify-center items-center h-full select-none">
      <div class="flex flex-col items-center justify-center gap-2 mb-8">
        <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center text-white text-2xl font-bold">🌟</div>
        <p class="m-0 text-[18px] font-bold text-green-700">Daftar Sekarang!</p>
        <span class="m-0 text-xs max-w-[90%] text-center text-gray-500">
          Bergabunglah dan mulailah petualangan baru bersama kami!
        </span>
      </div>
      <form method="POST" class="w-full flex flex-col gap-4">
        <div class="w-full flex flex-col gap-2">
          <label class="font-semibold text-sm text-gray-700">Username</label>
          <input
            name="username"
            type="text"
            placeholder="Masukkan username"
            required
            class="border rounded-lg px-3 py-2 text-gray-700 text-sm w-full outline-none focus:ring-2 focus:ring-green-300"
          />
        </div>
        <div class="w-full flex flex-col gap-2">
          <label class="font-semibold text-sm text-gray-700">Password</label>
          <input
            name="password"
            type="password"
            placeholder="••••••••"
            required
            class="border rounded-lg px-3 py-2 text-gray-700 text-sm w-full outline-none focus:ring-2 focus:ring-green-300"
          />
        </div>
        <div class="w-full flex flex-col gap-2">
          <label class="font-semibold text-sm text-gray-700">Konfirmasi Password</label>
          <input
            name="confirm_password"
            type="password"
            placeholder="••••••••"
            required
            class="border rounded-lg px-3 py-2 text-gray-700 text-sm w-full outline-none focus:ring-2 focus:ring-green-300"
          />
        </div>
        <div>
          <button
            type="submit"
            class="py-2 px-8 bg-green-500 hover:bg-green-600 focus:ring-offset-green-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg cursor-pointer select-none"
          >
            Register
          </button>
          <div class="text-gray-700 mt-4 text-sm flex justify-between items-center">
            <p>Sudah punya akun?</p>
            <a class="underline font-bold text-green-500 hover:text-green-700" href="index.php">Login di sini</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
