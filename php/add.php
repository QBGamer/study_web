<?php
  //có sql thì phải yêu cầu kết nối sql
  require "db_con.php";
  $F=$_POST['F'];
  $L=$_POST['L'];
  if(!empty($_FILES["I"]["name"])){
    $temp= explode(".", $_FILES["I"]["name"]);
    $img_loc=$_FILES['I']['tmp_name'];
    $img=date('dmYHis').'.'.end($temp);
    $save="../img/";
    // var_dump($temp,$img_loc,$img,$save);
    move_uploaded_file($img_loc,$save.$img);
  }else{
    $img="none.png";
  }
  $sql="INSERT INTO dulieu value ($F,'$L','$img')";
  mysqli_query($conn,$sql);
  $sql= "SELECT * FROM dulieu";
  $result=mysqli_query($conn,$sql);
  echo "<tr>
        <td>Ảnh</td>
        <td>Họ</td>
        <td>Tên</td>
      </tr>";
  foreach($result as $row){
    echo "<tr>
        <td class='img_box'><img src='./img/".$row['Anh']."'></td>
        <td>".$row['Ho']."</td>
        <td>".$row['Ten']."</td>
      </tr>";
  }
  // return "asd";
?>