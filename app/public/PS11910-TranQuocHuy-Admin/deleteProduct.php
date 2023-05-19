<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
</head>
<body>
    <?php
        $id = $_GET['pId'];
        // Truy cập đến database của mysql
        $dbh = new PDO('mysql:host=localhost;dbname=lab03db', 'root', '');
        //('server chứa databse';'Tên database','username','password')

        $sql = "delete from products where pMa='$id'";

        // Tạo biến truy cập đến bảng đc truy vấn bằng cú pháp <tên biến lưu csdl> -> exec(<câu lệnh truy vấn sql>);
        $result = $dbh->exec($sql);
        if($result) {
            echo '<script type="text/javascript">
                    swal({
                        title: "Success!",
                        text: "Ban đã xoa thành công.",
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
                        text: "Xóa không thành công! Vui lòng kiểm tra lại ràng buộc giữa các bảng",
                        type: "error",
                        timer: 1000,
                        showConfirmButton: true
                        }, function(){
                        window.location.href = "sanpham.php";
                    });
                </script>';
        }
    ?>
</body>
</html>