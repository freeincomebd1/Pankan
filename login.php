<?php
session_start();
$conn = new mysqli('sql102.infinityfree.com', 'if0_38356551', 'x5AdReNBSY', 'if0_38356551_onikhasan); // Database credentials

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: dashboard.php");
        }
    }
}

?>
<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>লগইন</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>লগইন করুন</h1>
    </header>
    <main>
        <form method="POST">
            <input type="text" name="username" placeholder="ব্যবহারকারীর নাম" required>
            <input type="password" name="password" placeholder="পাসওয়ার্ড" required>
            <button type="submit">লগইন</button>
        </form>
    </main>
</body>
</html>