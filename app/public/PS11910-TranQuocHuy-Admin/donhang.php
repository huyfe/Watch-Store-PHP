<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="javascript/dropdown.js"></script>
    <script src="javascript/editDonHang.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <?php   
        session_start();
        if(!isset($_SESSION['admin'])) {
            header('location: login.php');  
        }

        $dbh = new PDO('mysql:host=localhost;dbname=lab03db', 'root', '');
        $sql = "select * from donhang";
        $result = $dbh->query($sql);

        if(isset($_POST['btnSearch'])) {
            $search = $_POST['search'];
            $sql = "select * from donhang where hoTen like '%".$search."%' ";
            $result = $dbh->query($sql);
        }

        if(isset($_POST['btnXoa'])) {
            $str = $_POST['select'];
            foreach($str as $p => $index) {
                echo $index. '<br/>';
                $dbh->exec("delete from donhang where maDh = '$index'");
            }
        }
    ?>
    <div class="rows">
        <header class="box-header">
        </header>
    </div>

    

    <div class="rows">
        <div class="boxcenter">
            <div class="left">
                <div class="vertical-menu">
                    <a id="clickdropdown">
                        <i class="fa fa-user"></i> 
                        <?php
                            echo $_SESSION['admin'];
                        ?>
                    <i id="down"  style="float: right" class="fa fa-sort-down"></i>
                    </a>
                        <div id="dropdown">
                            <a href="logout.php"><i class="fa fa-sign-out"></i> Đăng xuất</a>
                            <a href="changePassword.php"><i class="fa fa-exchange"></i> Đổi mật khẩu</a>
                        </div>
                    <a href="index.php"><i class="fa fa-server"></i> Danh mục</a>
                    <a href="sanpham.php"><i class="fa fa-database"></i> Sản phẩm</a>
                    <a style="background-color: #dd421f; color: white" href="donhang.php"><i class="fa fa-address-book-o"></i> Đơn hàng</a>
                </div>
            </div>
            <div class="right">
                <div class="controls">
                    <button id="btnAddDonHang"> <i class="fa fa-plus"></i> Thêm Đơn Hàng</button> 
                    <button id="btnShowDonHang"> <i class="fa fa-plus"></i> Chỉnh Sửa Đơn Hàng</button> 
                </div>
                <form id="addDonHang" action="createDonHang.php" method="post">
                    <legend class="title"><i class="fa fa-plus"></i> Thêm Đơn Hàng</legend>
                    <table>
                        <tr>
                            <td>
                                <label for="">Tên Người Đặt Hàng</label>
                                <div class="form-control">
                                    <input type="text" name="donHangName" id="productName" required>
                                </div>
                            </td>    
                            <td>
                                <label for="">Số Điện Thoại</label>
                                <div class="fomr-control">
                                    <input type="number" name="donHangPhone" id="productImage" required>
                                </div>
                            </td>    
                        </tr>
                        <tr>
                        <td>
                                <label for="">Email</label>
                                <div class="fomr-control">
                                    <input type="email" name="donHangEmail" id="productPrice" required>
                                </div>
                            </td>     
                            <td>
                                <label for="">Địa Chỉ</label>
                                <div class="fomr-control">
                                    <input type="text" name="donHangDiaChi" id="productSale" required>
                                </div>
                            </td>    
                            <td>
                                <label for="">Ngày Đặt</label>
                                <div class="fomr-control">
                                    <input type="date" name="donHangNgayDat" id="productBaoHanh" required>
                                </div>
                            </td>   
                        </tr>
                        <tr>
                        <td>
                                <label for="">Trạng Thái</label>
                                <div class="form-control">
                                    <input type="radio" id="chua" name="donHangStatus" value="Chưa giao hàng">
                                    <label for="chua">Chưa giao hàng</label> <br>
                                    <input type="radio" id="giao" name="donHangStatus" value="Đã giao hàng">
                                    <label for="giao">Đã giao hàng</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button type="submit"  id="create" name="btnLuu"><i class="fa fa-check-circle"></i> Lưu</button>
                            </td>
                        </tr>
                    </table>
                </form>

                
                <div class="rows">
                <form id="showDonHang" method="post" action="#"> 
                    <table>
                        <legend class="title"><i class="fa fa-eye"></i> Xem Đơn Hàng
                            <div class="search-box">
                                <input type="submit" name="btnSearch" value="Tìm kiếm">
                                <input type="text" name="search" placeholder="Search...">
                            </div>
                        </legend>
                        <tr>
                            <th id="btnXoa" class="th"><button  type="submit" name="btnXoa" > <i class="fa fa-trash icons-delete"></i></button</th>
                            <th class="th">Mã Đơn Hàng</th>
                            <th class="th">Tên Người Đặt Hàng</th>
                            <th class="th">Số Điện Thoại</th>
                            <th class="th">Email</th>
                            <th class="th">Địa Chỉ</th>
                            <th class="th">Ngày Đặt</th>
                            <th class="th">Status</th>
                            <th class="th">Actions</th>
                        </tr>

                        <?php
                            

                            foreach ($result as $dh) {
                                echo '
                                    <tr> 
                                        <td>
                                            <input type="checkbox" value="'.$dh['maDh'].'" name="select[]">
                                        </td>
                                        <td>'.$dh['maDh'].'</td>
                                        <td>'.$dh['hoTen'].'</td>
                                        <td>'.$dh['soDienThoai'].'</td>
                                        <td>'.$dh['email'].'</td>
                                        <td>'.$dh['diaChi'].'</td>
                                        <td>'.$dh['ngayDat'].'</td>
                                        <td>'.$dh['status'].'</td>
                                        <td> 
                                            <a href="editDonHang.php?dId='.$dh['maDh'].'" alt="Edit"> <i class="fa fa-edit icons-edit"></i> </a>
                                            <a href="deleteDonHang.php?dId='.$dh['maDh'].'"> <i class="fa fa-trash icons-delete"></i> </a>
                                        </td>
                                    </tr>
                                ';
                            }
                        ?>
                    </table>
                </form>
                </div>
            </div>
        </div>
    </div>
    <div class="rows">
        <footer>
            <i>Copyright @tranquochuy</i>
        </footer>
    </div>
</body>
</html>