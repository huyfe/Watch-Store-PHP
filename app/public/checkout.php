<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PS11910 | Trần Quốc Huy | LAB 03</title>
    <link rel="stylesheet" href="css/productDetail.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/checkout.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="javascript/back.js"></script>
    <link rel="stylesheet" href="css/products.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/box-product.css">
    <script>
        $(document).ready(function(){
            $("#btnFilters").click(function(){
            $("#wrap-filters").toggle();
            });
        });
    </script>
</head>

<body>

    <?php 
        if(isset($_GET['pId'])) {
            $id = $_GET['pId'];
            $dbh = new PDO('mysql:host=localhost;dbname=lab03db', 'root', '');
            $sql = "select * from products where pMa='$id'";
            $result=$dbh->query($sql);
            //Lấy dòng đầu tiên
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $gender = $row['pGioiTinh'];
            $price = $row['pGia'];
            $brand = $row['pHang'];
            $sqllienquan = "select * from products where pGioiTinh like '$gender' and pHang like '$brand' 
            and pGia<'$price'+1000000 and pGia>'$price'-1000000";
            $spLienQuan = $dbh->query($sqllienquan);
        }
    ?>

    <div class="container">
        <!-- Start header --> 
        <header class="header">
            <div class="rows">
                <div class="top">
                    <div class="boxcenter">
                        <div class="top-left">
                            <a href="#home"><i class="fa fa-phone-square"></i> HOTLINE: 0333 964 846</a>
                        </div>
                        <div class="top-right">
                            <a href="cart.php">
                            <?php 
                                if(isset($_SESSION['carts'])) {
                                    $tong=0;
                                    $count = count($_SESSION['carts']);
                                    foreach($_SESSION['carts'] as $cart) {
                                        $tong += $cart['price']*$cart['quantity'];
                                    }
                                    echo '<span>'.number_format($tong).' VNĐ</span>
                                        <i style="font-size: 25px;" class="fa fa-shopping-cart"></i>
                                        <span class="soluong">'.$count.'</span>
                                    ';
                                }
                                else {
                                    echo '
                                        <span>0 VNĐ</span>
                                        <i style="font-size: 25px;" class="fa fa-shopping-cart"></i>
                                        <span class="soluong">0</span>
                                    ';
                                }
                            ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="rows bg-white box-shadow">
                <div class="boxcenter">
                    <nav class="menu">
                        <div class="menu-center">
                            <div class="logo">
                                <div class="rows">
                                    <a href="index.php">
                                        <img style="position: absolute; top: 8%;" src="images/huywatch.png" alt="huywatch.com">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header> <!-- End header --> 
        
        <div class="rows">
            <div class="boxcenter">
                <div class="box-xac-nhan">
                    <div class="title-xac-nhan">
                        <h4>XÁC NHẬN - THANH TOÁN</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="rows mrt">
            <div class="boxcenter">
            <form method="post" action="xuLiDonHang.php" class="form-checkout">
                <div class="left-form">
                    <div class="box-hoten">
                        <div class="title-hoten">
                            <h4>
                                <i class="fa fa-user" aria-hidden="true"></i> Họ tên 
                                & Số điện thoại <i class="fa fa-mobile" aria-hidden="true"></i>
                            </h4>
                        </div>
                        <div class="form-control">
                            <input type="text" placeholder="Họ và tên" name="name" required>
                            <input type="number" placeholder="Số điện thoại" name="phone" required>
                        </div>
                    </div>

                    <div class="box-hoten">
                        <div class="title-hoten">
                            <h4>
                            <i class="fa fa-envelope" aria-hidden="true"></i> Email
                            </h4>
                        </div>
                        <div class="form-control">
                            <input type="email" placeholder="abc@xyz..." name="email" required>
                        </div>
                    </div>

                    <div class="box-hoten">
                        <div class="title-hoten">
                            <h4>
                            <i class="fa fa-map-marker" aria-hidden="true"></i> Địa chỉ nhận hàng
                            </h4>
                        </div>
                        <div class="form-control">
                            <input class="address" type="text" placeholder="Địa chỉ" name="address" required>
                        </div>
                    </div>
                </div>
                        
                <div class="right-form">
                    <div class="box-hoten">
                        <div class="title-hoten">
                            <h4>
                            <i class="fa fa-shopping-bag" aria-hidden="true"></i> Thông tin đơn hàng
                            </h4>
                        </div>
                        <div class="thong-tin-san-pham">
                            <table>
                            <?php
                            if(isset($_SESSION['carts'])) {
                                foreach($_SESSION['carts'] as $cart) {
                                    echo '
                                        <tr> 
                                            <td style="width: 15%"> <img src="images/'.$cart['image'].'" width="100%"> </td>
                                            <td style="font-size: 13px">'.$cart['name'].' </td>
                                            <td style="color: red">'.number_format($cart['price']).'đ</td>
                                            <td style="width: 15%; text-align: right">x'.$cart['quantity'].'</td>
                                        </tr>
                                    ';
                                }
                            }
                            ?>
                            </table>
                        </div>
                    </div>

                    <div class="box-hoten">
                        <div class="title-hoten">
                            <h4>
                            Tổng thanh toán
                            </h4>
                        </div>
                        <div class="tong-price">
                            <?php 
                                if(isset($_SESSION['carts'])) {
                                    $tong=0;
                                    foreach($_SESSION['carts'] as $cart) {
                                        $tong += $cart['price']*$cart['quantity'];
                                    }
                                    $tongVnd = number_format($tong);
                                    echo '<span>'.$tongVnd.' VNĐ</span>';
                                }
                            ?>
                        </div>
                        <div class="form-control">
                            <input class="btnDat" type="submit" placeholder="Địa chỉ" name="btnDat" value="Đặt hàng">
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>

        
        
        
        
        
        <!-- Liên kết mạng xã hội -->
        <div class="rows">
            <div class="social">
                <div class="wrap-social">
                    <div class="facebook">
                        <a href="#"><i class="fab fa-facebook-f"></i>
                        <span>Facebook</span></a>
                    </div>
                    <div class="youtube">
                        <a href="#"><i class='fab fa-youtube'></i>
                        <span>Youtube</span></a>
                    </div>
                    <div class="instagram">
                        <a href="#"><i class='fab fa-instagram'></i>
                        <span>Instagram</span></a>
                    </div>
                </div>
            </div>
        </div> <!--End Liên kết mạng xã hội-->


        <!-- Start Footer-->
        <div class="rows">
            <footer>
                <div class="boxcenter">
                    <div id="filters" class="filters" >
                        <div>
                            <h6>Sắp xếp theo</h6>
                            <a href="filters.php?cId=1">Mới nhất</a>
                            <a href="filters.php?cId=2">Giá từ thấp đến cao</a>
                            <a href="filters.php?cId=3">Giá từ cao xuống thấp</a>
                        </div>
                        <div>
                            <h6>Giới tính</h6>
                            <a href="filters.php?cId=4">Nam</a>
                            <a href="filters.php?cId=5">Nữ</a>
                        </div>
                        <div>
                            <h6>Chất liệu dây</h6>
                            <a href="filters.php?cId=6">Dây Da Bò Cao Cấp</a>
                            <a href="filters.php?cId=7">Dây Inox (Thép không gỉ)</a>
                            <a href="filters.php?cId=8">Dây Vải</a>
                            <a href="filters.php?cId=9">Dây Cao Su (Nhựa)</a>
                            <a href="filters.php?cId=10">Dây Da</a>
                            <a href="filters.php?cId=11">Dây lưới</a>
                        </div>
                        <div>
                            <h6>Loại máy</h6>
                            <a href="filters.php?cId=12">Cơ Tự Động (Automatic)</a>
                            <a href="filters.php?cId=13">Eco-drive (Năng lượng ánh sáng)</a>
                            <a href="filters.php?cId=14">Kinetic (Tự động - Pin)</a>
                            <a href="filters.php?cId=15">Pin (Quartz)</a>
                            <a href="filters.php?cId=16">Solor (Năng lượng ánh sáng mặt trời)</a>
                        </div>
                    </div>
                </div>
            </footer>
            <div class="rows">
                <div class="bottom">
                    <p>Copyright @ Tran Quoc Huy</p>
                </div>
            </div>
        </div> <!-- End Footer --> 
    </div>
</body>

</html>