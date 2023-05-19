<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    
</head>
<body>
    <?php 
        //Khai báo hàm session_start() để sử dụng biến $_SESSION
        session_start();

        $dbh = new PDO('mysql:host=localhost;dbname=lab03db', 'root', '');

        // Nhận id sản phẩm để thêm vào giỏ hàng
        $id=$_GET['pId'];
        $sql = "select * from products where pMa='$id'";
        $result=$dbh->query($sql);
        //Lấy dòng đầu tiên
        $product = $result->fetch(PDO::FETCH_ASSOC);

        $bool = false;
        $i = 0;

        if(!isset($_SESSION['carts'])) {
            $_SESSION['carts'] = array('0' => array('id' => $id, 'masp' =>$product['pMa'], 
            'name' => $product['pTen'], 'price' => $product['pGia'], 'image' =>$product['pAnh'], 'quantity' => 1));
        }
        else {
            foreach ($_SESSION['carts'] as $item) {
                if($item['id']==$id) {
                    array_splice($_SESSION['carts'],$i,1,array(array('id' => $id, 'masp' =>$product['pMa'], 
                    'name' => $product['pTen'], 'price' => $product['pGia'], 
                    'image' =>$product['pAnh'], 'quantity' => $item['quantity']+1)));
                    $bool=true;
                }
                $i++;
            }
            if($bool==false) {
                array_push($_SESSION['carts'], array('id'=>$id, 'masp' =>$product['pMa'], 
                'name'=>$product['pTen'], 'price' => $product['pGia'], 'image' =>$product['pAnh'], 'quantity'=>1));
            }
        } 
        header('location:cart.php');
    ?>
</body>
</html>