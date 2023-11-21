<?php
  session_start();
  if(isset($_SESSION['username']))
    echo '<h1>Xin Chào '.$_SESSION['username'].'!</h1>';
  else
    echo '<h1>Xin Chào!</h1>';
  echo '<div>Tôi là: Lê Nguyễn Quang Bình</div>
  <ul>
    <li>Mã số sinh viên: 21022010</li>
    <li>Khoa: Công Nghệ Thông Tin</li>
    <li>Ngành: Khoa Học Máy Tính</li>
    <li>Lớp: ĐH KHMT 2021</li>
    <li>Mã lớp: 1KMT21A</li>
    <li>Chức vụ: Bí thư lớp</li>
  </ul>';
?>