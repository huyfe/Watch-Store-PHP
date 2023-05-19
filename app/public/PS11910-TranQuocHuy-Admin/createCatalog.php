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
            $cId = $_POST['catalogId'];
            $cName = $_POST['catalogName'];

            //Tạo biến tham chiếu đến database
            $dbh = new PDO('mysql:host=localhost;dbname=lab03db', 'root', '');
            $sql = "insert into catalog (cMa, cTen) 
            values ('$cId', '$cName');";

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
                            window.location.href = "index.php";
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
                            window.location.href = "index.php";
                        });
                    </script>';
            }
        }
    ?>
</body>
</html>