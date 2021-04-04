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
        $id=$_GET['pId'];
        $dbh = new PDO('mysql:host=localhost;dbname=lab03db', 'root', '');
    ?>
    <form action="" method="post">
        <table>
        <legend class="title">Cập Nhật</legend>
            <tr>
                <th>Ảnh</th>
                <th>Mã</th>
                <th>Tên</th>
                <th>Hãng</th>
                <th>Giới Tính</th>
            </tr>
        <?php
            $sql="select * from products where pMa='$id'";
            $result=$dbh->query($sql);

            //Lấy dòng đầu tiên
            $row = $result->fetch(PDO::FETCH_ASSOC);
            echo '
            <tr> 
                <td>
                    <input type="hidden" value="'.$id.'" name="idp">
                    <input type="text" value="'.$row['pAnh'].'" name="productAnh">
                </td>
                <td>
                    <input type="text" value="'.$row['pMa'].'" name="productCode">
                </td>
                <td><input type="text" value="'.$row['pTen'].'" name="productName"></td>
                <td><input type="text" value="'.$row['pHang'].'" name="productHang"></td>
                <td><input type="text" value="'.$row['pGioiTinh'].'" name="productGioiTinh"></td>
                
            </tr>
        ';
        ?>
        <tr>
            <td><input id="update" type="submit" value="Cập nhật" name="btnCapNhat"></td>
        </tr>
        </table>

        <?php 
            //Xử lí cập nhật
        if(isset($_POST['btnCapNhat'])) {
            //Lấy dữ liệu từ form
            $urlAnh = $_POST['productAnh'];
            $code = $_POST['productCode'];
            $name = $_POST['productName'];
            $brand = $_POST['productHang'];
            $gender = $_POST['productGioiTinh'];
            $idProduct = $_POST['idp'];
            //Code cập nhật sql
            $sqlCapNhat = "update products set pMa='$code', pTen='$name', pAnh='$urlAnh', pHang='$brand', pGioiTinh='$gender' where pMa='$idProduct'";
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
                        window.location.href = "sanpham.php";
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
                        window.location.href = "sanpham.php";
                    });
                </script>';
        }
        
        }
        ?>
    </form>
</body>
</html>