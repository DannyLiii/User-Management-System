<?php
// ------------------------------------- 輸入值設定 ------------------------------------- //

    $psw = $_POST["password"];
    $psw_c = $_POST["password_confirmation"];

    //name
    if(empty($_POST["name"])){
        echo "<script>alert('請輸入有效的名字');</script>";
        echo "<script>history.go(-1);</script>";
        exit();
    }
    //email
    if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        echo "<script>alert('請輸入有效的信箱');</script>";
        echo "<script>history.go(-1);</script>";
        exit();
    }
    //password
    if(strlen($psw) < 8 ){
        echo "<script>alert('請輸入有效的密碼');</script>";
        echo "<script>history.go(-1);</script>";
        exit();
    }
    //密碼是否含英文
    if(!preg_match("/[a-z]/i",$psw)){
        echo "<script>alert('密碼不符合')</script>";
        echo "<script>history.go(-1);</script>";
        exit();
    }
    //密碼是否含數字
    if(!preg_match("/[0-9]/i",$psw)){
        echo "<script>alert('密碼不符合')</script>";
        echo "<script>history.go(-1);</script>";
        exit();
    }
    //密碼是否相符
    if($psw !== $psw_c){
        echo "<script>alert('密碼不相符')</script>";
        echo "<script>history.go(-1);</script>";
        exit();
    }

    // 儲存 $password_hash 到資料庫或其他安全的地方
    $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
    // $password_hash = password_hash($psw_c);

    //導入$mysqli物件到"database.php"裡
    $mysqli = require __DIR__ . "/database.php";

    //清除原始密碼變數
    // unset($_POST["password"]);
    // unset($_POST["password_confirmation"]);
    print_r($_POST); 
    var_dump($password_hash);


// ------------------------------------- 資料庫設定 ------------------------------------- //

    //指定資料名稱，不然hash會占用一個新欄位
    $sql = "INSERT INTO user (name, email, password_hash)values(?,?,?)";

    $stmt = $mysqli->stmt_init();

    //如欲錯誤會立即停止腳本並顯示，prepare()為預備的sql指令
    if( ! $stmt->prepare($sql)){
        die("SQL error: " . $mysqli->error);
    }
    //s表示為字串型參數，三個s為三個字串型參數
    $stmt->bind_param("sss", $_POST["name"],$_POST["email"],$password_hash);
    //execute()為使用預報好的指令，需先確認prepare已綁定好
    if($stmt->execute()){
        header("location: signup_success.html");
        exit();
    }else{
        if ($mysqli->errno === 1062){
            die("信箱已存在");
            exit();
        }else{
            die($mysql->error . " " . $mysqli->errno);
            exit();
        }
    };

    

?>