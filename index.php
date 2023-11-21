<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>21022010-Lê Nguyễn Quang Bình</title>
    <link rel="icon" href="http://elearning.vlute.edu.vn/pluginfile.php/164167/user/icon/klass/f1?rev=1572491">

  <link rel="stylesheet" href="css/bootstrap.css">
  <script src="js/bootstrap.bundle.js"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container">
      <img src="http://elearning.vlute.edu.vn/pluginfile.php/164167/user/icon/klass/f1?rev=1572491" style="height: 50px;width: 50px;border-radius: 100%;">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#headerbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse flex-row-reverse" id="headerbar">
        <ul class="navbar-nav">
          <li class="nav-item mx-1">
            <button id="abme" type="button" class="btn nav-link"><i class="bi-people"></i> Về tôi</button>
          </li>
          <li class="nav-item mx-1">
            <button id="classlist" type="button" class="btn nav-link"><i class="bi-list"></i> Danh sách lớp</button>
          </li>
          <li class="nav-item dropdown ms-1">
            <?php
              if(isset($_SESSION['username'])){
                echo '<button type="button" class="btn nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"><i class="bi-box-arrow-in-right"></i> '.$_SESSION['username'].'</button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./php/logout.php">Đăng xuất</a></li>
                  </ul>';
              }else{
                echo '<button type="button" class="btn nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"><i class="bi-box-arrow-in-right"></i> Tài khoản</button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#loginmodal">Đăng nhập</a></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#registermodal">Đăng ký</a></li>
                      </ul>';
              }
            ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <?php
  if(!isset($_SESSION['username'])){
    echo '<div class="modal fade" id="loginmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Đăng nhập</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="./php/login.php" method="post">
            <div class="mb-3">
                <label class="form-label">Tài khoản:</label>
                <input type="text" class="form-control" name="uname" placeholder="Nhập tài khoản">
            </div>
            <div class="mb-3">
                <label class="form-label">Mật khẩu:</label>
                <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu">
            </div>
            <button type="submit" class="btn btn-primary">Đăng nhập</button>
            </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="registermodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Đăng ký</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="./php/register.php" method="post" onsubmit="return submitcheck()">
            <div class="mb-3">
                <label class="form-label">Tài khoản:</label>
                <input id="user" type="text" class="form-control" name="uname" placeholder="Nhập tài khoản" onfocusout="unamecheck()">
                <label id="userwarn" class="form-label" style="display: none;"></label>
            </div>
            <div class="mb-3">
                <label class="form-label">Mật khẩu:</label>
                <input id="pwd" type="password" class="form-control" name="password" placeholder="Nhập mật khẩu" onfocusout="pwdcheck()">
                <label id="pwdwarn" class="form-label" style="display: none;"></label>
            </div>
            <button type="submit" class="btn btn-primary">Đăng ký</button>
            </form>
        </div>
      </div>
    </div>
  </div>';
  }
  ?>
  <div class="container mt-3">
    <dir class="card bg-light px-3 mt-5">
      <div id="inputgroup" class="input-group my-2" style="width: 200px; display: none;">
          <input id="searchbar" class="form-control" type="search" placeholder="Tìm kiếm..." style="width: 100%;"  oninput="classsearch()">
          <!-- <span id="search-bt" class="input-group-text btn sreach_name_btn bg-light"><i class="bi-search"></i></span> -->
      </div>
      <div id="datahere">
        <h1>Xin chào <?php
          if(isset($_SESSION['username']))
            echo $_SESSION['username'];
        ?>
        đã đến trang web của tôi!</h1>
      </div>
    </dir>
  </div>
  <script>
    <?php
      if(isset($_GET['error']))
          echo 'alert("'.$_GET['error'].'");';
    ?>
    function submitcheck(){
      if(!unamecheck()||!pwdcheck()){
        return false;
      }
    };
    function unamecheck(){
      var user=document.getElementById("user");
      var warn=document.getElementById("userwarn");
      if(user.value==""){
        warn.style.display="block";
        warn.innerHTML="Tài khoản không được để trống!";
        warn.style.color="red";
        user.focus();
      }else if(user.value.length < 6){
        warn.style.display="block";
        warn.innerHTML="Tài khoản phải trên 6 ký tự!";
        warn.style.color="red";
        user.focus();
      }else{
        warn.style.display="none";
        return true;
      }
    };
    function pwdcheck(){
      var pwd=document.getElementById("pwd");
      var warn=document.getElementById("pwdwarn");
      
      if(pwd.value==""){
        warn.style.display="block";
        warn.innerHTML="Mật khẩu không được để trống!";
        warn.style.color="red";
        pwd.focus();
      }else if(pwd.value.length < 8){
        warn.style.display="block";
        warn.innerHTML="Mật khẩu phải trên 8 ký tự!";
        warn.style.color="red";
        pwd.focus();
      }else{
        warn.style.display="none";
        return true;
      }
    }
    document.getElementById('classlist').addEventListener('click',function(){
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("datahere").innerHTML = this.responseText;
            document.getElementById("inputgroup").style.display="block";
          }
      };
      xmlhttp.open("GET","./php/class.php",true);
      xmlhttp.send();
    });
    function classsearch(){
      var search=document.getElementById("searchbar").value;
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("datahere").innerHTML = this.responseText;
          }
      };
      xmlhttp.open("GET","./php/class.php?search="+search,true);
      xmlhttp.send();
    };
    document.getElementById('abme').addEventListener('click',function(){
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("datahere").innerHTML = this.responseText;
            document.getElementById("inputgroup").style.display="none";
          }
      };
      xmlhttp.open("GET","./php/aboutme.php",true);
      xmlhttp.send();
    });
  </script>
</body>
</html>