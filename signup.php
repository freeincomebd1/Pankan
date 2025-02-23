<?php
session_start();
$conn = new mysqli('102.infinityfree.com', 'if0_38356551', 'x5AdReNBSY', 'if0_38356551_onikhasan); // Database credentials

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $email);
    $stmt->execute();
    header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>সাইনআপ</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>সাইনআপ করুন</h1>
    </header>
    <main>
        <form method="POST">
            <input type="text" name="username" placeholder="ব্যবহারকারীর নাম" required>
            <input type="password" name="password" placeholder="পাসওয়ার্ড" required>
            <input type="email" name="email" placeholder="ইমেইল" required>
            <button type="submit">সাইনআপ</button>
        </form>
    </main>
</body>
</html>