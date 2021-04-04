


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
</head>
<body>
<?php
    session_start();
    $dbh = new PDO('mysql:host=localhost;dbname=lab03db', 'root', '');

    //Lấy thông tin người đặt hàng
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $ngay = date('Y-m-d H:i:s'); // Năm - tháng - ngày - giờ hiện tại
    //Xử lý thêm vào bảng đơn hàng
    $sql="insert into donhang(hoTen,soDienThoai,email,diaChi,ngayDat,status)
    values ('$name', '$phone', '$email', '$address', '$ngay', 'Chưa giao hàng')";
    $sth = $dbh->exec($sql);

    //Xử lý thêm vào bảng chitietdonhang
    $madh=$dbh->lastInsertId();
    foreach ($_SESSION['carts'] as $sp) {
        $masp = $sp['id'];
        $sl = $sp['quantity'];
        $query = "insert into chitietdonhang(maDh, maSp, soLuong) values ('$madh', '$masp', '$sl')";
        $sth = $dbh->exec($query);
        $luotmua = "update products set pLuotMua=pLuotMua+1 where pMa='$masp'";
        $update = $dbh->exec($luotmua);
    }
    echo '<script type="text/javascript">
                    swal({
                        title: "Hoàn tất!",
                        text: "Cảm ơn bạn đã mua đồng hồ của cửa hàng :)",
                        type: "success",
                        timer: 2000,
                        showConfirmButton: true
                        }, function(){
                        window.location.href = "index.php";
                    });
                </script>';
    unset($_SESSION['carts']);
    
    //Xóa giỏ hàng vừa thêm vào database
?>
</body>
</html>