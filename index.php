<?php
  //Nếu có tương tác với sql thì phải có yêu cầu cơ sở dữ liệu!
  require "./php/db_con.php";
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
  <script src="./js/jquery-3.7.1.min.js"></script>
</head>
<body>
  <header>
    Header
  </header>
  <menu>
    <ul class="menu_bar">
      <li><a class="btn" href="default.asp">Home</a></li>
      <li><a class="btn" href="news.asp">News</a></li>
      <li><a class="btn" href="contact.asp">Contact</a></li>
      <li><a class="btn" href="about.asp">About</a></li>
    </ul>
  </menu>
  <div class="main">
    <div class="left">Left</div>
    <main>
      <div>Main</div>
      <form class="datafrom" method="post" enctype="multipart/form-data">
        <input name="F" type="text" placeholder="(。_。)">
        <input name="L" type="text" placeholder="(⊙_⊙)？">
        <input name="I" type="file" accept="image/*">
        <button class="btn_control_add" type="submit">Add</button>
      </form>
      <!-- <button class="btn">a</button> -->
      <table class="data_table">
      <?php
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
      ?>
      </table>
    </main>
    <div class="right">Right</div>
  </div>
  <footer>
    Footer
  </footer>

<script>
  $(".datafrom").submit(function(){
  var formData = new FormData(this);
  $.ajax({
      type: "POST",
      dataType: "json",
      url: "./php/add.php",
      data: formData,
      dataType: "html",
      cache: false,
      contentType: false,
      processData: false,
      beforeSend: function(){
          // Show a loader animation
      },
      success: function(data) {
          $(".data_table").html(data);
          // console.log(data);
      },
      error: function() {
          // Display error message
      }
  });
  return false;
  });
</script>
</body>
</html>