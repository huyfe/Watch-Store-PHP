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
        $id=$_GET['cId'];
        $dbh = new PDO('mysql:host=localhost;dbname=lab03db', 'root', '');
    ?>
    <form action="" method="post">
        <table>
        <legend class="title">Cập Nhật</legend>
            <tr>
                <th>Mã Danh Mục</th>
                <th>Tên Danh Mục</th>
            </tr>
        <?php
            $sql="select * from catalog where cMa='$id'";
            $result=$dbh->query($sql);

            //Lấy dòng đầu tiên
            $row = $result->fetch(PDO::FETCH_ASSOC);
            echo '
            <tr> 
                <td>
                    <input type="hidden" value="'.$id.'" name="idc">
                    <input type="text" value="'.$row['cMa'].'" name="catalogCode">
                </td>
                <td><input type="text" value="'.$row['cTen'].'" name="catalogName"></td>
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
            $code = $_POST['catalogCode'];
            $name = $_POST['catalogName'];
            $idCatalog = $_POST['idc'];
            //Code cập nhật sql
            $sqlCapNhat = "update catalog set cMa='$code', cTen='$name' where cMa='$idCatalog'";
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
                        window.location.href = "index.php";
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
                        window.location.href = "index.php";
                    });
                </script>';
        }
        
        }
        ?>
    </form>
</body>
</html>