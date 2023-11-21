<?php
    session_start();
    include "db_con.php";
    if(isset($_POST['uname']) && isset($_POST['password'])) {

        function validate($data) {
            $data = trim($data);
            $data = stripslashes ($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if(strlen($pass)<8){
        header("Location: ../?error=Mật khẩu quá ngắn!");
        exit();
    }
    if(strlen($uname)<6){
        header("Location: ../?error=Tài khoản quá ngắn!");
        exit();
    }
    $sql = "SELECT * FROM users WHERE username='$uname'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)==1){
      header("Location: ../?error=Trùng tài khoản!");
      exit();
    }
    $pass=md5($pass);
    $sql="INSERT INTO users (username,password) VALUES ('$uname', '$pass')";
    mysqli_query($conn, $sql);
    $_SESSION['username']=$uname;
    header("Location: ../");
    exit();
?>