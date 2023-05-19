<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
</head>
<body>

<?php 
        // Xử lí button lưu
        if(isset($_POST['btnLuu'])) {
            //Lấy dữ liệu từ form
            $dName = $_POST['donHangName'];
            $dPhone = $_POST['donHangPhone'];
            $dEmail = $_POST['donHangEmail'];
            $dDiaChi = $_POST['donHangDiaChi'];
            $dNgayDat = $_POST['donHangNgayDat'];
            $dTrangThai = $_POST['donHangStatus'];

            //Tạo biến tham chiếu đến database
            $dbh = new PDO('mysql:host=localhost;dbname=lab03db', 'root', '');
            $sql = "insert into donhang (hoTen, soDienThoai, email, diaChi, ngayDat, status) 
            values ('$dName', '$dPhone', '$dEmail', '$dDiaChi', '$dNgayDat', '$dTrangThai');";

            $result = $dbh->exec($sql);

            
            if($result) {
                echo '<script type="text/javascript">
                        swal({
                            title: "Success!",
                            text: "Bạn đã thêm thành công.",
                            type: "success",
                            timer: 2000,
                            showConfirmButton: true
                            }, function(){
                            window.location.href = "donhang.php";
                        });
                    </script>';
            }
            else {
                echo '<script type="text/javascript">
                        swal({
                            title: "Failed!",
                            text: "Thêm không thành công",
                            type: "error",
                            timer: 1000,
                            showConfirmButton: true
                            }, function(){
                            window.location.href = "donhang.php";
                        });
                    </script>';
            }
        }
    ?>
</body>
</html>