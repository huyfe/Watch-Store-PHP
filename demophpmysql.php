<!DOCTYPE html>
<html lang="en">
<head>
  <title>Quản lý chuyến bay</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    table tbody tr:nth-child(2n+1) {
      background-color: #eee;
    }
  </style>
</head>
<body>

<?php 
    // Truy cập đến database của mysql
    $dbh = new PDO('mysql:host=localhost;dbname=qlchuyenbay', 'root', '');
                  //('server chứa databse';'Tên database','username','password')

    // Tạo biến lưu câu lệnh hiển thị tất cả chuyến bay trong bảng flights
    $sql = "select * from flights";

    // Tạo biến truy cập đến bảng đc truy vấn bằng cú pháp <tên biến lưu csdl> -> query(<câu lệnh truy vấn sql>);
    $result = $dbh->query($sql);
?>

<div class="container">
  <h2>Quản lý chuyến bay</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Mã chuyến bay</th>
        <th>Xuất phát</th>
        <th>Điểm đến</th>
        <th>Thời lượng</th>
      </tr>
    </thead>
    <tbody>
      <?php
        // Duyệt mảng chứa database của mysql
        foreach($result as $flight) {
          echo '
          <tr>
          <td>'.$flight['id'].'</td>
          <td>'.$flight['origin'].'</td>
          <td>'.$flight['destination'].'</td>
          <td>'.$flight['duration'].'</td>
        </tr>
          ';
        }
        
      ?>
      
    </tbody>
  </table>
</div>

</body>
</html>
