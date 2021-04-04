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
            $pId = $_POST['productId'];
            $pName = $_POST['productName'];
            $pImage = $_POST['productImage'];
            $pPrice = $_POST['productPrice'];
            $pSale = $_POST['productSale'];
            $pBaoHanh = $_POST['productBaoHanh'];
            $pChongNuoc = $_POST['productChongNuoc'];
            $pSize = $_POST['productSize'];
            $pHang = $_POST['productHang'];
            $pLoaiDay = $_POST['productLoaiDay'];
            $pLoaiKinh = $_POST['productLoaiKinh'];
            $pGioiTinh= $_POST['productGioiTinh'];
            $pLoaiPin = $_POST['productLoaiPin'];
            $pMat = $_POST['productMat'];
            $pThuongHieu = $_POST['productThuongHieu'];
            $pNoiSanXuat = $_POST['productNoiSanXuat'];

            //Tạo biến tham chiếu đến database
            $dbh = new PDO('mysql:host=localhost;dbname=lab03db', 'root', '');
            $sql = "insert into products (pMa, pAnh, pTen, pGia, pGiamGia, pBaoHanh, pChongNuoc, pMat, pGioiTinh, pHang, pLoaiDay, pLoaiKinh, pLoaiMay, pSize, pThuongHieu, pNoiSanXuat) 
            values ('$pId', '$pImage', '$pName', '$pPrice', '$pSale', '$pBaoHanh', '$pChongNuoc', '$pMat', '$pGioiTinh', '$pHang', '$pLoaiKinh', '$pLoaiKinh', '$pLoaiPin', '$pSize', '$pThuongHieu', '$pNoiSanXuat');";

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
                            window.location.href = "admin.php";
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
                            window.location.href = "admin.php";
                        });
                    </script>';
            }
        }
    ?>
</body>
</html>