<?php
session_start();
$conn = new mysqli('sql102.infinityfree.com', 'if0_38356551', 'x5AdReNBSY', 'if0_38356551_onikhasan); // Database credentials

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM users WHERE id=?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>ড্যাশবোর্ড</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>ড্যাশবোর্ড</h1>
        <p>স্বাগতম, <?php echo $user['username']; ?>!</p>
    </header>
    <main>
        <button onclick="location.href='view_ads.php'">এডস দেখুন</button>
        <button onclick="location.href='balance.php'">আপনার ব্যালেন্স</button>
        <button onclick="location.href='referrals.php'">আপনার রেফারেলস</button>
    </main>
</body>
</html>