<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="javascript/dropdown.js"></script>
    <script src="javascript/editCatalog.js"></script>
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
        $sql = "select * from catalog";
        $result = $dbh->query($sql);

        if(isset($_POST['btnSearch'])) {
            $search = $_POST['search'];
            $sql = "select * from catalog where cTen like '%".$search."%' ";
            $result = $dbh->query($sql);
        }

        if(isset($_POST['btnXoa'])) {
            $str = $_POST['select'];
            foreach($str as $p => $index) {
                echo $index. '<br/>';
                $dbh->exec("delete from catalog where cMa = '$index'");
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
                    <a style="background-color: #dd421f; color: white" href="index.php"><i class="fa fa-server"></i> Danh mục</a>
                    <a href="sanpham.php"><i class="fa fa-database"></i> Sản phẩm</a>
                    <a href="donhang.php"><i class="fa fa-address-book-o"></i> Đơn hàng</a>
                </div>
            </div>
            <div class="right">

                <div class="controls">
                    <button id="btnAddCatalog"> <i class="fa fa-plus"></i> Thêm danh mục</button> 
                    <button id="btnShowCatalog"> <i class="fa fa-plus"></i> Chỉnh sửa danh mục</button> 
                </div>

                <form id="addCatalog" action="createCatalog.php" method="post">
                    <legend class="title"><i class="fa fa-plus"></i> Add New Catalog</legend>
                    <table id="addNew">
                        <tr>
                            <td>
                                <label for="">ID</label>
                                <div class="form-control">
                                    <input type="text" name="catalogId" id="productId" required>
                                </div>
                            </td>
                            <td>
                                <label for="">Product Name</label>
                                <div class="form-control">
                                    <input type="text" name="catalogName" id="productName" required>
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

                
                <div class="rows" >
                <form id="showCatalog" method="post" action="#"> 
                    <table>
                        <legend class="title"><i class="fa fa-eye"></i> Show Catalog
                            <div class="search-box">
                                <input type="submit" name="btnSearch" value="Tìm kiếm">
                                <input type="text" name="search" placeholder="Search...">
                            </div>
                        </legend>
                        <tr>
                            <th id="btnXoa" class="th"><button  type="submit" name="btnXoa" > <i class="fa fa-trash icons-delete"></i> Xóa</button</th>
                            <th class="th">Mã Danh Mục</th>
                            <th class="th">Tên Danh Mục</th>
                            <th class="th">Actions</th>
                        </tr>

                        <?php
                            foreach ($result as $ct) {
                                echo '
                                    <tr> 
                                        <td>
                                            <input type="checkbox" value="'.$ct['cMa'].'" name="select[]">
                                        </td>
                                        <td>'.$ct['cMa'].'</td>
                                        <td>'.$ct['cTen'].'</td>
                                        <td> 
                                            <a href="editCatalog.php?cId='.$ct['cMa'].'" alt="Edit"> <i class="fa fa-edit icons-edit"></i> </a>
                                            <a href="deleteCatalog.php?cId='.$ct['cMa'].'"> <i class="fa fa-trash icons-delete"></i> </a>
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