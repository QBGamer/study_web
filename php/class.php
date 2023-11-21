<?php
  require "db_con.php";
  if(isset($_GET["svname"])){
    if(!isset($_GET["id"])){
      if(empty($_GET["svname"])){
        header("Location: ../?error=Thêm họ tên không bỏ trống!");
        exit();
      }
      $TenSV=$_GET['svname'];
      $Dayin=$_GET['svdayin'];
      if(empty($Dayin))
        $Dayin= 'NULL';
      $Class=$_GET['class'];
      $Address=$_GET['address'];
      $sql="INSERT INTO studens(Name,DaysIn,MaL,MaAD,Full) VALUES
      ('$TenSV','$Dayin',$Class,$Address,'test')";
      // var_dump($sql);
      mysqli_query($conn,$sql);
    }else{
      $sql="UPDATE studens SET";
      // var_dump($_GET["svname"]);
      if(!empty($_GET["svname"])){
        $temp=$_GET["svname"];
        $sql.=" Name='$temp'";
      }else{
        $sql.= " Name=Name";
      }
      if(!empty($_GET["svdayin"])){
        $temp=$_GET["svdayin"];
        $sql.= " ,DaysIn='$temp'";
      }
      if(!empty($_GET["class"])){
        $temp=$_GET["class"];
        $sql.= " ,MaL=$temp";
      }
      if(!empty($_GET["address"])){
        $temp=$_GET["address"];
        $sql.= " ,MaAD=$temp";
      }
      $temp=$_GET['id'];
      $sql.= " WHERE MSSV=$temp";
      // var_dump($sql);
      mysqli_query($conn,$sql);
    }
  }
  $sql="SELECT * FROM studens";
  if(isset($_GET['search'])){
    $sfor=$_GET['search'];
    $sql.=" WHERE FULL LIKE '%$sfor%'";
    // var_dump($sql);
  }
  $result = mysqli_query($conn, $sql);
  // var_dump($result);
  echo '<div class="row border-bottom">
        <div class="col align-self-center fs-4">MSSV</div>
        <div class="col align-self-center fs-4">Họ Tên</div>
        <div class="col align-self-center fs-4">Ngày vào đoàn</div>
        <div class="col align-self-center fs-4">Lớp</div>
        <div class="col align-self-center fs-4">Nơi ở</div>
      </div>';
  foreach($result as $item){
    $sql="SELECT TenL FROM class WHERE MaL=".$item['MaL']."";
    // var_dump($sql);
    $class=mysqli_fetch_array(mysqli_query($conn, $sql));
    $sql="SELECT TenAD FROM address WHERE MaAD=".$item['MaAD']."";
    $address=mysqli_fetch_array(mysqli_query($conn, $sql));
    echo '<div class="row mt-1">
            <div class="col align-self-center">'.$item['MSSV'].'</div>
            <div class="col align-self-center">'.$item['Name'].'</div>';
    if($item['DaysIn']!="")
      echo '<div class="col align-self-center">'.$item['DaysIn'].'</div>';
    else
      echo '<div class="col align-self-center">Chưa vào đoàn</div>';
    echo '<div class="col align-self-center">'.$class['TenL'].'</div>
        <div class="col align-self-center">'.$address['TenAD'].'</div>
        </div>';
  }
?>