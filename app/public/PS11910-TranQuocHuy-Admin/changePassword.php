<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đổi mật khẩu</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->

    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <!--===============================================================================================-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
    <!--===============================================================================================-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
</head>

<body onload="time()">
    <?php
        session_start();
        if(!isset($_SESSION['admin'])) {
            header('location: login.php');
        }
        $dbh = new PDO('mysql:host=localhost;dbname=lab03db', 'root', '');
        if(isset($_POST['btnDangNhap'])) {
            $user=$_POST['username'];
            $pass=$_POST['current-password'];
            $newPass=$_POST['new-password'];
            $confirmNewPass=$_POST['confirm-new-password'];

            $sql = "select * from admin where aEmail='$user' and aPassword='$pass'";
            $result=$dbh->query($sql);
            $num=$result->rowCount();
            if($num>0 && $newPass == $confirmNewPass) {
                $sqlCapNhat = "update admin set aPassword='$newPass'";
                $update = $dbh->exec($sqlCapNhat);
                if($update) {
                    echo '<script type="text/javascript">
                        swal({
                            title: "Success!",
                            text: "Mật khẩu đã được thay đổi. :)",
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
                                text: "Đổi mật khẩu không thành công! Vui lòng kiểm tra lại.",
                                type: "error",
                                timer: 2000,
                                showConfirmButton: true
                                }, function(){
                                    window.location.href = "index.php";
                            });
                        </script>';
                }
            }
            else {
                echo '<script type="text/javascript">
                        swal({
                            title: "Failed!",
                            text: "Đổi mật khẩu không thành công! Vui lòng kiểm tra lại.",
                            type: "error",
                            timer: 2000,
                            showConfirmButton: true
                            }, function(){
                        });
                    </script>';
            }
        }
    ?>
    <div id="clock"></div>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                      <img src="images/Customer-Supprt.png" alt="IMG">
                </div>

                <form method="post" action="" onsubmit="return validate()">
                    <span class="login100-form-title">
                        ĐỔI MẬT KHẨU
                    </span>

                    <div class="wrap-input100 validate-input"
                        data-validate="Bạn cần nhập đúng thông tin như: ex@fe.edu.vn">
                        <input class="input100" type="text" value="<?php echo $_SESSION['admin']; ?>" name="username" id="username">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password không được bỏ trống!">
                        <input class="input100 inputpass" type="password" placeholder="Mật khẩu cũ" name="current-password"
                            id="password-field">
                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        
                        <input class="input100 inputpass" type="password" placeholder="Mật khẩu mới" name="new-password" id="password-field2">
                        <span toggle="#password-field2" class="fa fa-fw fa-eye field-icon toggle-password"></span>

                        <input class="input100 inputpass" type="password" placeholder="Xác nhận lại mật khẩu mới" name="confirm-new-password"
                        id="password-field3">
                        <span toggle="#password-field3" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>
                    <div class="container-login100-form-btn">
                        <input type="submit" value="Đổi Mật Khẩu" name="btnDangNhap"/>
                    </div>
                </form>
                <div class="text-center p-t-12">
                    <span class="txt1">
                        Bạn quên mật khẩu?
                    </span>
                    <a class="txt2" href="/tim-lai-mat-khau.html">
                        Tài khoản / mật khẩu?
                    </a>
                </div>
                <div class="text-center p-t-135">
                    <a class="txt2" href="#">
                        2020 <i class="fa fa-copyright" aria-hidden="true"></i> PHP1 | Design by
                    </a>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
   <script>
       $('.js-tilt').tilt({
           scale:1.1
       })
   </script>
   <script src="/js/main.js"></script>
   <script type="text/javascript">
    function validate() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password-field").value;

        //Nếu không nhập gì mà nhấn đăng nhập thì sẽ báo lỗi
        if (username == "" && password == "") {
            swal("Bạn Chưa Nhập Thông Tin!", "Vui Lòng Kiểm Tra Lại", "warning");
            return false;
        }
        //Nếu không nhập tài khoản sẽ báo lỗi
        if (username == null || username == "") {
            swal("Bạn Chưa Nhập Tài Khoản", "Vui Lòng Kiểm Tra Tài Khoản", "error");
            return false;
        }
        //Nếu không nhập mật khẩu sẽ báo lỗi
        if (password == null || password == "") {
            swal("Bạn Chưa Nhập Mật Khẩu", "Vui Lòng Kiểm Tra Mật Khẩu", "error");
            return false;
        }
        //Nếu mật khẩu dưới 8 ký tự
        
        //Nếu mật khẩu trên 8 ký tự thì sẽ báo lỗi
        
        //swal("Thông Tin Bạn Nhập Không Tồn Tại", "Vui Lòng Kiểm Tra Hoặc Nhấn Quên Mật Khẩu", "error");
    }

    //show/hide pass
    function myFunction(){
        var x = document.getElementById("myInput");
        if (x.type === "password"){
            x.type = "text"
        } else {
            x.type = "password";
        }
    }
    $(".toggle-password").click(function () {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
    function time() {
        var today = new Date();
        var weekday = new Array(7);
        weekday[0] = "Chủ Nhật";
        weekday[1] = "Thứ Hai";
        weekday[2] = "Thứ Ba";
        weekday[3] = "Thứ Tư";
        weekday[4] = "Thứ Năm";
        weekday[5] = "Thứ Sáu";
        weekday[6] = "Thứ Bảy";
        var day = weekday[today.getDay()];
        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        nowTime = h + ":" + m + ":" + s;
        if (dd < 10) { dd = '0' + dd} if (mm < 10) { mm = '0' + mm} today = day + ', ' + dd + '/' + mm + '/' + yyyy;
        tmp = '<i class="fa fa-clock-o" aria-hidden="true"></i> <span class="date">' + today + ' | ' + nowTime + '</span>';
        document.getElementById("clock").innerHTML = tmp;
        clocktime = setTimeout("time()", "1000", "Javascript");
        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }
    }
   </script>
</body>

</html>
<!--THANK FOR WATCHING <3-->
