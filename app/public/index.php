<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PS11910 | Trần Quốc Huy | LAB 03</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="javascript/back.js"></script>
    <script src="javascript/direct.js"></script>
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
    <div class="container">
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

            <div class="rows">
                <div class="boxcenter">
                    <nav class="menu">
                        <div class="menu-left">
                            <a class="hover-effect" href="#">TOP 100</a>
                            <a class="hover-effect" href="#">THƯƠNG HIỆU</a>
                            <a class="hover-effect" href="filters.php?cId=4">NAM</a>
                            <a class="hover-effect" href="filters.php?cId=5">NỮ</a>
                            <div class="animation start-top"></div>
                        </div>
                        <div class="menu-center">
                            <div class="logo">
                                <div class="rows huywatch">
                                    <a href="index.php">
                                        <img style="position: absolute; top: 8%;" src="images/huywatch.png" alt="huywatch.com">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="menu-right">
                            <a class="hover-effect" href="#">ĐÔI</a>
                            <a class="hover-effect" href="#">TREO TƯỜNG</a>
                            <a class="hover-effect" href="#">SỮA CHỮA</a>
                            <a class="hover-effect" href="#">LIÊN HỆ</a>
                        </div>
                    </nav>
                </div>
            </div>
        </header>

        <div class="rows">
            <div class="banner">
            
            </div>
        </div>

        <div class="rows">
            <div class="boxcenter">
                <div class="promotion">
                    <div class="slogan">
                        <h1>UY TÍN TẠO NÊN THƯƠNG HIỆU</h1>
                        <p>Chúng tôi cam kết mang lại những giá trị cao nhất, chế độ hậu mãi tốt nhất & 
                            đồng hồ chính hãng cho khách hàng khi đến với SHOPDONGHO.com
                        </p>
                    </div>

                    <div class="baohanh">
                            <div>
                                <img src="images/item1.png" alt="">
                                <p>BẢO HÀNH MÁY VÀ PIN 5 NĂM</p>
                            </div>
                            <div>
                                <img src="images/item2.png" alt="">
                                <p>GIẢM ĐẾN 50% GIÁ CHÍNH HÃNG</p>
                            </div>
                            <div>
                                <img src="images/item3.png" alt="">
                                <p>CHUYỂN HÀNG COD MIỄN PHÍ TOÀN QUỐC</p>
                            </div>
                            <div>
                                <img src="images/item4.png" alt="">
                                <p>CHẾ ĐỘ 1 ĐỔI 1 TRONG 7 NGÀY ĐẦU</p>
                            </div>
                            <div>
                                <img src="images/item5.png" alt="">
                                <p>TẶNG KHĂN LAU ĐỒNG HỒ CAO CẤP</p>
                            </div>
                            <div>
                                <img src="images/item6.png" alt="">
                                <p>THAY DÂY DA GIẢM GIÁ 50%</p>
                            </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- ĐỒNG HỒ MỚI NHẤT -->
    <?php 
        $dbh = new PDO('mysql:host=localhost;dbname=lab03db', 'root', '');
        $sql = "select * from products order by pNgay DESC limit 4";
        $result = $dbh -> query($sql);
    ?>
    <div class="rows">
        <div class="boxcenter">
            <div class="topsale">
                <h1>ĐỒNG HỒ MỚI NHẤT</h1>
            </div>
            <div class="box-product">
                <?php
                    foreach($result as $sp) {
                        echo '
                        <div class="box-product-child">
                            <div class="box-product-child-promotion">
                                <span>-'.$sp['pGiamGia'].'%</span>
                            </div>
                            <div class="box-product-child-hot">
                                <span>HOT</span>
                            </div>
                            <div class="box-product-child-img">
                                <a href="productDetail.php?pId='.$sp['pMa'].'"><img width="100%" src="images/'.$sp['pAnh'].'" alt=""></a>
                            </div>
                            <div class="box-product-child-name">
                                <a href="productDetail.php?pId='.$sp['pMa'].'">'.$sp['pTen'].'</a>
                            </div>
                            <div class="box-product-child-price">
                                <span>'.number_format($sp['pGia']).' VNĐ</span>
                            </div>
                            <div class="box-product-child-cart">
                                <a href="#">THÊM VÀO GIỎ</a>
                            </div>
                            <div class="box-product-child-buy">
                                <a href="#">MUA NGAY</a>
                            </div>
                        </div>
                        ';
                    }
                ?>
            </div>
            <div class="viewall"> 
                <button onclick="moiNhat()">XEM TẤT CẢ<span></span><span></span><span></span><span></span></button>
            </div>
        </div>
    </div>

    <?php 
        $dbh = new PDO('mysql:host=localhost;dbname=lab03db', 'root', '');
        $sql = "select * from products order by pLuotMua DESC limit 4";
        $result = $dbh -> query($sql);
    ?>
    <div class="rows">
        <div class="boxcenter">
            <div class="topsale">
                <h1>ĐỒNG HỒ BÁN CHẠY NHẤT</h1>
            </div>
            <div class="box-product">
                <?php
                    foreach($result as $sp) {
                        echo '
                        <div class="box-product-child">
                            <div class="box-product-child-promotion">
                                <span>-'.$sp['pGiamGia'].'%</span>
                            </div>
                            <div class="box-product-child-hot">
                                <span>HOT</span>
                            </div>
                            <div class="box-product-child-img">
                                <a href="productDetail.php?pId='.$sp['pMa'].'"><img width="100%" src="images/'.$sp['pAnh'].'" alt=""></a>
                            </div>
                            <div class="box-product-child-name">
                                <a href="productDetail.php?pId='.$sp['pMa'].'">'.$sp['pTen'].'</a>
                            </div>
                            <div class="box-product-child-price">
                                <span>'.number_format($sp['pGia']).' VNĐ</span>
                            </div>
                            <div class="box-product-child-cart">
                                <a href="#">THÊM VÀO GIỎ</a>
                            </div>
                            <div class="box-product-child-buy">
                                <a href="#">MUA NGAY</a>
                            </div>
                        </div>
                        ';
                    }
                ?>
            </div>
            <div class="viewall"> 
                <button onclick="banChayNhat()">XEM TẤT CẢ<span></span><span></span><span></span><span></span></button>
            </div>
        </div>
    </div>

    <!-- Đồng hồ xem nhiều nhất -->
    
    <?php 
        $dbh = new PDO('mysql:host=localhost;dbname=lab03db', 'root', '');
        $sql = "select * from products order by pViews DESC limit 4";
        $result = $dbh -> query($sql);
    ?>
    <div class="rows">
        <div class="boxcenter">
            <div class="topsale">
                <h1>ĐỒNG HỒ XEM NHIỀU NHẤT</h1>
            </div>
            <div class="box-product">
                <?php
                    foreach($result as $sp) {
                        echo '
                        <div class="box-product-child">
                            <div class="box-product-child-promotion">
                                <span>-'.$sp['pGiamGia'].'%</span>
                            </div>
                            <div class="box-product-child-hot">
                                <span>HOT</span>
                            </div>
                            <div class="box-product-child-img">
                                <a href="productDetail.php?pId='.$sp['pMa'].'"><img width="100%" src="images/'.$sp['pAnh'].'" alt=""></a>
                            </div>
                            <div class="box-product-child-name">
                                <a href="productDetail.php?pId='.$sp['pMa'].'">'.$sp['pTen'].'</a>
                            </div>
                            <div class="box-product-child-price">
                                <span>'.number_format($sp['pGia']).' VNĐ</span>
                            </div>
                            <div class="box-product-child-cart">
                                <a href="#">THÊM VÀO GIỎ</a>
                            </div>
                            <div class="box-product-child-buy">
                                <a href="#">MUA NGAY</a>
                            </div>
                        </div>
                        ';
                    }
                ?>
            </div>
            <div class="viewall"> 
                <button onclick="xemNhieuNhat()">XEM TẤT CẢ<span></span><span></span><span></span><span></span></button>
            </div>
        </div>
    </div>

    <div class="rows">
        <div class="boxcenter">
            <div class="topsale">
                <h1>TIN TỨC</h1>
            </div>
            <div class="news">
                
                <div class="box-news">
                    <div class="box-news-image">
                        <a href="#"><img src="images/news1.jpg" alt=""></a>
                    </div>
                    <div class="box-news-content">
                        <a href="#"><p>MUA SẮM ONLINE MÙA DỊCH, GIẢM 30 – 50%</p></a>
                    </div>
                </div>
                <div class="box-news">
                    <div class="box-news-image">
                    <a href="#"><img src="images/news2.jpg" alt=""></a>
                    </div>
                    <div class="box-news-content">
                        <a href="#"><p>SEIKO 5 SPORTS 2020 –  TÁI SINH NHỮNG HUYỀN THOẠI</p></a>
                    </div>
                </div>
                <div class="box-news">
                    <div class="box-news-image">
                        <a href="#"><img src="images/news3.jpg" alt=""></a>
                    </div>
                    <div class="box-news-content">
                        <a href="#"><p>RA MẮT ORIENT 1010 – VĂN HIẾN NGHÌN NĂM, TINH HOA HỘI TỤ</p></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rows">
        <div class="cId">
            <div class="boxcenter">
                <div class="topsale">
                    <h1>THƯƠNG HIỆU ĐỒNG HỒ</h1>
                </div>
                <div style="margin-top: 20px" class="flex-container">
                    <div><a href="filters.php?brand=Casio"><img src="images/casio.png" alt=""></a></div>
                    <div><a href="filters.php?brand=Edifice"><img src="images/edifice.png" alt=""></a></div>
                    <div><a href="filters.php?brand=Gshock"><img src="images/gshock.png" alt=""></a></div>  
                    <div><a href="filters.php?brand=Olym"><img src="images/olym.png" alt=""></a></div>
                    <div><a href="filters.php?brand=Orient"><img src="images/orient.png" alt=""></a></div>
                    <div><a href="filters.php?brand=Citizen"><img src="images/citizen.png" alt=""></a></div>  
                    <div><a href="filters.php?brand=Daniel"><img src="images/daniel.png" alt=""></a></div>
                    <div><a href="filters.php?brand=MVMT"><img src="images/mvmt.png" alt=""></a></div>
                    <div><a href="filters.php?brand=Fossil"><img src="images/fossil.png" alt=""></a></div>  
                    <div><a href="filters.php?brand=Seiko"><img src="images/seiko.png" alt=""></a></div>
                    <div><a href="filters.php?brand=Tissot"><img src="images/tissot.png" alt=""></a></div>
                    <div><a href="filters.php?brand=Calvin"><img src="images/calvin.png" alt=""></a></div>  
                    <div><a href="filters.php?brand=Ogival"><img src="images/ogival.png" alt=""></a></div>  
                    <div><a href="filters.php?brand=Olympia"><img src="images/olympia.png" alt=""></a></div>
                    <div><a href="filters.php?brand=ZRC"><img src="images/zrc.png" alt=""></a></div>
                    <div><a href="filters.php?brand=Sale"><img src="images/sale.png" alt=""></a></div>  
                </div>
            </div>
        </div>
    </div>

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
    </div>

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
    </div>
    <div class="rows">
        <div class="bottom">
            <p>Copyright @ Tran Quoc Huy</p>
        </div>
    </div>
</div>
</div>
</body>