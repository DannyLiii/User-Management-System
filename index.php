<?php
    session_start();
    // print_r($_SESSION);

    if (isset($_SESSION["user_id"])){
        $mysqli = require __DIR__ . "/database.php";

        $sql = "SELECT * FROM user where id = {$_SESSION["user_id"]}";

        $result = $mysqli->query($sql);

        $user = $result->fetch_assoc();
    }
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>主頁</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
</head>
<body>
    <div>
        <h1>主頁</h1>
        <!-- isset()檢查是否設置了需要的變數-->
        <?php if (isset($user)): ?>
            <p>您好, <?= htmlspecialchars($user["name"]) ?></p>
            <p><a href="logout.php">登出</a></p>
        <?php else: ?>
            <p><a href="login.php">登入</a>或<a href="signup.html">註冊</a></p>
        <?php endif; ?>
    </div>
</body>

</html>