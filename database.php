<?php
    // session_start();
    //資料庫連線
    $db_hostname="localhost"; 
	$db_username="root"; 
	$db_password="80322329"; 
    $db_database="login_db";

    // if(!($dblink=mysqli_connect($db_hostname,$db_username,$db_password))){ 
	// 	// echo("mysql connect false"); 
	// 	exit(); 
	// }
	// // myquery("SET NAMES 'UTF8'");
	// if (!mysqli_select_db($dblink,$db_database)){ 
	// 	// echo("select database false"); 
	// 	exit(); 
	// }

    //	連接需要的資料庫，並回傳結果，失敗時會報錯
	// function myquery($sql=null){
	// 	global $dblink;
	// 	$res = mysqli_query($dblink,$sql);
	// 	//$res = mysqli_query($dblink,$sql)or die($sql."<br /><br />".mysqli_error());
	// 	return $res;
	// }
	
	// //回傳結果的行數，查看數據有幾列之類的
	// function mysql_num_rows($result=null){
	// 	$res = mysqli_num_rows($result);
	// 	return $res;
	// }

	// //回傳關聯數組，較為常用
	// function mysql_fetch_assoc($result=null){
	// 	$res = mysqli_fetch_assoc($result);
	// 	return $res;
	// }

	// //插入自動增值的ID
	// function mysql_insert_id(){
	// 	global $dblink;
	// 	$res = mysqli_insert_id($dblink);
	// 	return $res;
	// }

	// //關閉mysql通道
	// function mysql_close($link=null){
	// 	mysqli_free_result($link);
	// 	mysqli_close($link);
	// }

	// //較適合單一項擷取需要得到的數據
	// function mysql_fetch_row($result=null){
	// 	$res = mysqli_fetch_row($result);
	// 	return $res;
	// }
	// include_once("phperror.php"); //引入發生錯誤時的狀態顯示
	// $cms_webBaseName = basename($_SERVER['PHP_SELF']); //
	// //$jellydev = ($_SERVER['REMOTE_ADDR'] == "220.135.49.66" or $_SERVER['REMOTE_ADDR'] == "192.168.1.3" or $_SERVER['REMOTE_ADDR'] == "127.0.0.1" or $_COOKIE['admin_admId'] == "jellyalex978")?true:false;
	// $run_t0 = microtime(true); //微秒



    // -------------------------------- 原 -------------------------------- //
    $mysqli = new mysqli($db_hostname, $db_username, $db_password, $db_database);

    if ($mysqli->connect_errno){
     die("Connction error: " . $mysqli->connect_error);
    }
    
    return $mysqli;

?>