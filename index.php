<?php
  session_start();
  require "php/db_con.php";
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
      <div class="row">
        <div class="col"><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addstuden"><i class="bi-plus"></i></button></div>
        <div class="col"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editstuden"><i class="bi-brush"></i></button></div>
        <div class="col">
          <div id="inputgroup" class="input-group my-2" style="width: 200px; display: none;">
            <input id="searchbar" class="form-control" type="search" placeholder="Tìm kiếm..." style="width: 80%;"  oninput="classsearch()">
          <!-- <span id="search-bt" class="input-group-text btn sreach_name_btn bg-light"><i class="bi-search"></i></span> -->
          </div>
        </div>  
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
  <div class="modal fade" id="addstuden" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm sinh viên</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label class="form-label">Họ Tên</label>
                <input id="svname" type="text" class="form-control" placeholder="Tên sinh viên">
                <label id="svwarn" class="form-label" style="display: none;"></label>
            </div>
            <div class="mb-3">
                <label class="form-label">Ngày vào đoàn</label>
                <input type="date" class="form-control" id="svdayin">
            </div>
            <div class="mb-3">
                <label class="form-label">Lớp:</label>
                <select id="msclass" class="form-select">
                  <?php
                    $sql="SELECT * FROM class";
                    $class=mysqli_query($conn,$sql);
                    // var_dump($class);
                    foreach($class as $row){
                      echo "<option value=".$row['MaL'].">".$row['TenL']."</option>";
                    }
                  ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Khu vực:</label>
                <select id="address" class="form-select">
                  <?php
                    $sql="SELECT * FROM address";
                    $address=mysqli_query($conn,$sql);
                    foreach($address as $row){
                      echo "<option value=".$row['MaAD'].">".$row['TenAD']."</option>";
                    }
                  ?>
                </select>
            </div>
            <button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick="addsv()">Thêm</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="editstuden" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Chỉnh sữa sinh viên</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label class="form-label">Mã sinh viên</label>
                <select id="id" class="form-select">
                  <option selected="selected" value=""></option>
                  <?php
                    $sql="SELECT MSSV FROM studens";
                    $class=mysqli_query($conn,$sql);
                    // var_dump($class);
                    foreach($class as $row){
                      echo "<option value=".$row['MSSV'].">".$row['MSSV']."</option>";
                    }
                  ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Họ Tên</label>
                <input id="esvname" type="text" class="form-control" placeholder="Tên sinh viên">
                <label id="esvwarn" class="form-label" style="display: none;"></label>
            </div>
            <div class="mb-3">
                <label class="form-label">Ngày vào đoàn</label>
                <input type="date" class="form-control" id="esvdayin">
            </div>
            <div class="mb-3">
                <label class="form-label">Lớp:</label>
                <select id="emsclass" class="form-select">
                  <option selected="selected" value=""></option>
                  <?php
                    $sql="SELECT * FROM class";
                    $class=mysqli_query($conn,$sql);
                    // var_dump($class);
                    foreach($class as $row){
                      echo "<option value=".$row['MaL'].">".$row['TenL']."</option>";
                    }
                  ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Khu vực:</label>
                <select id="eaddress" class="form-select">
                  <option selected="selected" value=""></option>
                  <?php
                    $sql="SELECT * FROM address";
                    $address=mysqli_query($conn,$sql);
                    foreach($address as $row){
                      echo "<option value=".$row['MaAD'].">".$row['TenAD']."</option>";
                    }
                  ?>
                </select>
            </div>
            <button type="button" class="btn btn-warning" data-bs-dismiss="modal" onclick="editsv()">Sữa</button>
        </div>
      </div>
    </div>
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
    function addsv(){
      var svname=document.getElementById("svname");
      var warn=document.getElementById("svwarn");
      if(name.value=""){
        warn.style.display="block";
        warn.innerHTML="Tên không được để trống!";
        warn.style.color="red";
        name.focus();
        return;
      }
      var day=document.getElementById("svdayin");
      var msclass=document.getElementById("msclass");
      var address=document.getElementById("address");
      
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("datahere").innerHTML = this.responseText;
            document.getElementById("inputgroup").style.display="block";
          }
      };
      var string="svname="+svname.value+"&svdayin="+day.value+"&class="+msclass.value+"&address="+address.value;
      // console.log(string);
      xmlhttp.open("GET","./php/class.php?"+string,true);
      xmlhttp.send();
    };
    function editsv(){
      var id=document.getElementById("id");
      var svname=document.getElementById("esvname");
      var warn=document.getElementById("esvwarn");
      if(name.value=""){
        warn.style.display="block";
        warn.innerHTML="Tên không được để trống!";
        warn.style.color="red";
        name.focus();
        return;
      }
      var day=document.getElementById("esvdayin");
      var msclass=document.getElementById("emsclass");
      var address=document.getElementById("eaddress");
      
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("datahere").innerHTML = this.responseText;
            document.getElementById("inputgroup").style.display="block";
          }
      };
      var string="id="+id.value+"&svname="+svname.value+"&svdayin="+day.value+"&class="+msclass.value+"&address="+address.value;
      // console.log(string);
      xmlhttp.open("GET","./php/class.php?"+string,true);
      xmlhttp.send();
    };
  </script>
</body>
</html>