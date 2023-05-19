<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/box-product.css">
</head>
<body>
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
</body>
</html>