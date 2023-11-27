<?php
  //có sql thì phải yêu cầu kết nối sql
  require "db_con.php";
  //nếu có dữ liệu đầu vào và khác "" thì chạy if
  if(isset($_GET["mssv"])&&$_GET["mssv"]!=""&&$_GET["hten"]){
    $mssv=$_GET['mssv'];
    $hten=$_GET['hten'];
    $makhoa=$_GET['khoa'];
    //nhập dữ liệu vào sql
    $sql="INSERT INTO studen value ('$mssv','$hten','$makhoa')";
    mysqli_query($conn,$sql);
  }
  //lấy ra dữ liệu studen và tên khoa
  $sql="SELECT studen.*,khoa.tenkhoa FROM studen,khoa WHERE studen.khoa=khoa.id";
  // var_dump($sql);
  $result=mysqli_query($conn,$sql);
  echo '<tr>
    <td style="padding-right: 15px;padding-top: 2px;">
      MSSV
    </td>
    <td style="padding-right: 15px;padding-top: 2px;">
      Họ tên
    </td style="padding-right: 15px;padding-top: 2px;">
    <td>
      Khoa
    </td>
  </tr>';
  foreach($result as $row){
    echo '<tr>
          <td style="padding-right: 15px;padding-top: 2px;">
            '.$row['mssv'].'
          </td>
          <td style="padding-right: 15px;padding-top: 2px;">
          '.$row['hten'].'
          </td>
          <td style="padding-right: 15px;padding-top: 2px;">
          '.$row['tenkhoa'].'
          </td>
        </tr>';
  }
?>