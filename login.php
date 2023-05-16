<?php
    //顯示無效的變數
    $is_invalid = false;
    $email = ""; // 儲存原始電子郵件


    //檢查請求方法是否為"POST"
    if($_SERVER["REQUEST_METHOD"] === "POST"){

        //檢查導入到database.php裡面的物件是否為正確，在這邊是電子郵件與密碼
        $mysqli = require __DIR__ . "/database.php";

        //將$_POST["email"]的值代入到sprintf()裡面，最終等於$sql
        //real_escape_string()防止攻擊用法，
        $sql = sprintf(
            "SELECT * FROM user where email = '%s'",
            $mysqli->real_escape_string($_POST["email"])
        );

        //使用query()查詢語句並代入到變數$result，query()只適用於查詢，
        $result = $mysqli->query($sql);

        //回傳到資料庫並找到fetch_assoc()也就是尋找email的語句並代入至$user
        $user = $result->fetch_assoc();

        // var_dump($user);
        // exit();

        //驗證登入選項
        if($user){
            if(password_verify($_POST["password"], $user["password_hash"])){
                // die("登入成功");    
                
                //跨頁面請求
                session_start();

                //保護代碼不受固定攻，重新生成ID
                session_regenerate_id();

                $_SESSION["user_id"] = $user["id"];

                header("location: index.php");
                exit;

            }
            else{
                echo '<script>alert("登入失敗，請檢查密碼是否輸入錯誤");</script>';
                
            }
        }
        $is_invalid = true;
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title>登入</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
</head>
<body>
    <h1>登入</h1>

    <form method="post">

        <label for="email" >信箱:</label>
        <input type="email" name="email" id="email" value="<?php echo $email;?>">

        <label for="">密碼:</label>
        <input type="password" name="password" id="password">

        <button>登入</button>
        
        <?php if($is_invalid):?>
            <em style="font-size:14px;color:gray;">查無此信箱</em>
        <?php endif; ?>
    </form>
</body>
</html>

