<?php
  require "db_con.php";
  $sql="SELECT * FROM studens";
  if(isset($_GET['search'])){
    $sfor=$_GET['search'];
    $sql.=" WHERE FULL LIKE '%$sfor%'";
    // var_dump($sql);
  }
  $result = mysqli_query($conn, $sql);
  echo '<div class="row border-bottom">
        <div class="col align-self-center fs-4">MSSV</div>
        <div class="col align-self-center fs-4">Họ Tên</div>
        <div class="col align-self-center fs-4">Ngày vào đoàn</div>
      </div>';
  foreach($result as $item){
    echo '<div class="row mt-1">
            <div class="col align-self-center">'.$item['MSSV'].'</div>
            <div class="col align-self-center">'.$item['Name'].'</div>';
    if($item['DaysIn']!="")
      echo '<div class="col align-self-center">'.$item['DaysIn'].'</div>
          </div>';
    else
      echo '<div class="col align-self-center">Chưa vào đoàn</div>
      </div>';
  }
?>