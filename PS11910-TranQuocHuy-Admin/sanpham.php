<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="javascript/dropdown.js"></script>
    <script src="javascript/editProduct.js"></script>
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
        $sql = "select * from products";
        $result = $dbh->query($sql);

        if(isset($_POST['btnSearch'])) {
            $search = $_POST['search'];
            $sql = "select * from products where pTen like '%".$search."%' ";
            $result = $dbh->query($sql);
        }

        if(isset($_POST['btnXoa'])) {
            $str = $_POST['select'];
            foreach($str as $p => $index) {
                echo $index. '<br/>';
                $dbh->exec("delete from products where pMa = '$index'");
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
                    <a style="background-color: #dd421f; color: white" href="sanpham.php"><i class="fa fa-database"></i> Sản phẩm</a>
                    <a href="donhang.php"><i class="fa fa-address-book-o"></i> Đơn hàng</a>
                </div>
            </div>
            <div class="right">
                <div class="controls">
                    <button id="btnAddProduct"> <i class="fa fa-plus"></i> Thêm Sản Phẩm</button> 
                    <button id="btnShowProduct"> <i class="fa fa-plus"></i> Chỉnh Sửa Sản Phẩm</button> 
                </div>
                <form id="addProduct" action="createProduct.php" method="post">
                    <legend class="title"><i class="fa fa-plus"></i> Add New Product</legend>
                    <table>
                        <tr>
                            <td>
                                <label for="">ID</label>
                                <div class="fomr-control">
                                    <input type="text" name="productId" id="productId" required>
                                </div>
                            </td>
                            <td>
                                <label for="">Product Name</label>
                                <div class="form-control">
                                    <input type="text" name="productName" id="productName" required>
                                </div>
                            </td>    
                            <td>
                                <label for="">Image</label>
                                <div class="form-control">
                                    <input type="text" name="productImage" id="productImage" required>
                                </div>
                            </td>              
                        </tr>

                        <tr>
                            <td>
                                <label for="">Price</label>
                                <div class="form-control">
                                    <input type="number" name="productPrice" id="productPrice" required>
                                </div>
                            </td>
                            <td>
                                <label for="">Sale</label>
                                <div class="form-control">
                                    <input type="number" name="productSale" id="productSale">
                                </div>
                            </td>
                            <td>
                                <label for="">Bảo Hành</label>
                                <div class="form-control">
                                    <input type="number" name="productBaoHanh" id="productBaoHanh">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="">Chống Nước</label>
                                <div class="form-control">
                                    <input list="keyword" name="productChongNuoc" id="productChongNuoc">
                                    <datalist id="keyword">
                                        <option value="3 ATM (30m)">3 ATM (30m)</option>
                                        <option value="5 ATM (50m)">5 ATM (50m)</option>
                                        <option value="10 ATM (100m)">10 ATM (100m)</option>
                                    </datalist>
                                </div>
                            </td>
                            <td>
                                <label for="">Size</label>
                                    <div class="form-control">
                                        <input type="number" name="productSize" id="productSize">
                                    </div>
                            </td>
                            <td>
                                <label for="">Hãng</label>
                                <div class="form-control">
                                    <input list="brands" name="productHang" id="productHang">
                                    <datalist id="brands">
                                        <option value="Casio">Casio</option>
                                        <option value="Citizen">Citizen</option>
                                        <option value="Daniel Wellington">Daniel Wellington</option>
                                        <option value="Orient">Orient</option>
                                        <option value="MVMT">MVMT</option>
                                        <option value="Tissot">Tissot</option>
                                        <option value="Olym Pianus">Olym Pianus</option>
                                        <option value="Olympia Star">Olympia Star</option>
                                        <option value="Fossil">Fossil</option>
                                    </datalist>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="">Loại Dây</label>
                                <div class="form-control">
                                    <input type="radio" id="inox" name="productLoaiDay" value="inox">
                                    <label for="inox">Dây Inox</label> <br>
                                    <input type="radio" id="da" name="productLoaiDay" value="da">
                                    <label for="da">Dây Da</label>
                                </div>
                            </td>

                            <td>
                                <label for="">Loại Kính</label>
                                <div class="form-control">
                                <input type="radio" id="mineral" name="productLoaiKinh" value="mineral-crystal">
                                <label for="mineral">Mineral Crystal</label> <br>
                                <input type="radio" id="sapphire" name="productLoaiKinh" value="sapphire"> 
                                <label for="sapphire">Sapphire</label>
                                </div>
                            </td>
                            <td>
                                <label for="">Giới Tính</label>
                                <div class="form-control">
                                <input type="radio" id="male" name="productGioiTinh" value="Nam">
                                <label for="male">Nam</label> <br>
                                <input type="radio" id="female" name="productGioiTinh" value="Nữ">
                                <label for="female">Nữ</label>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="">Loại Pin</label>
                                <div class="form-control">
                                <input type="radio" id="quartz" name="productLoaiPin" value="Quartz">
                                <label for="quartz">Quartz</label> <br>
                                <input type="radio" id="automatic" name="productLoaiPin" value="Automatic">
                                <label for="automatic">Automatic</label>
                                </div>
                            </td>
                            <td colspan="2">
                            <label for="">Mặt Đồng Hồ</label>
                                <div class="form-control">
                                    <input type="radio" id="tron" name="productMat" value="Tròn">
                                    <label for="tron">Tròn</label> <br>
                                    <input type="radio" id="vuong" name="productMat" value="Vuông">
                                    <label for="vuong">Vuông</label>
                                </div>
                                
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="">Thương Hiệu</label>
                                <div class="form-control">
                                    <select name="productThuongHieu" id="thuongHieu">
                                        <option value="Nhật Bản">Nhật Bản</option>
                                        <option value="Thụy Điển">Thụy Điển</option>
                                        <option value="Mỹ">Mỹ</option>
                                        <option value="Thụy Sĩ">Thụy Sĩ</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <label for="">Nơi Sản Xuất</label>
                                <div class="form-control">
                                    <select name="productNoiSanXuat" id="thuongHieu">
                                        <option value="Nhật Bản">Nhật Bản</option>
                                        <option value="Thụy Điển">Thụy Điển</option>
                                        <option value="Mỹ">Mỹ</option>
                                        <option value="Thụy Sĩ">Thụy Sĩ</option>
                                    </select>
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
                <form id="showProduct" method="post" action="#"> 
                    <table>
                        <legend class="title">Show Products
                            <div class="search-box">
                                <input type="submit" name="btnSearch" value="Tìm kiếm">
                                <input type="text" name="search" placeholder="Search...">
                            </div>
                        </legend>
                        <tr>
                            <th id="btnXoa" class="th"><button  type="submit" name="btnXoa" > <i class="fa fa-trash icons-delete"></i></button</th>
                            <th class="th">Hình Ảnh</th>
                            <th class="th">Tên Sản Phẩm</th>
                            <th class="th">Mã Sản Phẩm</th>
                            <th class="th">Hãng</th>
                            <th class="th">Giới Tính</th>
                            <th class="th">Actions</th>
                        </tr>

                        <?php
                            foreach ($result as $sp) {
                                echo '
                                    <tr> 
                                        <td>
                                            <input type="checkbox" value="'.$sp['pMa'].'" name="select[]">
                                        </td>
                                        <td class="td-image">
                                            <img src="images/'.$sp['pAnh'].'" width="50%">
                                        </td>
                                        <td>'.$sp['pTen'].'</td>
                                        <td>'.$sp['pMa'].'</td>
                                        <td>'.$sp['pHang'].'</td>
                                        <td>'.$sp['pGioiTinh'].'</td>
                                        <td> 
                                            <a href="editProduct.php?pId='.$sp['pMa'].'" alt="Edit"> <i class="fa fa-edit icons-edit"></i> </a>
                                            <a href="deleteProduct.php?pId='.$sp['pMa'].'"> <i class="fa fa-trash icons-delete"></i> </a>
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