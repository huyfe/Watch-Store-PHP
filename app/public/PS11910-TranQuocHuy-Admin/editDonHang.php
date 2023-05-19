<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
    <link rel="stylesheet" href="css/editProduct.css">
    <script src="javascript/back.js"></script>
</head>
<body>
    <?php
        $id=$_GET['dId'];
        $dbh = new PDO('mysql:host=localhost;dbname=lab03db', 'root', '');
    ?>
    <form action="" method="post">
        <table>
        <legend class="title">Cập Nhật</legend>
            <tr>
                <th>Mã Đơn Hàng</th>
                <th>Tên Người Đặt Hàng</th>
                <th>Số Điện Thoại</th>
                <th>Email</th>
                <th>Địa Chỉ</th>
                <th>Ngày Đặt</th>
            </tr>
        <?php
            $sql="select * from donhang where maDh='$id'";
            $result=$dbh->query($sql);

            //Lấy dòng đầu tiên
            $row = $result->fetch(PDO::FETCH_ASSOC);
            echo '
            <tr> 
                <td>
                    <input type="hidden" value="'.$id.'" name="idd">
                    <input type="text" value="'.$row['maDh'].'" name="donHangCode">
                </td>
                <td><input type="text" value="'.$row['hoTen'].'" name="donHangName"></td>
                <td><input type="text" value="'.$row['soDienThoai'].'" name="donHangPhone"></td>
                <td><input type="text" value="'.$row['email'].'" name="donHangEmail"></td>
                <td><input type="text" value="'.$row['diaChi'].'" name="donHangDiaChi"></td>
                <td><input type="text" value="'.$row['ngayDat'].'" name="donHangNgayDat"></td>
                
            </tr>
            <th>Status</th>
        ';
            if($row['status'] == "Chưa giao hàng") {
                echo '
                <tr>
                    <td>
                        <input type="radio" id="chua" name="donHangStatus" value="Chưa giao hàng" checked>
                        <label for="chua">Chưa giao hàng</label> <br>
                        <input type="radio" id="giao" name="donHangStatus" value="Đã giao hàng">
                        <label for="giao">Đã giao hàng</label>
                    </td>
                </tr>
                ';
            }
            else {
                echo '
                    <tr>
                        <td>
                            <input type="radio" id="chua" name="donHangStatus" value="Chưa giao hàng">
                            <label for="chua">Chưa giao hàng</label> <br>
                            <input type="radio" id="giao" name="donHangStatus" value="Đã giao hàng" checked>
                            <label for="giao">Đã giao hàng</label>
                        </td>
                    </tr>
                ';
            }
        ?>
            <tr>
                <td><input id="update" type="submit" value="Cập nhật" name="btnCapNhat"></td>
            </tr>
        </table>

        <?php 
            //Xử lí cập nhật
        if(isset($_POST['btnCapNhat'])) {
            //Lấy dữ liệu từ form
            $code = $_POST['donHangCode'];
            $name = $_POST['donHangName'];
            $phone = $_POST['donHangPhone'];
            $email = $_POST['donHangEmail'];
            $diaChi = $_POST['donHangDiaChi'];
            $ngayDat = $_POST['donHangNgayDat'];
            $status = $_POST['donHangStatus'];
            $idDonHang = $_POST['idd'];
            //Code cập nhật sql
            $sqlCapNhat = "update donhang set maDh='$code', hoTen='$name', 
            soDienThoai='$phone', email='$email', diaChi='$diaChi', ngayDat='$ngayDat', status='$status' where maDh='$idDonHang'";
            $update = $dbh->exec($sqlCapNhat);
            
            if($update) {
                echo '<script type="text/javascript">
                    swal({
                        title: "Success!",
                        text: "Bạn đã hoàn tất chỉnh sửa :)",
                        type: "success",
                        timer: 1000,
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
                        text: "Cập nhật không thành công! Vui lòng kiểm tra lại",
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
    </form>
</body>
</html>