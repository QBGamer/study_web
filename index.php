<?php
  //Nếu có tương tác với sql thì phải có yêu cầu cơ sở dữ liệu!
  require "./php/db_con.php";

  //if dưới đây là xữ lý thêm dữ liệu vào bản dulieu
  //isset là kiểm tra có tồn tại hay không
  if(isset($_POST['id'])){
    $id=$_POST['id'];
    $name=$_POST['stname'];
    
    //tách file ra thành 2 phần bởi dấu "."
    //vd toilopkhmt.kmt thì sẽ được 2 phần là "toilopkhmt" và "kmt"
    $temp= explode(".", $_FILES["img"]["name"]);
    
    //ghép tên ảnh với hàm date('dmYHis')[lấy ra ngày tháng năm kiểu số]
    //ghép với ký tự ".", còn end($temp) là lấy thành phần cuối của $temp giống kmt ở vd trên
    $img=date('dmYHis').'.'.end($temp);
    //lấy đường dẫn ảnh đang lưu tạm trên server
    $img_loc=$_FILES['img']['tmp_name'];
    //đường dẫn thư mục cần lưu file vào
    $save="./img/";
    //chuyển ảnh từ chỗ lưu tạm vào thư mục source code
    move_uploaded_file($img_loc,$save.$img);

    //thêm dữ liệu vào sql(nhớ phải lưu cả tên file để lát lấy ra đc)
    $sql="INSERT INTO dulieu value ($id,'$name','$img')";
    mysqli_query($conn,$sql);
  }
  // echo date("Y m d h:i:s");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>21022010-Lê Nguyễn Quang Bình</title>
  <link rel="icon" href="http://elearning.vlute.edu.vn/pluginfile.php/164167/user/icon/klass/f1?rev=1572491">

  <link rel="stylesheet" href="./css/style.css">

</head>
<body>
<div style="display: flex;justify-content: center;">
  <!-- để action không có nghĩa là gọi đến cùng file này để xữ lý 
  để upload đc file phải có enctype="multipart/form-data" 
  onsubmit="return check()" là khi bấm nút submit nó sẽ ktra trước nếu return true trong hàm javascript tên check() thì mới submit đc-->
  <form action method="post" enctype="multipart/form-data" onsubmit="return check()">
    <!-- để xữ lý submit phải có name="cái gì đó" thì submit gọi xữ lý mới đc oninput là mỗi lần nhập
    nó sẽ chạy hàm ktra javascript bên dưới -->
    <input id="id" style="margin-top: 10px;" type="number" placeholder="(✿◡‿◡)" name="id" oninput="ktra(this)" ><br>
    <input id="name" style="margin-top: 10px;" type="text" placeholder="(╬▔皿▔)╯" name="stname"><br>
    <!-- thông báo bị ẩn nếu lát gọi onsubmit mà ko đạt tui cho hiện hồn thằng này lên để thông báo -->
    <div id="warn" style="color: red;display:none;">Không để trống chỗ này!</div>
    <!-- cục này để upload file lên nè accept="image/*" là chỉ nhận file là ảnh
    nếu đề yêu cần nhận file .png thì accept="image/png" -->
    <input style="margin-top: 10px;" type="file" name="img" accept="image/*"><br>
    <!-- nút submit mặc định bị ẩn nếu thằng input đầu tiên không đủ 8 ký tự trong hàm ktra(this) -->
    <button style="margin-top: 10px;" type="submit" id="button" disabled>Button here...(*￣０￣)ノ</button>
  </form>
  <dir style="display: block;">
    Ảnh vừa đăng lên
    <br><img style="height: 100px;width: 100px;border: 1px solid;border-radius: 5%;" src="<?php if(isset($save)){ echo "$save$img";}else echo 'https://fakeimg.pl/100x100/';?>">
  </dir>
</div>


<div style="display: flex;justify-content: center;">
      <input id="mssv" type="text" placeholder="mssv" style="margin-right: 10px;">
      <input id="hten" type="text" placeholder="họ tên" style="margin-right: 10px;">
      <!-- lựa chọn khoa đã tồn tại trong sql -->
      <select id="makhoa" style="margin-right: 10px;">
      <!-- tìm tất cả các khoa vức vào option(lựa chọn) mặc định chọn cái đầu tiên -->
        <?php
          $sql="SELECT * FROM khoa";
          $result=mysqli_query($conn,$sql);
          foreach($result as $row){
            //
            echo '<option value="'.$row['id'].'">'.$row['tenkhoa'].'</option>';
          }
        ?>
      </select>
      <button id="btn-them-sv" type="button">Thêm sinh viên</button>
      <div id="warnthemsv" style="display:none;color: red;">Lỗi!</div>
</div>


<div style="display: flex;justify-content: center;">
  <table id="datahere">
  </table>
</div>
<script>
  //hàm ktra nếu chính xác 8 ký tự thì hiện hồn button nếu không
  //thì cook nha!
  function ktra(e){
    var input=e.value;
    console.log(input);
    if(input.length==8){
      document.getElementById("button").disabled=false;
    }else{
      document.getElementById("button").disabled=true;
    }
  }
  //ajax button khi thêm sinh viên rồi sẽ load dữ liệu từ file themhs.php ra
  document.getElementById("btn-them-sv").addEventListener("click",function(){
    var mssv=document.getElementById("mssv");
    var hten=document.getElementById("hten");
    var khoa=document.getElementById("makhoa");
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("datahere").innerHTML =this.responseText;
      }
    };
    var stringthis="?mssv="+mssv.value+"&hten="+hten.value+"&khoa="+khoa.value;
    xhttp.open("GET", "./php/themhs.php"+stringthis);
    xhttp.send();
  })
  //ajax load dữ liệu từ file themhs.php ra
  //cùng file nhưng không quăng dữ liệu như thằng trên nên nó sẽ chỉ quăng ra
  window.onload=function(){
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("datahere").innerHTML =this.responseText;
      }
    };
    xhttp.open("GET", "./php/themhs.php");
    xhttp.send();
  }
</script>
</body>
</html>