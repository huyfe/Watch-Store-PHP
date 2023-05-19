<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/products.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <div class="rows">
            <div class="boxcenter">
                <div class="head">
                    <div class="left">
                        <a href="#"><i class="fa fa-fw fa-home"></i> Huywatch.com >> </a> Đồng hồ nam
                    </div>
                    <div class="right">
                        <button id="btnFilters">Bộ lọc <i class="fa fa-align-right"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="rows">
            <div class="boxcenter">
                <div id="wrap-filters">
                <div id="filters" class="filters" >
                    <div>
                        <h6>Sắp xếp theo</h6>
                        <a href="#">Mới nhất</a>
                        <a href="#">Giá từ thấp đến cao</a>
                        <a href="#">Giá từ cao xuống thấp</a>
                    </div>
                    <div>
                        <h6>Giới tính</h6>
                        <a href="#">Nam</a>
                        <a href="#">Nữ</a>
                    </div>
                    <div>
                        <h6>Chất liệu dây</h6>
                        <a href="#">Dây Da Bò Cao Cấp</a>
                        <a href="#">Dây Inox (Thép không gỉ)</a>
                        <a href="#">Dây Vải</a>
                        <a href="#">Dây Cao Su (Nhựa)</a>
                        <a href="#">Dây Da</a>
                        <a href="#">Dây lưới</a>
                    </div>
                    <div>
                        <h6>Loại máy</h6>
                        <a href="#">Cơ Tự Động (Automatic)</a>
                        <a href="#">Eco-drive (Năng lượng ánh sáng)</a>
                        <a href="#">Kinetic (Tự động - Pin)</a>
                        <a href="#">Pin (Quartz)</a>
                        <a href="#">Solor (Năng lượng ánh sáng mặt trời)</a>
                    </div>
                </div>
                </div>
            </div>
        </div>

    <?php 
        $dbh = new PDO('mysql:host=localhost;dbname=lab03db', 'root', '');
        $sql = "select * from products where pGioiTinh like 'Nam' ";
        $result = $dbh -> query($sql);
    ?>
    <div class="rows">
        <div class="boxcenter">
            <div class="box-product">
                <?php
                    foreach($result as $sp) {
                        echo '
                        <div class="box-product-child">
                            <div class="box-product-child-promotion">
                                <span>-'.$sp['pGiamGia'].'%</span>
                            </div>
                            <div class="box-product-child-img">
                                <a href="productDetail.php?pId='.$sp['pMa'].'"><img src="images/'.$sp['pAnh'].'" alt=""></a>
                            </div>
                            <div class="box-product-child-name">
                                <a href="productDetail.php?pId='.$sp['pMa'].'">'.$sp['pTen'].'</a>
                            </div>
                            <div class="box-product-child-price">
                                <span>'.$sp['pGia'].' VNĐ</span>
                            </div>
                        </div>
                        ';
                    }
                ?>
            </div>
        </div>
        </div>
    </div>
</body>
</html>